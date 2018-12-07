@extends('admin.adminLayouts.master')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Administrator List</h4>
                        <p class="category">Here is a list of workcity business types</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <th>ID</th>
                            <th>Business Type</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            </thead>
                            <tbody>
                            @foreach($business as $businesses)
                            <tr>
                                <td>{{ $businesses->id }}</td>
                                <td>{{ $businesses->business }}</td>
                                <td>{{ date('d M Y h:i:s',strtotime($businesses->created_at)) }}</td>
                                <td>{{ date('d M Y h:i:s',strtotime($businesses->updated_at)) }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {!! $business->render() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop

