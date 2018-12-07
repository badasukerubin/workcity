<?php

namespace WorkCity\Http\Controllers\Coord;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use WorkCity\Coords;
use WorkCity\Http\Controllers\Controller;
use WorkCity\Events\UpdatedProfile;
use Illuminate\Support\Facades\Event;

class UpdateProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:coord');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $update = DB::select('select * from coords where id = ?', array(Auth::user()->id));
        if (!empty($update)) {
            foreach ($update as $updates) {
                return view('coordinators.updateProfile', ['updates' => $updates])->with(['page' => 'profile']);
            }
        }else{
            return view('coordinators.updateProfile', ['updates' => $update])->with(['page' => 'profile']);
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
            'username' => 'required|unique:coords',
            'email' => 'required|string|email|max:255',
            'school' => 'required',
            'faculty' => 'required',
            'department' => 'required',
            'level' => 'required|min:3|numeric',
            'phonenumber' => 'required|numeric|min:11',
            'work_exp' => 'required',
            'marital' => 'required',
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
        ]);

        $imageName = $request->file('image');
        $image = $imageName->getClientOriginalName();
        $newName = date('Y-m-d').'-'.str_random(10).'.'.$image;
        $imageName->move(public_path('coord_imgs'), $newName);

        $task = Coords::findOrFail(Auth::user()->id);

        $profile = array(
            'username' => $request->get('username'),
            'image' => $newName,
            'email' => $request->get('email'),
            'school' => $request->get('school'),
            'faculty' => $request->get('faculty'),
            'department' => $request->get('department'),
            'level' => $request->get('level'),
            'phonenumber' => $request->get('phonenumber'),
            'work_exp' => $request->get('work_exp'),
            'marital' => $request->get('marital'),
            'location' => $request->get('location'),
            'que_edited'=> 1,
        );

        $task->fill($profile)->save();
        Event::fire(new UpdatedProfile(Auth::user()));
        return back()->with('success', 'Your profile has been successfully updated.');
    }
}
