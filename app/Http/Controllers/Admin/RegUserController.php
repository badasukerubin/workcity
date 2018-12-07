<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use WorkCity\Uuser;
use WorkCity\Http\Controllers\Controller;
use WorkCity\Events\DelUUser;
use WorkCity\Events\ADelUUser;
use Illuminate\Support\Facades\Event;

class RegUserController extends Controller
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
        $uuser = Uuser::latest()->paginate(30);

        return view('admin.up_user', ['uuser' => $uuser])->with(['page'=>'uuser']);
    }

    public function destroy($id, $name)
    {
        if ((Auth::user()->role) == 0){
            Uuser::where(['id'=>$id,'username'=>$name])->update(['to_delete'=>'1']);
            Session::flash('msg', 'PENDING::User - \''.$name.'\' to be deleted on Top Administrator\'s approval');
            Event::fire(new DelUUser(Auth::user()));
            return redirect()->route('admin.uuser');
        }
        elseif ((Auth::user()->role) == 1) {
            $user = Uuser::findOrFail($id);
            $user->delete();
            Session::flash('msg', 'User \'' . $name . '\' deleted successfully');
            Event::fire(new ADelUUser(Auth::user()));
            return redirect()->route('admin.uuser');
        }
        return null;
    }
}
