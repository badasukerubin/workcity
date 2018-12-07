<?php

namespace WorkCity\Http\Controllers;

use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    //The About us page
    public function index()
    {
        return view('about')->with(['page'=>'about']);
    }

}
