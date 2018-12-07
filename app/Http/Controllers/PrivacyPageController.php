<?php

namespace WorkCity\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyPageController extends Controller
{
    //The privacy page
    public function index()
    {
        return view('privacy')->with(['page'=>'privacy']);
    }
}
