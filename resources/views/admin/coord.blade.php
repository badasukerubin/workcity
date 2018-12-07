@extends('admin.adminLayouts.master')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Coordinator List</h4>
                        <p class="category">Here is a list of workcity coordinators</p>
                        @if (\Illuminate\Support\Facades\Session::has('msg'))
                            <div class="alert alert-success">
                                <p>{{ \Illuminate\Support\Facades\Session::get('msg') }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>DOB</th>
                            <th>School</th>
                            <th>Phone Number</th>
                            <th>Work Exp</th>
                            <th>Location</th>
                            <th>On/Off</th>
                            <th>No of Ref Users</th>
                            <th>Created at</th>
                            <th>Created by</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($coords as $coord)
                            <tr>
                                <td>{{ $coord->id }}</td>
                                <td>{{ $coord->fullname }}</td>
                                <td>{{ $coord->username }}</td>
                                <td><img src="@if(!empty($coord->image)){{ asset('coord_imgs/'.$coord->image) }}@else {{ asset('coord_imgs/null') }}@endif" alt="unupdated" style="height: 50px; width: 50px;"></td>
                                <td>{{ $coord->email }}</td>
                                <td>{{ $coord->dob }}</td>
                                <td>{{ $coord->school }}</td>
                                <td>{{ $coord->phonenumber }}</td>
                                <td>{{ $coord->work_exp }}</td>
                                <td>{{ $coord->location }}</td>
                                <td>
                                    @if($coord->isOnline())
                                        <span class="bg-primary">&nbsp;Online&nbsp;</span>
                                    @else
                                        <span class="bg-danger">&nbsp;Offline&nbsp;</span>
                                    @endif
                                </td>
                                <td>@php($ruser = \Illuminate\Support\Facades\DB::table('users')->where(['referred_by'=>$coord->ref_id])->count())
                                    @if($ruser <= 30)
                                        <b style="color: red">{{$ruser}}</b></p>
                                    @elseif($ruser ) <= 70)
                                        <b style="color: yellow">{{$ruser}}</b></p>
                                    @else
                                        <b style="color: green">{{$ruser}}</b></p>
                                    @endif
                                </td>
                                <td>{{ date('d M Y h:i:s',strtotime($coord->created_at)) }}</td>
                                <td>{{ date('d M Y h:i:s',strtotime($coord->created_by)) }}</td>

                                <td><a class="btn btn-danger" href="{{ url('admin/coordinators/destroy/'.$coord->id.'/'.$coord->username) }}">Delete</a></td>
                            </tr>
                            @endforeach
                            <a href="{{ url('admin/coordinators/add/') }}" class="btn btn-info">Add Coordinators</a>
                            </tbody>
                        </table>
                        <div class="pagination">
                            {!! $coords->render() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop

