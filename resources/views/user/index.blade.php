@extends('user.userLayout.master')

@section('content')
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <i class="ti-server"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Status</p>
                                    @if(!empty($updates->active))
                                        {{ $updates->active }}
                                    @else
                                        Null
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <i class="ti-wallet"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Revenue</p>
                                    @if(!empty($updates->revenue))
                                        {{ '#'.$updates->revenue }}
                                    @else
                                        #Null
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-danger text-center">
                                    <i class="ti-home"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Bank Name</p>
                                    @if(!empty($updates->bank_name))
                                        {{ $updates->bank_name }}
                                    @else
                                        Null
                                    @endif
                                </div>
                            </div>
                        </div>
                         <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-info text-center">
                                    <i class="ti-shortcode"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Acct No</p>
                                    @if(!empty($updates->account_number))
                                    {{ substr($updates->account_number, 0, 2).'**'.substr($updates->account_number, -2) }}
                                    @else
                                    Null
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Welcome to Workcity User Panel!</h4>
                        <p class="category">24 hours customer service gauranteed. <i class="ti-comments-smiley"></i></p>
                    </div>
                    <div class="content">
                        <p><b>Here are a few tips recommended for every user on this panel. </b></p>

                        <ul>
                            <li>The user panel is divided into two functional segments; 'The WorkCity Loan' and 'The Sponsors and Investors page'</li>
                            <li>As a student seeking for loan from WorkCity, it is essential for you to update your profile by visiting the User/Update Profile Page.
                                <br>On updating your profile, you are also required to pay a sum of either 1000, 1500, or 2000 naira using your card which promises you a loan of #20,000-#49,000, #50,000-#99,000, #100,000-#200,000 respectively.</li>
                            <li>After updating and payment, you are subscribed into WorkCity's system for loan payment, in which your status is pending. <br>If you end up getting selected, you are given the loan else you are refunded.<br>It is important to note that the process of selection of eligibility is purely scrutinized and trustworthy.</li>
                            <li>The Sponsors and Investors page is simpler and does not require payment of any sort. It enables you to advertise your business and get connected to sponsors, motivators, investors or sometimes - the trio.
                            <br> This segment enables you to either register your business, idea or research for sponsorship or register as a sponsor. it is important to note that you can only register your business once in a day.</li>
                            <li>It is important to note that this segment is a part of WorkCity and all actions are performed under the knowledge of our <a href="{{ url('/privacy') }}">Terms and Conditions</a>.</li>
                        </ul>
                        We enjoin you to make maximum use of this platform to expand and realize your dreams!
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="ti-headphone-alt"></i> User Panel Administrator: 07088795078, kelvinvip8@gmail.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop