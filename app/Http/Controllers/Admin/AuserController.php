<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use WorkCity\User;
use WorkCity\Http\Controllers\Controller;
use WorkCity\Events\DelUser;
use WorkCity\Events\ADelUser;
use Illuminate\Support\Facades\Event;

class AuserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //The user list page
    public function index()
    {
        $user = User::latest()->paginate(30);

        return view('admin.admin_user', ['user' => $user])->with(['page'=>'user']);
    }

    public function destroy($id, $name)
    {
        if ((Auth::user()->role) == 0){
            User::where(['id'=>$id,'fullname'=>$name])->update(['to_delete'=>'1']);
            Session::flash('msg', 'PENDING::User - \''.$name.'\' to be deleted on Top Administrator\'s approval');
            Event::fire(new DelUser(Auth::user()));
            return redirect()->route('admin.user');
        }
        elseif ((Auth::user()->role) == 1) {
            $user = User::findOrFail($id);
            $user->delete();
            Session::flash('msg', 'User \'' . $name . '\' permanently deleted successfully');
            Event::fire(new ADelUser(Auth::user()));
            return redirect()->route('admin.user');
        }
    }
}
