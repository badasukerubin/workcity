@extends('user.userLayout.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="header text-center">
                            <h3 class="title">Sponsors and Investors segment</h3>
                            <p class="category">Register your business idea for sponsorship.</p>
                            @php (date_default_timezone_set('UTC'))
                            {{--{{ date_default_timezone_get() }}--}}
                            <?php
                            if (!empty($sponsors)){
                                $now = date('Y-m-d H:i:s');
                                $sdate = date_create($sponsors->created_at, timezone_open('UTC'));
                                date_timezone_set($sdate, timezone_open('UTC'));
                                $now = strtotime($now);
                                $sdate = strtotime(date_format($sdate, 'Y-m-d H:i:sP'));
                                $approx = $now - $sdate;
                            }else{
                                $approx = '';
                            }
//                            echo $approx;
                            ?>
                            <br>
                        </div>
                        <div class="content">
                            <ul class="alert-box warning radius">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                            @if (\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('CSponsorsInvestors.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Fullname</label>
                                            <input type="text" class="form-control border-input" disabled placeholder="Fullname" value="{{ Auth::user()->fullname }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>School</label>
                                            <input type="text" class="form-control border-input" disabled placeholder="School" value="{{ Auth::user()->school }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="text" class="form-control border-input" disabled placeholder="Phone number" value="{{ Auth::user()->phonenumber }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label>Profile Picture</label>
                                            <input required id="image" name="image" type="file" class="form-control border-input" placeholder="Business Image"  value="{{ old('image') }}" @if(!empty($sponsors->created_at)) @if($approx <= 86400 ) disabled @endif > @else > @endif

                                            @if ($errors->has('image'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                            <label>Location</label>
                                            <input required id="location" name="location" type="text" class="form-control border-input" placeholder="Input your location"  value="{{ old('location') }}" @if(!empty($sponsors->created_at)) @if($approx <= 86400 ) disabled @endif > @else > @endif
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
                                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                                <label>Business Type</label>
                                                <select class="form-control" id="type" name="type" required value="{{ old('type') }}" @if(!empty($sponsors->created_at)) @if($approx <= 86400 ) disabled @endif > @else > @endif
                                                    {{ $type = \Illuminate\Support\Facades\DB::table('types')->get() }}
                                                    @foreach($type as $types)
                                                        <option value="{{ $types->business }}">{{ $types->business }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('type'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                                @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                                            <label>Facebook</label>
                                            <input required id="facebook" name="facebook" type="text" class="form-control border-input" placeholder="Facebook Username"  value="{{ old('facebook') }}" @if(!empty($sponsors->created_at)) @if($approx <= 86400 ) disabled @endif > @else > @endif
                                            @if ($errors->has('facebook'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                                            <label>Twitter</label>
                                            <input required id="twitter" name="twitter" type="text" class="form-control border-input" placeholder="Twitter username"  value="{{ old('twitter') }}" @if(!empty($sponsors->created_at)) @if($approx <= 86400 ) disabled @endif > @else > @endif
                                            @if ($errors->has('twitter'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('others') ? ' has-error' : '' }}">
                                            <label>others</label>
                                            <input required id="others" name="others" type="text" class="form-control border-input" placeholder="Link to another"  value="{{ old('others') }}" @if(!empty($sponsors->created_at)) @if($approx <= 86400 ) disabled @endif > @else > @endif
                                            @if ($errors->has('others'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('others') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label>Business Description</label>
                                            <textarea id="description" name="description" rows="5" class="form-control border-input" placeholder="Here can be your description"  value="{{ old('description') }}" @if(!empty($sponsors->created_at)) @if($approx <= 86400 ) disabled @endif > @else > @endif{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd" @if(!empty($sponsors->created_at)) @if(strtotime(date('y-m-d h:m:s'))-strtotime(date($sponsors->created_at))== 86400 ) disabled @endif > @else > @endif Add Business</button>
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