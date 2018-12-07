<?php

namespace WorkCity\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

class HomePageController extends Controller
{
    //the index page
    public function index()
    {
        return view('index')->with(['page'=>'index']);
    }
}
