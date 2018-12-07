<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WorkCity\Admin;
use WorkCity\Banks;
use WorkCity\Http\Controllers\Controller;
use WorkCity\Events\AddBank;
use Illuminate\Support\Facades\Event;

class AddBanksController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //Add banks view Page
    public function index()
    {
        return view('admin.add_banks')->with(['page'=>'banks']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:banks',
            'bank' => 'required|unique:banks|max:3',
            'created_by' => 'required',
        ]);

        $sponsors = new Banks(array(
            'name'=> $request->get('name'),
            'bank'=> $request->get('bank'),
            'created_by'=> $request->get('created_by'),
        ));
        $sponsors->save();
        Event::fire(new AddBank(Auth::user()));
        return back()->with('success', 'The bank has successfully been added.');

    }
}
