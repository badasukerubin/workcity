@extends('user.userLayout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @foreach($sponsor as $sponsors)
                    <div class="card">
                        <div class="header text-center">
                            <h3 class="title">Sponsors and Investors segment</h3>
                            <p class="category">Invest in {{ $sponsors->fullname }}'s {{ $sponsors->type }}.</p>
                            <br>
                            <hr class="divider">
                        </div>

                        <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="{{ asset('busy_images/'.$sponsors->image) }}" alt="Business Image" title="Business Image" class="img-rounded img-responsive" style="max-height: 300px; width: 100%;">
                                    </div>
                                    @endforeach

                                    @foreach($user as $users)
                                    <div class="col-md-12">
                                        <br>
                                        <h4 class="title">User Profile</h4>
                                        <br>
                                        <p class="category"><b>Full Name:</b> {{ $users->fullname }}</p>
                                        <p class="category"><b>Email:</b> <a href="mailto:{{ $users->email }}">{{ $users->email }}</a></p>
                                        <p class="category"><b>Location:</b> {{ $sponsors->location }}</p>
                                        <p class="category"><b>Phone Number:</b> {{ $users->phonenumber }}</p>
                                        <p class="category"><b>Date registered:</b> {{ date('d M Y h:i:s',strtotime($users->created_at)) }}</p>
                                        <br>
                                    </div>
                                    @endforeach

                                    <div class="col-md-12">
                                        <br>
                                        <h4 class="title">Business Profile</h4>
                                        <br>
                                        <p class="category"><b>Business Name:</b> {{ $sponsors->fullname }}</p>
                                        <p class="category"><b>Facebook:</b> <a href="http://www.facebook.com/{{ $sponsors->facebook }}">{{ $sponsors->facebook }}</a></p>
                                        <p class="category"><b>Twitter:</b> <a href="http://www.twitter.com/{{ $sponsors->twitter }}">{{ $sponsors->twitter }}</a></p>
                                        <p class="category"><b>Others:</b> <a href="http://{{ $sponsors->others }}">{{ $sponsors->others }}</a></p>
                                        <p class="category"><b>Date Created:</b> {{ date('d M Y h:i:s',strtotime($sponsors->created_at)) }}</p>
                                        <br>
                                        <p class="category"><b>Business Description:</b> {{ $sponsors->description }}</p>
                                        <br>
                                    </div>
                                </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


@stop