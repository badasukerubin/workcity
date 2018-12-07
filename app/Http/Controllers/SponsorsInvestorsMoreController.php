<?php

namespace WorkCity\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SponsorsInvestorsMoreController extends Controller
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
    public function index($id, $user_id)
    {
        $sponsor = DB::select('select * from sponsors where id = ?', array($id));
        $user = DB::select('select * from users where id = ?', array($user_id));
        if (!empty($sponsor) & !empty($user)) {
            return view('user.sponsors_investors_more', compact('sponsor','user'))->with(['page'=>'sponsors_investors']);

        }else{
            return view('user.sponsors_investors_more', compact('sponsor','user'))->with(['page'=>'sponsors_investors']);
        }
    }
}
