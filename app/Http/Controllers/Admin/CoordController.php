<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use WorkCity\Coords;
use WorkCity\Events\ADelCoord;
use WorkCity\Events\DelCoord;
use WorkCity\Http\Controllers\Controller;

class CoordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //The user coord list page
    public function index()
    {
        $coords = Coords::latest()->paginate(30);

        return view('admin.coord', ['coords' => $coords])->with(['page'=>'coords']);
    }

    public function destroy($id, $coord)
    {
        if ((Auth::user()->role) == 0){
            Coords::where(['id'=>$id,'coord'=>$coord])->update(['to_delete'=>'1']);
            Session::flash('msg', 'PENDING::coord - \''.$coord.'\' to be deleted on Top Administrator\'s approval');
            Event::fire(new DelCoord(Auth::user()));
            return redirect()->route('admin.coords');
        }
        elseif ((Auth::user()->role) == 1) {
            $coords = Coords::findOrFail($id);
            $coords->delete();
            Session::flash('msg', 'Coordinator - \'' . $coord . '\' permanently deleted successfully');
            Event::fire(new ADelCoord(Auth::user()));
            return redirect()->route('admin.coord');
        }
    }
}
