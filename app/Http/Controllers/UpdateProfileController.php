<?php

namespace WorkCity\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use WorkCity\User;
use Illuminate\Support\Facades\Session;
use WorkCity\UpdateProfile;
use WorkCity\Events\UpdatedProfile;

class UpdateProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $update = DB::select('select * from user_updated where user_id = ?', array(Auth::user()->id));
        if (!empty($update)) {
            foreach ($update as $updates) {
                return view('user.updateProfile', ['updates' => $updates])->with(['page' => 'profile']);
            }
        }else{
            return view('user.updateProfile', ['updates' => $update])->with(['page' => 'profile']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'user_id'=> 'unique:user_updated,user_id',
            'username' => 'required|unique:user_updated',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'home_address' => 'required',
            'faculty' => 'required',
            'department' => 'required',
            'level' => 'required|numeric|min:3',
            'HOD' => 'required',
            'dean_name' => 'required',
            'bank_name' => 'required',
            'account_name' => 'required|unique:user_updated',
            'account_number' => 'required|numeric|unique:user_updated',
            'description' => 'required',
        ]);

        $imageName = $request->file('image');
//        $ext = $imageName->getClientOriginalExtension();
        $image = $imageName->getClientOriginalName();
//        $newName = date('Y-m-d').'-'.str_random(10).'.'.$ext;
        $newName = date('Y-m-d').'-'.str_random(10).'.'.$image;
        $imageName->move(public_path('user_imgs'), $newName);

        $profile = new UpdateProfile(array(
            'user_id'=> Auth::user()->id,
            'username' => $request->get('username'),
            'image' => $newName,
            'home_address' => $request->get('home_address'),
            'faculty' => $request->get('faculty'),
            'department' => $request->get('department'),
            'level' => $request->get('level'),
            'HOD' => $request->get('HOD'),
            'dean_name' => $request->get('dean_name'),
            'bank_name' => $request->get('bank_name'),
            'account_name' => $request->get('account_name'),
            'account_number' => $request->get('account_number'),
            'description' => $request->get('description'),
            'que_edited'=> 1,
        ));
        $profile->save();
        Event::fire(new UpdatedProfile(Auth::user()));
        return back()->with('success', 'Your profile has been successfully updated, you cannot re-update this process. You can now proceed to the payment section');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
