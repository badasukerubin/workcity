@extends('user.userLayout.master')

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
                                <img class="avatar border-white" src="{{ asset('user_imgs/'.$updates->image) }}" alt="..."/>
                            @else
                                <img class="avatar border-white" src="{{ asset('user_imgs/null/') }}" alt="..."/>
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
                            @if(!empty($updates->description))
                                {{ $updates->description }}
                            @else
                                Update your profile first
                            @endif
                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">
                                <h5>Status<br /><small>
                                        @if(!empty($updates->active))
                                            {{ $updates->active }}
                                        @else
                                            Null
                                        @endif
                                    </small>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5>Revenue<br /><small>
                                        @if(!empty($updates->revenue))
                                            {{ '#'.$updates->revenue }}
                                        @else
                                            #Null
                                        @endif
                                    </small></h5>
                            </div>
                            <div class="col-md-3">
                                <h5>Bank<br /><small>
                                        @if(!empty($updates->bank_name))
                                            {{ $updates->bank_name }}
                                        @else
                                            Null
                                        @endif
                                    </small></h5>
                            </div>
                        </div>
                    </div>
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
                        <form method="POST" action="{{ route('UpdateProfile.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>School</label>
                                        <input type="text" class="form-control border-input" disabled placeholder="School" value="{{ Auth::user()->school }}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                        <label>Profile Picture</label>
                                        <input required id="image" name="image" type="file" class="form-control border-input" placeholder="Profile Picture"  value="{{ old('image') }}" @if(!empty($updates->que_edited)) disabled @endif>
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
                                        <input required id="username" name="username" type="text" class="form-control border-input" placeholder="Username"  value="{{ old('username') }}" @if(!empty($updates->que_edited)) disabled @endif>
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
                                        <input required id="level" name="level" type="text" class="form-control border-input" placeholder="100,200,300..."  value="{{ old('level') }}" @if(!empty($updates->que_edited)) disabled @endif>
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
                                        <input required id="faculty" name="faculty" type="text" class="form-control border-input" placeholder="faculty"  value="{{ old('faculty') }}" @if(!empty($updates->que_edited)) disabled @endif>
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
                                        <input required id="department" name="department" type="text" class="form-control border-input" placeholder="Department"  value="{{ old('department') }}" @if(!empty($updates->que_edited)) disabled @endif>
                                        @if ($errors->has('department'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('dean_name') ? ' has-error' : '' }}">
                                        <label>Dean of Faculty</label>
                                        <input required id="dean_name" name="dean_name" type="text" class="form-control border-input" placeholder="Dean of faculty"  value="{{ old('dean_name') }}" @if(!empty($updates->que_edited)) disabled @endif>
                                        @if ($errors->has('dean_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('dean_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('HOD') ? ' has-error' : '' }}">
                                        <label>HOD</label>
                                        <input required id="HOD" name="HOD" type="text" class="form-control border-input" placeholder="HOD"  value="{{ old('HOD') }}" @if(!empty($updates->que_edited)) disabled @endif>
                                        @if ($errors->has('HOD'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('HOD') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('home_address') ? ' has-error' : '' }}">
                                        <label>Home Address</label>
                                        <input required id="home_address" name="home_address" type="text" class="form-control border-input" placeholder="Home Address"  value="{{ old('home_address') }}" @if(!empty($updates->que_edited)) disabled @endif>
                                        @if ($errors->has('home_address'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('home_address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                                        <label>Bank Name</label>
                                        <select class="form-control" id="bank_name" name="bank_name" required value="{{ old('bank_name') }}" @if(!empty($updates->que_edited)) disabled @endif>
                                            {{ $banks = \Illuminate\Support\Facades\DB::table('banks')->get() }}
                                            <option> </option>
                                            @foreach($banks as $bank)
                                                <option value="{{ $bank->bank }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('bank_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('account_name') ? ' has-error' : '' }}">
                                        <label>Account Name</label>
                                        <input required id="account_name" name="account_name" type="text" class="form-control border-input" placeholder="Account Name"  value="{{ old('account_name') }}" @if(!empty($updates->que_edited)) disabled @endif>
                                        @if ($errors->has('account_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('account_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                                        <label>Account Number</label>
                                        <input required id="account_number" name="account_number" type="text" class="form-control border-input" placeholder="Account Number"  value="{{ old('account_number') }}" @if(!empty($updates->que_edited)) disabled @endif>
                                        @if ($errors->has('account_number'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label>Description</label>
                                        <textarea id="description" name="description" rows="5" class="form-control border-input" placeholder="Here can be your description"  value="{{ old('description') }}" @if(!empty($updates->que_edited)) disabled @endif>{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
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
                                <button type="submit" class="btn btn-info btn-fill btn-wd" @if(!empty($updates->que_edited)) disabled @endif>Update Profile</button>
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