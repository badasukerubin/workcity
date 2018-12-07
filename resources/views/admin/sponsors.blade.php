@extends('admin.adminLayouts.master')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Bank List</h4>
                        <p class="category">Here is a list of workcity banks</p>
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
                            <th>Image</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Full Name</th>
                            <th>Twitter</th>
                            <th>Facebook</th>
                            <th>Others</th>
                            <th>Created at</th>
                            </thead>
                            <tbody>
                            @foreach($sponsors as $sponsor)
                            <tr>
                                <td>{{ $sponsor->id }}</td>
                                <td><img src="{{ asset('busy_images/'.$sponsor->image) }}" style="height: 50px; width: 50px;"></td>
                                <td>{{ $sponsor->type }}</td>
                                <td>{{ $sponsor->location }}</td>
                                <td>{{ $sponsor->description }}</td>
                                <td>{{ $sponsor->fullname }}</td>
                                <td>{{ $sponsor->twitter }}</td>
                                <td>{{ $sponsor->facebook }}</td>
                                <td>{{ $sponsor->others }}</td>
                                <td>{{ date('d M Y h:i:s',strtotime($sponsor->created_at)) }}</td>

                                {{--<td><a href="{{ url('admin/banks/edit/'.$bank->id.'/'.$bank->bank) }}" class="btn btn-primary">Edit</a></td>--}}
                                <td><a class="btn btn-danger" href="{{ url('admin/business_desc/destroy/'.$sponsor->id.'/'.$sponsor->fullname) }}">Delete</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop

