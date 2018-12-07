@extends('layouts.master')

@section('content')
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner rounded">
                        <h2 class="section-heading text-center mb-5">
                            <span class="section-heading-upper">Access your account</span>
                            <span class="section-heading-lower">Login</span>
                        </h2>
                        <div class="panel panel-default">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    <p>{{ session('status') }}</p>
                                </div>
                            @endif

                            @if ($message = \Illuminate\Support\Facades\Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            @if ($message = \Illuminate\Support\Facades\Session::get('warning'))
                                <div class="alert alert-warning">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <div class="panel-body">
                                {{--<ul class="alert-box warning radius">--}}
                                {{--@foreach($errors->all() as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                                {{--@endforeach--}}
                                {{--</ul>--}}
                                <form class="form-horizontal col-xl-8 mx-auto" method="POST" action="{{ url('admin/login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                        <label for="username" class="control-label">Username</label>

                                        <div class="">
                                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="control-label">Password</label>

                                        <div class="">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
