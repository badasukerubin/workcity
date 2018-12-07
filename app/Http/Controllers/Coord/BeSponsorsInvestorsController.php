<?php

namespace WorkCity\Http\Controllers\Coord;

use Illuminate\Http\Request;
use WorkCity\Http\Controllers\Controller;

class BeSponsorsInvestorsController extends Controller
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
        return view('coordinators.be_sponsors_investors')->with(['page'=>'sponsors_investors']);
    }
}
