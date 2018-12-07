<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WorkCity\Admin;
use WorkCity\Http\Controllers\Controller;
use WorkCity\Events\AddAdmin;
use Illuminate\Support\Facades\Event;

class AddAdminsController extends Controller
{
    //
    //
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //add schools view page
    public function index()
    {
        $admin = Admin::all();

        return view('admin.add_admins', ['admin' => $admin])->with(['page'=>'admin']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        //

        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'unique:admins|required',
            'phonenumber' => 'required|numeric|min:11',
            'school' => 'required',
            'email' => 'required|string|email|max:255',
            'password' => 'required|alphaNum|min:6',
        ]);

        $sponsors = new Admin(array(
            'fullname'=> $request->get('fullname'),
            'username'=> $request->get('username'),
            'phonenumber'=> $request->get('phonenumber'),
            'school'=> $request->get('school'),
            'email'=> $request->get('email'),
            'role'=>0,
            'password'=> bcrypt($request->get('password')),
            'p_id' => bin2hex(random_bytes(15)),
            'to_delete'=>0,
        ));
        $sponsors->save();
        Event::fire(new AddAdmin(Auth::user()));
        return back()->with('success', 'The Administrator has successfully been added.');
    }
}
