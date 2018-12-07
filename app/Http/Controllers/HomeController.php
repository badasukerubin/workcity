<?php

namespace WorkCity\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $update = DB::select('select * from user_updated where user_id = ?', array(Auth::user()->id));
        if (!empty($update)) {
            foreach ($update as $updates) {
                return view('user.index', ['updates' => $updates])->with(['page' => 'index']);
            }
        }else{
            return view('user.index', ['updates' => []])->with(['page' => 'index']);
        }
    }

//    protected function editProfile()
//    {
//        return view('user.updateProfile')->with(['page'=>'profile']);
//    }

//    public function index()
//    {
//        return view('home');
//    }
}
