@extends('user.userLayout.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="header text-center">
                            <h3 class="title">Sponsors and Investors segment</h3>
                            <p class="category">Choose your sponsorship type.</p>
                            <br>

                            <a href="{{ url('/user/sponsors_investors') }}" class="btn btn-info">Register your business for sponsorship</a>
                            <a href="{{ url('/user/sponsors_investors_up') }}" class="btn btn-dark">Register to be a sponsor or investor</a>
                        </div>
                        <div class="content">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop