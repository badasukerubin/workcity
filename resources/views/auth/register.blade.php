@extends('layouts.master')

@section('content')
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner rounded">
                        <h2 class="section-heading text-center mb-5">
                            <span class="section-heading-upper">Create an account</span>
                            <span class="section-heading-lower">REGISTRATION</span>
                            @if($errors->any())
                                <div class="">
                                    {{--<ul class="alert-box warning radius">--}}
                                        {{--@foreach($errors->all() as $error)--}}
                                            {{--<li>{{ $error }}</li>--}}
                                        {{--@endforeach--}}
                                    {{--</ul>--}}
                                </div>
                            @endif
                        </h2>
                        <form class="form-horizontal col-xl-8 mx-auto" style="" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}" style="">
                                <label for="fullname" class="control-label">Full Name</label>
                                <div class="">
                                    <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>

                                    @if ($errors->has('fullname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}" style="">
                                <label for="phonenumber" class="control-label">Phone Number</label>
                                <div class="">
                                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" required autofocus>

                                    @if ($errors->has('phonenumber'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}" style="">
                                <label for="school" class="control-label">School</label>
                                <div class="">
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

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail Address</label>

                                <div>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                                <label for="password-confirm" class=" control-label">Confirm Password</label>

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>

                        </form>
                        <p class="mb-0 text-center">
                            <small>
                                <em>Call Anytime</em>
                            </small>
                            <br>
                            (+234) 708 879 5078
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
