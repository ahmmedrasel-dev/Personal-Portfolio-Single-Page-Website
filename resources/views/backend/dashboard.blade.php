@extends('backend.master')
@section('desktop-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Sales</h3>
                            <div class="panel-control">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-reload" data-original-title="Reload"><i class="icon-reload"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel-header-stats">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6">
                                        <i class="icon-basket"></i>
                                        <h4 class="no-m">$14,213</h4>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <i class="icon-globe"></i>
                                        <h4 class="no-m">$374,700</h4>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <i class="icon-credit-card"></i>
                                        <h4 class="no-m">$2,134</h4>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <i class="icon-shield"></i>
                                        <h4 class="no-m">907</h4>
                                    </div>
                                </div>
                            </div>
                            <div><iframe class="chartjs-hidden-iframe" tabindex="-1" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                                <canvas id="chart1" height="306" width="558" style="display: block; width: 558px; height: 306px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Visitors</h3>
                            <div class="panel-control">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-reload" data-original-title="Reload"><i class="icon-reload"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel-header-stats">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6">
                                        <i class="icon-users"></i>
                                        <h4 class="no-m">Total: 4500</h4>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <i class="icon-user"></i>
                                        <h4 class="no-m">Male: 2600</h4>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <i class="icon-user-female"></i>
                                        <h4 class="no-m">Female: 1900</h4>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <i class="icon-user-follow"></i>
                                        <h4 class="no-m">Avg: 2250</h4>
                                    </div>
                                </div>
                            </div>
                            <div><iframe class="chartjs-hidden-iframe" tabindex="-1" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                                <canvas id="chart2" height="306" width="558" style="display: block; width: 558px; height: 306px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h4 class="panel-title">Weather</h4>
                            <div class="panel-control">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-reload" data-original-title="Reload"><i class="icon-reload"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="weather-widget">
                                <div class="row">
                                    <div class="col-md-12 col-weather-headline">
                                        <div class="weather-top">
                                            <div class="weather-current pull-left">
                                                <i class="wi wi-day-cloudy weather-icon"></i>
                                                <p><span>83<sup>°F</sup></span></p>
                                            </div>
                                            <h2 class="weather-day pull-right">Amsterdam, NL<br><small><b>6th July, 2016</b></small></h2>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-weather-info">
                                        <ul class="list-unstyled weather-info">
                                            <li>Wind <span class="pull-right"><b>ESE 16 mph</b></span></li>
                                            <li>Humidity <span class="pull-right"><b>64%</b></span></li>
                                            <li>Pressure <span class="pull-right"><b>30.15 in</b></span></li>
                                            <li>UV Index <span class="pull-right"><b>6</b></span></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-weather-info">
                                        <ul class="list-unstyled weather-info">
                                            <li>Cloud Cover <span class="pull-right"><b>60%</b></span></li>
                                            <li>Ceiling <span class="pull-right"><b>17800 ft</b></span></li>
                                            <li>Dew Point <span class="pull-right"><b>70° F</b></span></li>
                                            <li>Visibility <span class="pull-right"><b>10 mi</b></span></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12">
                                        <ul class="list-unstyled weather-days row">
                                            <li class="col-xs-4 col-sm-2"><span>12:00</span><i class="wi wi-day-cloudy"></i><span>82<sup>°F</sup></span></li>
                                            <li class="col-xs-4 col-sm-2"><span>13:00</span><i class="wi wi-day-cloudy"></i><span>82<sup>°F</sup></span></li>
                                            <li class="col-xs-4 col-sm-2"><span>14:00</span><i class="wi wi-day-cloudy"></i><span>82<sup>°F</sup></span></li>
                                            <li class="col-xs-4 col-sm-2"><span>15:00</span><i class="wi wi-day-cloudy"></i><span>83<sup>°F</sup></span></li>
                                            <li class="col-xs-4 col-sm-2"><span>16:00</span><i class="wi wi-day-cloudy"></i><span>82<sup>°F</sup></span></li>
                                            <li class="col-xs-4 col-sm-2"><span>17:00</span><i class="wi wi-day-sunny-overcast"></i><span>82<sup>°F</sup></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Table</h3>
                            <div class="panel-control">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-collapse" data-original-title="Expand/Collapse"><i class="icon-arrow-down"></i></a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-reload" data-original-title="Reload"><i class="icon-reload"></i></a>
                            </div>
                        </div>
                        <div class="panel-body statement-card">
                            <div class="statement-card-head">
                                <h3>Meteor<br><small>Statement</small></h3>
                                <p><sup>$</sup><b>207,430</b></p>
                            </div>
                            <table class="table table-responsive">
                                <tbody>
                                    <tr>
                                        <th scope="row">ORDER ID 4111</th>
                                        <td>johndoe</td>
                                        <td>N1</td>
                                        <td class="text-success"><b>$16</b></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ORDER ID 4110</th>
                                        <td>michaellewis</td>
                                        <td>N2</td>
                                        <td class="text-danger"><b>$13</b></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ORDER ID 4109</th>
                                        <td>emmagreen</td>
                                        <td>N3</td>
                                        <td class="text-success"><b>$16</b></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ORDER ID 4108</th>
                                        <td>sandrasmith</td>
                                        <td>N4</td>
                                        <td class="text-danger"><b>$13</b></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ORDER ID 4106</th>
                                        <td>emmagreen</td>
                                        <td>N6</td>
                                        <td class="text-success"><b>$16</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Main Wrapper -->
        <div class="page-footer">
            <p class="no-s">Made with <i class="fa fa-heart"></i> by stacks</p>
        </div>
    </div>
@endsection
