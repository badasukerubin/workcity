<?php

namespace WorkCity\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use WorkCity\Http\Controllers\Controller;

class QueryController extends Controller
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
    public function search(Request $request)
    {
        $query = $request->get('search');

        $res2 = DB::table('banks as t2')->select('t2.id','t2.name','t2.bank','t2.updated_at','t2.created_by','t2.created_at')->where('t2.name','LIKE','%'.$query.'%')->orWhere('t2.bank','LIKE','%'.$query.'%')->orWhere('t2.created_by','LIKE','%'.$query.'%');

        $res3 = DB::table('login_activities as t3')->select('t3.id','t3.user_agent','t3.ip_address','t3.subject','t3.url','t3.created_at')->where('t3.subject','LIKE','%'.$query.'%')->orWhere('t3.user_agent','LIKE','%'.$query.'%')->orWhere('t3.ip_address','LIKE','%'.$query.'%')->orWhere('t3.url','LIKE','%'.$query.'%')->orWhere('t3.method','LIKE','%'.$query.'%');

        $res4 = DB::table('schools as t4')->select('t4.id','t4.name','t4.school','t4.location','t4.created_by','t4.created_at')->where('t4.name','LIKE','%'.$query.'%')->orWhere('t4.school','LIKE','%'.$query.'%')->orWhere('t4.type','LIKE','%'.$query.'%')->orWhere('t4.location','LIKE','%'.$query.'%')->orWhere('t4.created_by','LIKE','%'.$query.'%');

        $res5 = DB::table('sponsors as t5')->select('t5.id','t5.fullname','t5.type','t5.location','t5.description','t5.created_at')->where('t5.fullname','LIKE','%'.$query.'%')->orWhere('t5.type','LIKE','%'.$query.'%')->orWhere('t5.location','LIKE','%'.$query.'%')->orWhere('t5.description','LIKE','%'.$query.'%')->orWhere('t5.fullname','LIKE','%'.$query.'%')->orWhere('t5.twitter','LIKE','%'.$query.'%')->orWhere('t5.facebook','LIKE','%'.$query.'%')->orWhere('t5.others','LIKE','%'.$query.'%');

        $res6 = DB::table('users as t6')->select('t6.id','t6.fullname','t6.school','t6.phonenumber','t6.email','t6.created_at')->where('t6.fullname','LIKE','%'.$query.'%')->orWhere('t6.phonenumber','LIKE','%'.$query.'%')->orWhere('t6.school','LIKE','%'.$query.'%')->orWhere('t6.email','LIKE','%'.$query.'%')->orWhere('t6.ip_address','LIKE','%'.$query.'%');

        $res7 = DB::table('user_updated as t7')->select('t7.id','t7.username','t7.home_address','t7.account_number','t7.description','t7.created_at')->where('t7.username','LIKE','%'.$query.'%')->orWhere('t7.home_address','LIKE','%'.$query.'%')->orWhere('t7.faculty','LIKE','%'.$query.'%')->orWhere('t7.department','LIKE','%'.$query.'%')->orWhere('t7.level','LIKE','%'.$query.'%')->orWhere('t7.HOD','LIKE','%'.$query.'%')->orWhere('t7.dean_name','LIKE','%'.$query.'%')->orWhere('t7.bank_name','LIKE','%'.$query.'%')->orWhere('t7.account_name','LIKE','%'.$query.'%')->orWhere('t7.account_number','LIKE','%'.$query.'%')->orWhere('t7.description','LIKE','%'.$query.'%');

        $res8 = DB::table('coords as t8')->select('t8.id','t8.fullname','t8.location','t8.phonenumber','t8.email','t8.created_at')->where('t8.fullname','LIKE','%'.$query.'%')->orWhere('t8.username','LIKE','%'.$query.'%')->orWhere('t8.email','LIKE','%'.$query.'%')->orWhere('t8.dob','LIKE','%'.$query.'%')->orWhere('t8.school','LIKE','%'.$query.'%')->orWhere('t8.faculty','LIKE','%'.$query.'%')->orWhere('t8.department','LIKE','%'.$query.'%')->orWhere('t8.level','LIKE','%'.$query.'%')->orWhere('t8.phonenumber','LIKE','%'.$query.'%')->orWhere('t8.work_exp','LIKE','%'.$query.'%')->orWhere('t8.location','LIKE','%'.$query.'%')->orWhere('t8.marital','LIKE','%'.$query.'%')->orWhere('t8.created_by','LIKE','%'.$query.'%');

        $results = DB::table('admins as t1')->select('t1.id','t1.fullname','t1.school','t1.phonenumber','t1.email','t1.created_at')->where('t1.fullname','LIKE','%'.$query.'%')->orWhere('t1.fullname','LIKE','%'.$query.'%')->orWhere('t1.username','LIKE','%'.$query.'%')->orWhere('t1.phonenumber','LIKE','%'.$query.'%')->orWhere('t1.school','LIKE','%'.$query.'%')->orWhere('t1.email','LIKE','%'.$query.'%')->union($res2)->union($res3)->union($res4)->union($res5)->union($res6)->union($res7)->union($res8)->orderBy('created_at', 'DESC')->get();

        return view('admin.search', compact('results','query'))->with(['page'=>'index']);
    }

}
