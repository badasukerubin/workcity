@extends('admin.adminLayouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="header text-center">
                            <h3 class="title">Admins</h3>
                            <p class="category">Add a Administrator.</p>
                            <br>
                        </div>
                        <div class="content">
                            {{--<ul class="alert-box warning radius">--}}
                                {{--@foreach($errors->all() as $error)--}}
                                    {{--<li>{{ $error }}</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                            @if (\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('admins.add') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="fullname" id="fullname" class="form-control border-input" placeholder="Fullname" value="{{ old('fullname') }}">
                                            @if ($errors->has('fullname'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" id="username" class="form-control border-input" placeholder="Username" value="{{ old('username') }}">
                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phonenumber</label>
                                            <input type="text" name="phonenumber" id="phonenumber" class="form-control border-input" placeholder="Phone Number Code e.g OAU 'must be 3 letters'" value="{{ old('phonenumber') }}">
                                            @if ($errors->has('phonenumber'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>School or Location</label>
                                            <input type="text" name="school" id="school" class="form-control border-input" placeholder="School or Location" value="{{ old('school') }}">
                                            @if ($errors->has('school'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('school') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email" class="form-control border-input" placeholder="Email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control border-input" placeholder="password" value="{{ old('password') }}">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Add Admin</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

