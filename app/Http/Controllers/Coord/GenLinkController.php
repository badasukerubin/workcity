<?php

namespace WorkCity\Http\Controllers\Coord;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WorkCity\Http\Controllers\Controller;
use WorkCity\User;

class GenLinkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:coord');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ref = Auth::user()->ref_id;
        $coord = User::where(['referred_by'=>$ref])->latest()->paginate(30);
        return view('coordinators.gen', ['coord' => $coord])->with(['page' => 'gen_link']);
    }

}
