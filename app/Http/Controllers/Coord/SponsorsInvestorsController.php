<?php

namespace WorkCity\Http\Controllers\Coord;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use WorkCity\Http\Controllers\Controller;
use WorkCity\SponsorsInvestors;
use WorkCity\Events\Businessed;
use Illuminate\Support\Facades\Event;

class SponsorsInvestorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:coord');
    }

    //sponsors and investors view page
    public function index()
    {
        $sponsor = DB::select('select * from sponsors where user_id = ? ORDER BY id DESC', array(Auth::guard('coord')->user()->id));
        if (!empty($sponsor)) {
            foreach ($sponsor as $sponsors) {
                return view('coordinators.sponsors_investors', ['sponsors' => $sponsors])->with(['page'=>'sponsors_investors']);
            }
        }else{
            return view('coordinators.sponsors_investors', ['sponsors' => $sponsor])->with(['page'=>'sponsors_investors']);
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
            'user_id'=> 'unique:sponsors,user_id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'type' => 'required',
            'location' => 'required',
            'description' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'others' => 'required',
        ]);

        $imageName = $request->file('image');
        $image = $imageName->getClientOriginalName();
        $newName = date('Y-m-d').'-'.str_random(10).'.'.$image;
        $imageName->move(public_path('busy_images'), $newName);

        $sponsors = new SponsorsInvestors(array(
            'image' => $newName,
            'type'=> $request->get('type'),
            'location' => $request->get('location'),
            'description' => $request->get('description'),
            'fullname' => Auth::user()->fullname,
            'twitter' => $request->get('twitter'),
            'facebook' => $request->get('facebook'),
            'others' => $request->get('others'),
            'user_id' => Auth::user()->id,
            'coord' => 1,
        ));
        $sponsors->save();
        Event::fire(new Businessed(Auth::user()));
        return back()->with('success', 'Your business profile has been successfully updated. You have to wait for 24 hours to re-post.');
    }
}
