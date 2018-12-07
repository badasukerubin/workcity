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
                            <th>Bank Code</th>
                            <th>Bank Name</th>
                            <th>Created at</th>
                            <th>Created by</th>
                            </thead>
                            <tbody>
                            @foreach($banks as $bank)
                            <tr>
                                <td>{{ $bank->id }}</td>
                                <td>{{ $bank->bank }}</td>
                                <td>{{ $bank->name }}</td>
                                <td>{{ date('d M Y h:i:s',strtotime($bank->created_at)) }}</td>
                                <td>{{ $bank->created_by }}</td>

                                {{--<td><a href="{{ url('admin/banks/edit/'.$bank->id.'/'.$bank->bank) }}" class="btn btn-primary">Edit</a></td>--}}
                                <td><a class="btn btn-danger" href="{{ url('admin/banks/destroy/'.$bank->id.'/'.$bank->bank) }}">Delete</a></td>
                            </tr>
                            @endforeach
                            <td><a href="{{ url('admin/banks/add/') }}" class="btn btn-info">Add Banks</a></td>
                            </tbody>
                        </table>
                        <div class="pagination">
                            {!! $banks->render() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop

