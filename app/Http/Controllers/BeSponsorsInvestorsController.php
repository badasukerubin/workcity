<?php

namespace WorkCity\Http\Controllers;

use Illuminate\Http\Request;

class BeSponsorsInvestorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //sponsors and investors view page
    public function index()
    {
        return view('user.be_sponsors_investors')->with(['page'=>'sponsors_investors']);
    }

}
