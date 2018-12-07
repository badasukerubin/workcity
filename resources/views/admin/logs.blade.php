@extends('admin.adminLayouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h3 class="title">User Log System</h3>
                            <p class="category">Check out a series of user activities.</p>
                            <br>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table">
                                <thead>
                                <th>ID</th>
                                <th>Url</th>
                                <th>Method</th>
                                <th>Subject</th>
                                <th>User Agent</th>
                                <th>IP Address</th>
                                <th>Date</th>
                                </thead>
                                <tbody>
                                @foreach($loginActivities as $loginActivity)
                                    <tr>
                                        <td>{{ $loginActivity->id }}</td>
                                        <td>{{ $loginActivity->url }}</td>
                                        <td>{{ $loginActivity->method }}</td>
                                        <td>{{ $loginActivity->subject }}</td>
                                        <td>{{ $loginActivity->user_agent }}</td>
                                        <td>{{ $loginActivity->ip_address }}</td>
                                        <td>{{ date('d M Y h:i:s',strtotime($loginActivity->created_at)) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {!! $loginActivities->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop