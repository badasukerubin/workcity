@extends('admin.adminLayouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Registered Users List</h4>
                            <p class="category">Here is a list of workcity registered users(For the initial registration)</p>
                            <p></p>
                            <p class="alert-danger" style="padding-left: 5px">
                                @if (session('msg'))
                                        {{ session('msg') }}
                                @endif
                            </p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Full name</th>
                                <th>Phone Number</th>
                                <th>School</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>On/Off</th>
                                <th>IP Address</th>
                                <th>Reffered By</th>
                                <th>Created at</th>
                                </thead>
                                <tbody>
                                @foreach($user as $users)
                                    <tr>
                                        <td>{{ $users->id }}</td>
                                        <td>{{ $users->fullname }}</td>
                                        <td>{{ $users->phonenumber }}</td>
                                        <td>{{ $users->school }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>
                                            @if(($users->status)==1)
                                            <span class="bg-primary">&nbsp;Email verified&nbsp;</span>
                                        @else
                                                <span class="bg-danger">&nbsp;Email unverified&nbsp;</span>
                                        @endif
                                        </td>
                                        <td>
                                            @if($users->isOnline())
                                                <span class="bg-primary">&nbsp;Online&nbsp;</span>
                                                @else
                                                <span class="bg-danger">&nbsp;Offline&nbsp;</span>
                                            @endif
                                        </td>
                                        <td>{{ $users->ip_address }}</td>
                                        <td>
                                            @php($ref = \Illuminate\Support\Facades\DB::table('coords')->select('fullname')->where(['ref_id'=>$users->referred_by])->get())
                                            @foreach($ref as $refs)
                                                {{ $refs->fullname }}
                                            @endforeach
                                            </td>
                                        <td>{{ date('d M Y h:i:s',strtotime($users->created_at)) }}</td>

                                        {{--<td><a href="" class="btn btn-primary">Edit</a></td>--}}
                                        <td><a class="btn btn-danger" href="{{ url('admin/user/destroy/'.$users->id.'/'.$users->fullname) }}">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {!! $user->render() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

