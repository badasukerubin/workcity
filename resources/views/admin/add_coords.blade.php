@extends('admin.adminLayouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="header text-center">
                            <h3 class="title">Coordinators</h3>
                            <p class="category">Add a new coordinator.</p>
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
                            <form method="POST" action="{{ route('banks.add') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="fullname" id="fullname" class="form-control border-input" placeholder="Full Name" value="{{ old('fullname') }}">
                                            @if ($errors->has('fullname'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" name="username" id="username" class="form-control border-input" placeholder="User Name" value="{{ old('username') }}">
                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control border-input" placeholder="Password" value="{{ old('password') }}">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="text" name="dob" id="dob" class="form-control border-input" placeholder="12/12/1912" value="{{ old('dob') }}">
                                            @if ($errors->has('dob'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}" style="">
                                            <label for="school" class="control-label">School</label>
                                            <select class="form-control" id="school" name="school" required autofocus>
                                            {{ $schools = \Illuminate\Support\Facades\DB::table('schools')->get() }}
                                                <option> </option>
                                                @foreach($schools as $school)
                                                    <option value="{{ $school->school }}">{{ $school->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('school'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('school') }}</strong>
                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Faculty</label>
                                            <input type="text" name="faculty" id="faculty" class="form-control border-input" placeholder="Faculty" value="{{ old('faculty') }}">
                                            @if ($errors->has('faculty'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('faculty') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" name="department" id="department" class="form-control border-input" placeholder="Department" value="{{ old('department') }}">
                                            @if ($errors->has('department'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Level</label>
                                            <input type="text" name="level" id="level" class="form-control border-input" placeholder="Level" value="{{ old('level') }}">
                                            @if ($errors->has('level'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CGPA</label>
                                            <input type="text" name="cgpa" id="cgpa" class="form-control border-input" placeholder="CGPA" value="{{ old('cgpa') }}">
                                            @if ($errors->has('cgpa'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('cgpa') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" name="phonenumber" id="phonenumber" class="form-control border-input" placeholder="Phone Number" value="{{ old('phonenumber') }}">
                                            @if ($errors->has('phonenumber'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Marital Status</label>
                                            <input type="text" name="marital" id="marital" class="form-control border-input" placeholder="Married, Divorced, Single" value="{{ old('marital') }}">
                                            @if ($errors->has('marital'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('marital') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input type="text" name="location" id="location" class="form-control border-input" placeholder="Location" value="{{ old('location') }}">
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
                                            <label>Work Experience</label>
                                            <textarea id="work_exp" name="work_exp" rows="5" class="form-control border-input" placeholder="Work Experience"  value="{{ old('work_exp') }}">{{ old('work_exp') }}</textarea>
                                            @if ($errors->has('work_exp'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('work_exp') }}</strong>
                                    </span>
                                            @endif
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
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Add Coordinator</button>
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

