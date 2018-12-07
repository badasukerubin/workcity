<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use WorkCity\Business;
use WorkCity\Http\Controllers\Controller;

class BusinessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //The user admin list page
    public function index()
    {
        $business = Business::latest()->paginate(20);

        return view('admin.business', ['business' => $business])->with(['page'=>'business']);
    }
}
