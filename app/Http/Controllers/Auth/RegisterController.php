<?php

namespace WorkCity\Http\Controllers\Auth;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use WorkCity\User;
use WorkCity\Mail\verifyEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;
use WorkCity\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => 'required|string|max:255',
            'phonenumber' => 'required|numeric|min:11',
            'school' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'pi_id' => 'unique:users',
            'password' => 'required|alphaNum|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \WorkCity\User
     */
    protected function create(array $data)
    {
        Session::flash('status', 'Registered! But make sure to verify your email to activate your account first.');
        $referred_by = Cookie::get('referral');
        $user = User::create([
            'fullname' => $data['fullname'],
            'phonenumber' => $data['phonenumber'],
            'school' => $data['school'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'p_id' => bin2hex(random_bytes(15)),
            'verifyToken' => Str::random(40),
            'referred_by' => $referred_by,
            'ip_address' => Request::ip(),
        ]);

        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser);
        return $user;
    }

    public function sendEmail($thisUser){
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function activation(){
        return view('email.activation');
    }

    public function sendEmailConfirmed($email,$verifyToken){
        $user = User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();
        if($user){
            User::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>'1', 'verifyToken'=>NULL]);
            echo 'Your account has been created and verified successfully. Returning to the login page to login.';
            Session::flash('status', 'Your account has been verified');
            return redirect(route('login'));
        }else{
            echo 'User not found. Returning to the login page';
            Session::flash('status', 'That link has already been used by a previous user, try re-registering');
            return redirect(route('login'));
        }
    }

}
