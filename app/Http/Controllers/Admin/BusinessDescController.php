<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use WorkCity\Events\ADelBus;
use WorkCity\Events\DelBus;
use WorkCity\Http\Controllers\Controller;
use WorkCity\Sponsors;

class BusinessDescController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //The business list page
    public function index()
    {
        $sponsors = Sponsors::all();

        return view('admin.sponsors', ['sponsors' => $sponsors])->with(['page'=>'business_desc']);
    }

    public function destroy($id, $name)
    {
        if ((Auth::user()->role) == 0){
            Sponsors::where(['id'=>$id,'fullname'=>$name])->update(['to_delete'=>'1']);
            Session::flash('msg', 'PENDING::Business - \''.$name.'\' to be deleted on Top Administrator\'s approval');
            Event::fire(new DelBus(Auth::user()));
            return redirect()->route('admin.business');
        }
        elseif ((Auth::user()->role) == 1) {
            $user = Sponsors::findOrFail($id);
            $user->delete();
            Session::flash('msg', 'Business \'' . $name . '\' deleted successfully');
            Event::fire(new ADelBus(Auth::user()));
            return redirect()->route('admin.business');
        }
        return null;
    }
}
