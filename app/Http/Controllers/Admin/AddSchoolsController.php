<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WorkCity\Admin;
use WorkCity\Http\Controllers\Controller;
use WorkCity\Schools;
use WorkCity\Events\AddSchool;
use Illuminate\Support\Facades\Event;

class AddSchoolsController extends Controller
{
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

        return view('admin.add_schools', ['admin' => $admin])->with(['page'=>'schools']);
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
            'name' => 'required|unique:banks',
            'school' => 'required|unique:schools|max:3',
            'type' => 'required',
            'location' => 'required',
            'created_by' => 'required',
        ]);

        $sponsors = new Schools(array(
            'name'=> $request->get('name'),
            'school'=> $request->get('school'),
            'type'=> $request->get('type'),
            'location'=> $request->get('location'),
            'created_by'=> $request->get('created_by'),
        ));
        $sponsors->save();
        Event::fire(new AddSchool(Auth::user()));
        return back()->with('success', 'The school has successfully been added.');
    }
}
