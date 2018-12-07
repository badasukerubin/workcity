<?php

namespace WorkCity\Http\Controllers;

use Illuminate\Http\Request;
use WorkCity\Sponsors;

class SponsorsInvestorsUpController extends Controller
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
        $sponsors = Sponsors::latest()->paginate(30);

        return view('user.sponsors_investors_up', ['sponsors' => $sponsors])->with(['page'=>'sponsors_investors']);
    }

}
