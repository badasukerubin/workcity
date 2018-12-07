@extends('admin.adminLayouts.master')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Administrator List</h4>
                        <p class="category">Here is a list of workcity administrator</p>
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
                            <th>Full name</th>
                            <th>Username</th>
                            <th>Phone Number</th>
                            <th>School</th>
                            <th>Email</th>
                            <th>On/Off</th>
                            <th>Created at</th>
                            </thead>
                            <tbody>
                            @foreach($admin as $admins)
                            <tr>
                                <td>{{ $admins->id }}</td>
                                <td>{{ $admins->fullname }}</td>
                                <td>{{ $admins->username }}</td>
                                <td>{{ $admins->phonenumber }}</td>
                                <td>{{ $admins->school }}</td>
                                <td>{{ $admins->email }}</td>
                                <td>
                                    @if($admins->isOnline())
                                        <span class="bg-primary">&nbsp;Online&nbsp;</span>
                                        @else
                                        <span class="bg-danger">&nbsp;Offline&nbsp;</span>
                                    @endif
                                </td>
                                <td>{{ date('d M Y h:i:s',strtotime($admins->created_at)) }}</td>

                                <td><a class="btn btn-danger" href="{{ url('admin/admin_list/destroy/'.$admins->id.'/'.$admins->username) }}">Delete</a></td>
                            </tr>
                            @endforeach
                            @if((Auth::user()->role)==1)
                            <td><a href="{{ url('admin/admin_list/add/') }}" class="btn btn-info">Add Admins</a></td>
                                @endif
                            </tbody>
                        </table>
                        <div class="pagination">
                            {!! $admin->render() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop

