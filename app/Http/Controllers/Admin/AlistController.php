<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use WorkCity\Admin;
use WorkCity\Http\Controllers\Controller;
use WorkCity\Events\DelAdmin;
use WorkCity\Events\ADelAdmin;
use Illuminate\Support\Facades\Event;

class AlistController extends Controller
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
        $admin = Admin::latest()->paginate(20);

        return view('admin.admin_list', ['admin' => $admin])->with(['page'=>'admin']);
    }

    public function destroy($id, $name)
    {
        if ((Auth::user()->role) == 0){
            Admin::where(['id'=>$id,'username'=>$name])->update(['to_delete'=>'1']);
            Session::flash('msg', 'PENDING::Admin - \''.$name.'\' to be deleted on Top Administrator\'s approval');
            Event::fire(new DelAdmin(Auth::user()));
            return redirect()->route('admin.admin');
        }
        elseif ((Auth::user()->role) == 1) {
            $user = Admin::findOrFail($id);
            $user->delete();
            Session::flash('msg', 'Admin \'' . $name . '\' deleted successfully');
            Event::fire(new ADelAdmin(Auth::user()));
            return redirect()->route('admin.admin');
        }
    }
}
