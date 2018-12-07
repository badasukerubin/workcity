@extends('coordinators.coordLayouts.master')

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
        </div>
    </div>

@stop