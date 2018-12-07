<?php

namespace WorkCity\Http\Controllers\Coord;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WorkCity\Http\Controllers\Controller;
use WorkCity\LoginActivity;

class LoginActivityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:coord');
    }


    //The user log page

    public function index(){
        $loginActivities = LoginActivity::where(['p_id'=>Auth::user()->p_id])->latest()->paginate(30);
        return view('coordinators.logs', compact('loginActivities'))->with(['page'=>'index']);
    }
}
