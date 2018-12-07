@extends('layouts.master')
@section('content')
    <section class="page-section about-heading">
        <div class="container">
            <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{ asset('img/about.jpg') }}" alt="">
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Investing in Lives, Empowering Lives</span>
                                <span class="section-heading-lower">About WorkCity</span>
                            </h2>
                            <p>Founded in 2014 by a group of motivated individuals , our establishment is a platform that provides students and young entrepreneurs alike the opportunity to access loans to start up their various business they intend to.</p>
                            <p>Asides for provision of loans, WorkCity Nigeria has other platform in which everyone could earn money everyday. We are not interested in collecting money from you.<br>The system is designed in a way at which everyday, our customers have money for themselves.</p>
                            <p>The loans are only accessible to students in tertiary institutions.</p>
                            <p class="mb-0">We guarantee that the loans are interest <em>free</em> for successful students that is, students who are able to use the money for thier business successfully. <a href="{{ url('/privacy') }}">Terms and Conditions apply</a><br>Every other service provided for money making is accessible to all.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop