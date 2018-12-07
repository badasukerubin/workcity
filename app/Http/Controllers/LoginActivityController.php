<?php

namespace WorkCity\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WorkCity\LoginActivity;

class LoginActivityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    //The user log page

    public function index(){
        $loginActivities = LoginActivity::where(['p_id'=>Auth::user()->p_id])->latest()->paginate(30);
        return view('user.logs', compact('loginActivities'))->with(['page'=>'index']);
    }
}
