@extends('admin.adminLayouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="header text-center">
                            <h3 class="title">Banks</h3>
                            <p class="category">Add a new bank.</p>
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input type="text" name="name" id="name" class="form-control border-input" placeholder="Bank Name eg: First Bank" value="{{ old('name') }}">
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
                                            <label>Bank Code</label>
                                            <input type="text" name="bank" id="bank" class="form-control border-input" placeholder="Bank Code eg: FBN 'must be 3 letters'" value="{{ old('bank') }}">
                                            @if ($errors->has('bank'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('bank') }}</strong>
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
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Add bank</button>
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

