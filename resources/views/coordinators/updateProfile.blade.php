@extends('coordinators.coordLayouts.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('assets/img/background.jpg') }}" alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                            @if(!empty($updates->image))
                                <img class="avatar border-white" src="{{ asset('coord_imgs/'.$updates->image) }}" alt="..."/>
                            @else
                                <img class="avatar border-white" src="{{ asset('coord_imgs/null/') }}" alt="..."/>
                            @endif

                            <h4 class="title">{{ Auth::user()->fullname }}<br />
                                <a href="#"><small>
                                        @if(!empty($updates->username))
                                            {{ '@'.$updates->username }}
                                        @else
                                            Update your profile first
                                        @endif
                                    </small></a>
                            </h4>
                        </div>
                        <p class="description text-center">
                            @if(!empty($updates->work_exp))
                                {{ $updates->work_exp }}
                            @else
                                Update your profile first
                            @endif
                        </p>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Update Profile</h4>
                        @if (\Illuminate\Support\Facades\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
                            </div>
                        @endif

                        @if ($errors->has('user_id'))
                            <div class="alert alert-success">
                                <p>{{ $errors->first('user_id') }}</p>
                            </div>
                        @endif
                   </div>
                    <div class="content">
                        <form method="POST" action="{{ route('CUpdateProfile.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <ul class="alert-box warning radius">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>School</label>
                                        <input required id="school" name="school" type="text" class="form-control border-input" placeholder="School"  value="{{ Auth::user()->school }}">
                                        @if ($errors->has('school'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('school') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                        <label>Profile Picture</label>
                                        <input required id="image" name="image" type="file" class="form-control border-input" placeholder="Profile Picture"  value="{{ Auth::user()->image }}">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                        <label>Username</label>
                                        <input required id="username" name="username" type="text" class="form-control border-input" placeholder="Username"  value="{{ Auth::user()->username }}">
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                        <label>Level</label>
                                        <input required id="level" name="level" type="text" class="form-control border-input" placeholder="100,200,300..."  value="{{ Auth::user()->level }}">
                                        @if ($errors->has('level'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('faculty') ? ' has-error' : '' }}">
                                        <label>Faculty</label>
                                        <input required id="faculty" name="faculty" type="text" class="form-control border-input" placeholder="faculty"  value="{{ Auth::user()->faculty }}">
                                        @if ($errors->has('faculty'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('faculty') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                                        <label>Department</label>
                                        <input required id="department" name="department" type="text" class="form-control border-input" placeholder="Department"  value="{{ Auth::user()->department }}">
                                        @if ($errors->has('department'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div></div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                        <label>Location</label>
                                        <input required id="location" name="location" type="text" class="form-control border-input" placeholder="Home Address"  value="{{ Auth::user()->location }}">
                                        @if ($errors->has('location'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email" class="form-control border-input" placeholder="Email" value="{{ Auth::user()->email }}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                    </div>

                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                                        <label>Phone Number</label>
                                        <input type="text" name="phonenumber" id="phonenumber" class="form-control border-input" placeholder="Phone Number" value="{{ Auth::user()->phonenumber }}">
                                        @if ($errors->has('phonenumber'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('marital') ? ' has-error' : '' }}">
                                        <label>Marital Status</label>
                                        <input type="text" name="marital" id="marital" class="form-control border-input" placeholder="Married, Divorced, Single" value="{{ Auth::user()->marital }}">
                                        @if ($errors->has('marital'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('marital') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('work_exp') ? ' has-error' : '' }}">
                                        <label>Work Experience</label>
                                        <textarea id="work_exp" name="work_exp" rows="5" class="form-control border-input" placeholder="Work Experience">{{ Auth::user()->work_exp }}</textarea>
                                        @if ($errors->has('work_exp'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('work_exp') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input required id="que_edited" name="que_edited" type="hidden" class="form-control border-input" placeholder="user_id" value="1">
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>

                        <div class="text-center">
                            <br>
                        @if(!empty($updates->que_edited))
                                <a title="payment" style="color: white;" target="_blank" href="#"><button type="submit" class="btn btn-default btn-fill btn-wd">Proceed to the payment segment</button></a>
                        @endif
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@stop