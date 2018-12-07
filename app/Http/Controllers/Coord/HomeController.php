<?php

namespace WorkCity\Http\Controllers\Coord;

use Illuminate\Http\Request;
use WorkCity\Http\Controllers\Controller;

class HomeController extends Controller
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
        return view('coordinators.index')->with(['page' => 'index']);
    }

}
