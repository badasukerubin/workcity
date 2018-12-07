@extends('admin.adminLayouts.master')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Schools List</h4>
                        <p class="category">Here is a list of workcity schools</p>
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
                            <th>School Code</th>
                            <th>School Name</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Created at</th>
                            <th>Created by</th>
                            </thead>
                            <tbody>
                            @foreach($schools as $school)
                            <tr>
                                <td>{{ $school->id }}</td>
                                <td>{{ $school->school }}</td>
                                <td>{{ $school->name }}</td>
                                <td>{{ $school->type }}</td>
                                <td>{{ $school->location }}</td>
                                <td>{{ date('d M Y h:i:s',strtotime($school->created_at)) }}</td>
                                <td>{{ $school->created_by }}</td>

                                {{--<td><a href="{{ url('admin/schools/edit/'.$school->id.'/'.$school->school) }}" class="btn btn-primary">Edit</a></td>--}}
                                <td><a class="btn btn-danger" href="{{ url('admin/schools/destroy/'.$school->id.'/'.$school->school) }}">Delete</a></td>
                            </tr>
                            @endforeach
                            <td><a href="{{ url('admin/schools/add/') }}" class="btn btn-info">Add Schools</a></td>
                            </tbody>
                        </table>
                        <div class="pagination">
                            {!! $schools->render() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop

