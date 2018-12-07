@extends('layouts.master')
@section('content')
    <section class="page-section clearfix">
        <div class="container">
            <div class="intro">
                <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{ asset('img/intro.jpg') }}" alt="">
                <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                    <h2 class="section-heading mb-4">
                        <span class="section-heading-upper">WorkCity Naija</span>
                        <span class="section-heading-lower">Making Lives Better</span>
                    </h2>
                    <p class="mb-3">WorkCity Nigeria is a platform that provides students and young entrepreneurs alike the opportunity to access loans to start up thier various business they intend to.<br>
                        The loans are interest free for successful students - students who are able to use the money for thier business successfully - we guarantee it!
                    </p>
                    <div class="intro-button mx-auto">
                        <a class="btn btn-primary btn-xl" href="{{ url('/about') }}">View More!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner text-center rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Our Promise</span>
                            <span class="section-heading-lower">To You</span>
                        </h2>
                        <p class="mb-0">We are dedicated to making lives of Nigerians better, providing young entrepreneurs and students in tertiary institutions with opportunities to explore thier potentials, thus creating a vast range of job opportunities for all. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop