@extends('coordinators.coordLayouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h3 class="title">Generate User Referral Links</h3>
                            <p class="category">Check out referred users and manage them.</p>
                            <br>
                        </div>
                        <div class="content">
                            @if (\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
                                </div>
                            @endif
                            <form method="POST" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label>Generated Link <a href="#" onclick="copyFunc()">Copy Link</a></label>
                                            <input id="link" type="text" readonly="readonly" class="form-control border-input" value="{{ url('/register').'/?ref='.Auth::user()->ref_id }}">
                                        </div>
                                    </div>
                                </div>
                                <p class="category"><b style="color: red">Note:</b> This link expires expires 5 minutes after the user has visited it.</p>

                                <div class="clearfix"></div>
                            </form>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <div class="header">
                                <h3 class="title">Referred Users List</h3>
                                <p class="category">Check out referred users and manage them.</p>
                                <p></p>
                                <p class="category">Number of Referred Users Registered:
                                    @if(count($coord ) <= 30)
                                        <b style="color: red">{{count($coord)}}</b></p>
                                    @elseif(count($coord ) <= 70)
                                        <b style="color: yellow">{{count($coord)}}</b></p>
                                    @else
                                        <b style="color: green">{{count($coord)}}</b></p>
                                    @endif
                                <br>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Full name</th>
                                <th>Phone Number</th>
                                <th>School</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>On/Off</th>
                                <th>Created at</th>
                                </thead>
                                <tbody>
                                @foreach($coord as $coords)
                                    <tr>
                                        <td>{{ $coords->id }}</td>
                                        <td>{{ $coords->fullname }}</td>
                                        <td>{{ $coords->phonenumber }}</td>
                                        <td>{{ $coords->school }}</td>
                                        <td>{{ $coords->email }}</td>
                                        <td>
                                            @if(($coords->status)==1)
                                                <span class="bg-primary">&nbsp;Email verified&nbsp;</span>
                                            @else
                                                <span class="bg-danger">&nbsp;Email unverified&nbsp;</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($coords->isOnline())
                                                <span class="bg-primary">&nbsp;Online&nbsp;</span>
                                            @else
                                                <span class="bg-danger">&nbsp;Offline&nbsp;</span>
                                            @endif
                                        </td>
                                        <td>{{ date('d M Y h:i:s',strtotime($coords->created_at)) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {!! $coord->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function copyFunc() {
            var copyText = document.getElementById("link");
            copyText.select();
            document.execCommand("Copy");
            alert("Copied the Link: " + copyText.value + " to your clipboard");
        }
    </script>
@stop