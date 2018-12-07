@extends('admin.adminLayouts.master')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Search List</h4>
                        <p class="category">Here is a list of your atmosphere from the latest cloud</p>
                        @if (\Illuminate\Support\Facades\Session::has('msg'))
                            <div class="alert alert-success">
                                <p>{{ \Illuminate\Support\Facades\Session::get('msg') }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped" style="">
                            @if(count($results) >= 1 & $query != '')
                            <thead style="">
                            <th>SID</th>
                            <th>FUName/Agt</th>
                            <th>Bnk/Ip/Sch/Type/Addr</th>
                            <th>Ud/Sub/Loc/PAnum/</th>
                            <th>CrtdBy/Url/Desc/Email/</th>
                            <th>Created at</th>
                            </thead>
                            <tbody>

                            @foreach($results as $result)
                            <tr>
                                <td>{{ $result->id }}</td>
                                <td>{{ $result->fullname }}</td>
                                <td>{{ $result->school }}</td>
                                <td>{{ $result->phonenumber }}</td>
                                <td>{{ $result->email }}</td>
                                <td>{{ date('d M Y h:i:s',strtotime($result->created_at)) }}</td>

                            </tr>
                            @endforeach
                                @elseif($query == '')
                                    <tr><td>
                                    Enter a search query first ;)
                                    </td></tr>
                                @else
                                <tr><td>
                                The atmosphere is a large space, still no results found for <b>{{ $query }}</b>
                                </td></tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop

