<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WorkCity\Coords;
use WorkCity\Http\Controllers\Controller;
use WorkCity\Events\AddCoord;
use Illuminate\Support\Facades\Event;

class AddCoordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //Add banks view Page
    public function index()
    {
        return view('admin.add_coords')->with(['page'=>'coords']);
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
            'username' => 'required|unique:coords',
            'email' => 'required|string|email|max:255|unique:coords',
            'password' => 'required|alphaNum|min:6',
            'dob' => 'required|min:10',
            'school' => 'required',
            'faculty' => 'required',
            'department' => 'required',
            'level' => 'required|min:3|numeric',
            'cgpa' => 'required|min:3|numeric',
            'phonenumber' => 'required|numeric|min:11',
            'work_exp' => 'required',
            'marital' => 'required',
            'location' => 'required',
        ]);

        $coords = new Coords(array(
            'fullname' => $request->get('fullname'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'p_id' => bin2hex(random_bytes(15)),
            'dob' => $request->get('dob'),
            'school' => $request->get('school'),
            'faculty' => $request->get('faculty'),
            'department' => $request->get('department'),
            'level' => $request->get('level'),
            'cgpa' => $request->get('cgpa'),
            'phonenumber' => $request->get('phonenumber'),
            'work_exp' => $request->get('work_exp'),
            'marital' => $request->get('marital'),
            'location' => $request->get('location'),
            'ref_id' => bin2hex(random_bytes(15)),
            'created_by' => Auth::user()->fullname,
        ));
        $coords->save();
        Event::fire(new AddCoord(Auth::user()));
        return back()->with('success', 'The Coordinator has successfully been added.');

    }
}
