@extends('user.userLayout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="header text-center">
                            <h3 class="title">Sponsors and Investors segment</h3>
                            <p class="category">Invest in various ideas, researches and business.</p>
                            <br>
                        </div>
                        <hr class="divider">
                        <div class="content">
                            @foreach($sponsors as $sponsor)
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                                    <img src="{{ asset('busy_images/'.$sponsor->image) }}" alt="Business Image" title="Business Image" class="img-rounded img-responsive" style="max-height: 280px; min-height: 280px; min-width: 250px; max-width: 250px;">
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                                    <br>
                                    <h4 class="title">{{ $sponsor->fullname }}@if(!empty($sponsor->coord))<sup style="font-size: 10px;">Co-ord</sup>@endif</h4>
                                    <br>
                                    <p class="category"><i class="ti-location-pin"></i>&nbsp;&nbsp;  {{ $sponsor->location }}</p>
                                    <p class="category">
                                        {{--<i class="ti-email"></i>&nbsp;&nbsp;  {{ Auth::user()->email }}--}}
                                        {{--<br>--}}
                                        <i class="ti-timer"></i>&nbsp;&nbsp;  {{ $sponsor->created_at }}
                                        <br>
                                        <i class="ti-agenda"></i>&nbsp;&nbsp;  {{ substr($sponsor->description, 0, 200) }} ...
                                    </p>

                                    <br>
                                    <div class="col-md-6">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Social</button>
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span><span class="sr-only">Social</span></button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="http://www.twitter.com/{{ $sponsor->twitter }}">Twitter</a></li>
                                            <li><a href="http://www.facebook.com/{{ $sponsor->facebook }}">Facebook</a></li>
                                            <li class="divider"></li>
                                            <li><a href="http://{{ $sponsor->others }}">Others</a></li>
                                        </ul>

                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <a href="{{ url('/user/sponsors_investors_up/more/'.$sponsor->id.'/'.$sponsor->user_id) }}" class="btn btn-info">More</a>
                                    </div>

                                </div>
                            </div>
                                <hr class="divider">
                                @endforeach

                                <div class="pagination">
                                    {!! $sponsors->render() !!}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop