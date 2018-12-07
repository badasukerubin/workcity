@extends('admin.adminLayouts.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Users Behavior</h4>
                            <p class="category">24 Hours performance</p>
                        </div>
                        <div class="content">
                            <div id="chartHours" class="ct-chart"></div>
                            <div class="footer">
                                {{--<div class="chart-legend">--}}
                                    {{--<i class="fa fa-circle text-info"></i> Open--}}
                                    {{--<i class="fa fa-circle text-danger"></i> Click--}}
                                    {{--<i class="fa fa-circle text-warning"></i> Click Second Time--}}
                                {{--</div>--}}
                                <hr>
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Email Statistics</h4>
                            <p class="category">Last Campaign Performance</p>
                        </div>
                        <div class="content">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                            <div class="footer">
                                {{--<div class="chart-legend">--}}
                                    {{--<i class="fa fa-circle text-info"></i> Open--}}
                                    {{--<i class="fa fa-circle text-danger"></i> Bounce--}}
                                    {{--<i class="fa fa-circle text-warning"></i> Unsubscribe--}}
                                {{--</div>--}}
                                <hr>
                                <div class="stats">
                                    <i class="ti-timer"></i> Updated
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Sales</h4>
                            <p class="category">All products</p>
                        </div>
                        <div class="content">
                            <div id="chartActivity" class="ct-chart"></div>

                            <div class="footer">
                                {{--<div class="chart-legend">--}}
                                    {{--<i class="fa fa-circle text-info"></i> Tesla Model S--}}
                                    {{--<i class="fa fa-circle text-warning"></i> BMW 5 Series--}}
                                {{--</div>--}}
                                <hr>
                                <div class="stats">
                                    <i class="ti-check"></i> Certified
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop