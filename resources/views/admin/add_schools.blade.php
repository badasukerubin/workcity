@extends('admin.adminLayouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="header text-center">
                            <h3 class="title">Schools</h3>
                            <p class="category">Add a new school.</p>
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
                            <form method="POST" action="{{ route('schools.add') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>School Name</label>
                                            <input type="text" name="name" id="name" class="form-control border-input" placeholder="School Name e.g Obafemi Awolowo University" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>School Code</label>
                                            <input type="text" name="school" id="school" class="form-control border-input" placeholder="School Code e.g OAU 'must be 3 letters'" value="{{ old('school') }}">
                                            @if ($errors->has('school'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('school') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>School Type</label>
                                            <input type="text" name="type" id="type" class="form-control border-input" placeholder="type" value="{{ old('type') }}">
                                            @if ($errors->has('type'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>School Location</label>
                                            <input type="text" name="location" id="location" class="form-control border-input" placeholder="location" value="{{ old('location') }}">
                                            @if ($errors->has('location'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                <input required id="created_by" name="created_by" type="hidden" class="form-control border-input" value="{{ Auth::user()->fullname }}">
                                        </div>
                                    </div>
                                </div>

                                {{--<div class="row">--}}
                                {{--<div class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                {{--<input required id="que_edited" name="que_edited" type="hidden" class="form-control border-input" placeholder="user_id" value="1">--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}

                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Add school</button>
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

