<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use WorkCity\Events\ADelSchool;
use WorkCity\Events\DelSchool;
use WorkCity\Http\Controllers\Controller;
use WorkCity\Schools;

class SchoolsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //The user school list page
    public function index()
    {
        $schools = Schools::latest()->paginate(30);

        return view('admin.schools', ['schools' => $schools])->with(['page'=>'schools']);
    }

    public function destroy($id, $school)
    {
        if ((Auth::user()->role) == 0){
            Schools::where(['id'=>$id,'school'=>$school])->update(['to_delete'=>'1']);
            Session::flash('msg', 'PENDING::School - \''.$school.'\' to be deleted on Top Administrator\'s approval');
            Event::fire(new DelSchool(Auth::user()));
            return redirect()->route('admin.schools');
        }
        elseif ((Auth::user()->role) == 1) {
            $schools = Schools::findOrFail($id);
            $schools->delete();
            Session::flash('msg', 'School - \'' . $school . '\' permanently deleted successfully');
            Event::fire(new ADelSchool(Auth::user()));
            return redirect()->route('admin.schools');
        }
    }
}
