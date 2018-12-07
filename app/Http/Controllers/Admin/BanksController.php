<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use WorkCity\Admin;
use WorkCity\Banks;
use WorkCity\Events\ADelBank;
use WorkCity\Events\DelBank;
use WorkCity\Http\Controllers\Controller;

class BanksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //The user bank list page
    public function index()
    {
        $banks = Banks::latest()->paginate(30);

        return view('admin.banks', ['banks' => $banks])->with(['page'=>'banks']);
    }

    public function destroy($id, $bank)
    {
        if ((Auth::user()->role) == 0){
            Banks::where(['id'=>$id,'bank'=>$bank])->update(['to_delete'=>'1']);
            Session::flash('msg', 'PENDING::Bank - \''.$bank.'\' to be deleted on Top Administrator\'s approval');
            Event::fire(new DelBank(Auth::user()));
            return redirect()->route('admin.banks');
        }
        elseif ((Auth::user()->role) == 1) {
            $banks = Banks::findOrFail($id);
            $banks->delete();
            Session::flash('msg', 'Bank - \'' . $bank . '\' permanently deleted successfully');
            Event::fire(new ADelBank(Auth::user()));
            return redirect()->route('admin.banks');
        }
    }
}
