@extends('admin.adminLayouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Registered Users List</h4>
                            <p class="category">Here is a list of workcity registered(Paid users)</p>
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
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Image</th>
                                <th>Address</th>
                                <th>Bank Name</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>Date</th>
                                </thead>
                                <tbody>
                                @foreach($uuser as $uusers)
                                    <tr>
                                        <td>{{ $uusers->id }}</td>
                                        <td> @php($fullname = \Illuminate\Support\Facades\DB::table('users')->select('fullname')->where('id','=',$uusers->user_id)->get())
                                            @foreach($fullname as $fullnames)
                                                {{ $fullnames->fullname }}
                                            @endforeach
                                        </td>
                                        <td>{{ $uusers->username }}</td>
                                        <td><img src="{{ asset('user_imgs/'.$uusers->image) }}" alt="user picture" style="height: 50px; width: 50px;"></td>
                                        <td>{{ $uusers->home_address }}</td>
                                        <td>{{ $uusers->bank_name }}</td>
                                        <td>{{ $uusers->account_name }}</td>
                                        <td>{{ $uusers->account_number }}</td>
                                        <td>{{ date('d M Y h:i:s',strtotime($uusers->created_at)) }}</td>

                                        {{--<td><a href="" class="btn btn-primary">Edit</a></td>--}}
                                        <td><a class="btn btn-danger" href="{{ url('admin/up_user/destroy/'.$uusers->id.'/'.$uusers->username) }}">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {!! $uuser->render() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

