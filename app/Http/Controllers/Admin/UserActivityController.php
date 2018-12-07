<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WorkCity\Http\Controllers\Controller;
use WorkCity\LoginActivity;

class UserActivityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    //The user log page

    public function index(){
        $loginActivities = LoginActivity::latest()->paginate(30);
        return view('admin.logs', compact('loginActivities'))->with(['page'=>'index']);
    }
}
