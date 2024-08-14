@extends('admin.layout.template')


@section('title', 'Dashboard')

<style>
    .row {
        margin-left: -65px;
    }
</style>

@section('content')
    <!-- mani page content body part -->
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row" style='margin-left: -65px'>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>iOT Dashboard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i></a>
                            </li>
                            <li class="breadcrumb-item cursor">Dashboard</li>
                            <li class="breadcrumb-item active">IOT</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix row-deck" style='margin-left: -65px'>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card number-chart">
                        <div class="body">
                            <span class="text-uppercase">Total Project</span>
                            <h4 class="mb-0 mt-2">{{ $project }}</h4>
                            <small class="text-muted">Analytics for last week</small>
                        </div>
                        <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%"
                            data-height="95px" data-line-Width="1" data-line-Color="#39afa6" data-fill-Color="#73cec7">
                            4,1,5,2,7,3,4</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card number-chart">
                        <div class="body">
                            <span class="text-uppercase">Total Membar</span>
                            <h4 class="mb-0 mt-2">{{ $user }}</h4>
                            <small class="text-muted">Analytics for last week</small>
                        </div>
                        <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%"
                            data-height="95px" data-line-Width="1" data-line-Color="#ffa901" data-fill-Color="#efc26b">
                            1,4,2,3,6,2</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card number-chart">
                        <div class="body">
                            <span class="text-uppercase">Total Task</span>
                            <h4 class="mb-0 mt-2">65</h4>
                            <small class="text-muted">Analytics for last week</small>
                        </div>
                        <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%"
                            data-height="95px" data-line-Width="1" data-line-Color="#38c172" data-fill-Color="#84d4a6">
                            1,4,2,3,1,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card number-chart">
                        <div class="body">
                            <span class="text-uppercase">Compeleted Task</span>
                            <h4 class="mb-0 mt-2">20</h4>
                            <small class="text-muted">Analytics for last week</small>
                        </div>
                        <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%"
                            data-height="95px" data-line-Width="1" data-line-Color="#38c172" data-fill-Color="#84d4a6">
                            1,4,2,3,1,5</div>
                    </div>
                </div>

            </div>

            <div class="row clearfix row-deck" style='margin-left: -65px'>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Timeline </h2>
                        </div>
                        <div class="body" style="position: relative;">
                            <div id="apex-timeline" style="min-height: 365px;">
                                <div id="apexcharts6bmalobb" class="apexcharts-canvas apexcharts6bmalobb light"
                                    style="width: 581px; height: 350px;"><svg id="SvgjsSvg3578" width="581"
                                        height="350" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <foreignObject x="0" y="0" width="581" height="350">
                                            <div class="apexcharts-legend center position-bottom"
                                                xmlns="http://www.w3.org/1999/xhtml"
                                                style="inset: auto 0px 10px; position: absolute;">
                                                <div class="apexcharts-legend-series" rel="1"
                                                    data:collapsed="false" style="margin: 0px 5px;"><span
                                                        class="apexcharts-legend-marker" rel="1"
                                                        data:collapsed="false"
                                                        style="background: rgb(89, 196, 188); color: rgb(89, 196, 188); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                        class="apexcharts-legend-text" rel="1"
                                                        data:collapsed="false"
                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">Bob</span>
                                                </div>
                                                <div class="apexcharts-legend-series" rel="2"
                                                    data:collapsed="false" style="margin: 0px 5px;"><span
                                                        class="apexcharts-legend-marker" rel="2"
                                                        data:collapsed="false"
                                                        style="background: rgb(99, 122, 174); color: rgb(99, 122, 174); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                        class="apexcharts-legend-text" rel="2"
                                                        data:collapsed="false"
                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">Joe</span>
                                                </div>
                                            </div>
                                            <style type="text/css">
                                                .apexcharts-legend {
                                                    display: flex;
                                                    overflow: auto;
                                                    padding: 0 10px;
                                                }

                                                .apexcharts-legend.position-bottom,
                                                .apexcharts-legend.position-top {
                                                    flex-wrap: wrap
                                                }

                                                .apexcharts-legend.position-right,
                                                .apexcharts-legend.position-left {
                                                    flex-direction: column;
                                                    bottom: 0;
                                                }

                                                .apexcharts-legend.position-bottom.left,
                                                .apexcharts-legend.position-top.left,
                                                .apexcharts-legend.position-right,
                                                .apexcharts-legend.position-left {
                                                    justify-content: flex-start;
                                                }

                                                .apexcharts-legend.position-bottom.center,
                                                .apexcharts-legend.position-top.center {
                                                    justify-content: center;
                                                }

                                                .apexcharts-legend.position-bottom.right,
                                                .apexcharts-legend.position-top.right {
                                                    justify-content: flex-end;
                                                }

                                                .apexcharts-legend-series {
                                                    cursor: pointer;
                                                    line-height: normal;
                                                }

                                                .apexcharts-legend.position-bottom .apexcharts-legend-series,
                                                .apexcharts-legend.position-top .apexcharts-legend-series {
                                                    display: flex;
                                                    align-items: center;
                                                }

                                                .apexcharts-legend-text {
                                                    position: relative;
                                                    font-size: 14px;
                                                }

                                                .apexcharts-legend-text *,
                                                .apexcharts-legend-marker * {
                                                    pointer-events: none;
                                                }

                                                .apexcharts-legend-marker {
                                                    position: relative;
                                                    display: inline-block;
                                                    cursor: pointer;
                                                    margin-right: 3px;
                                                }

                                                .apexcharts-legend.right .apexcharts-legend-series,
                                                .apexcharts-legend.left .apexcharts-legend-series {
                                                    display: inline-block;
                                                }

                                                .apexcharts-legend-series.no-click {
                                                    cursor: auto;
                                                }

                                                .apexcharts-legend .apexcharts-hidden-zero-series,
                                                .apexcharts-legend .apexcharts-hidden-null-series {
                                                    display: none !important;
                                                }

                                                .inactive-legend {
                                                    opacity: 0.45;
                                                }
                                            </style>
                                        </foreignObject>
                                        <g id="SvgjsG3580" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(86.63916015625, 40)">
                                            <defs id="SvgjsDefs3579">
                                                <clipPath id="gridRectMask6bmalobb">
                                                    <rect id="SvgjsRect3600" width="484.36083984375" height="253.348"
                                                        x="0" y="0" rx="0" ry="0" fill="#ffffff"
                                                        opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0"></rect>
                                                </clipPath>
                                                <clipPath id="gridRectMarkerMask6bmalobb">
                                                    <rect id="SvgjsRect3601" width="524.36083984375" height="293.348"
                                                        x="-20" y="-20" rx="0" ry="0" fill="#ffffff"
                                                        opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0"></rect>
                                                </clipPath>
                                                <linearGradient id="SvgjsLinearGradient3606" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop3607" stop-opacity="1"
                                                        stop-color="rgba(131,211,205,1)" offset="0.5"></stop>
                                                    <stop id="SvgjsStop3608" stop-opacity="1"
                                                        stop-color="rgba(89,196,188,1)" offset="0"></stop>
                                                    <stop id="SvgjsStop3609" stop-opacity="1"
                                                        stop-color="rgba(89,196,188,1)" offset="1"></stop>
                                                    <stop id="SvgjsStop3610" stop-opacity="1"
                                                        stop-color="rgba(131,211,205,1)" offset="1"></stop>
                                                </linearGradient>
                                                <linearGradient id="SvgjsLinearGradient3612" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop3613" stop-opacity="1"
                                                        stop-color="rgba(131,211,205,1)" offset="0.5"></stop>
                                                    <stop id="SvgjsStop3614" stop-opacity="1"
                                                        stop-color="rgba(89,196,188,1)" offset="0"></stop>
                                                    <stop id="SvgjsStop3615" stop-opacity="1"
                                                        stop-color="rgba(89,196,188,1)" offset="1"></stop>
                                                    <stop id="SvgjsStop3616" stop-opacity="1"
                                                        stop-color="rgba(131,211,205,1)" offset="1"></stop>
                                                </linearGradient>
                                                <linearGradient id="SvgjsLinearGradient3618" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop3619" stop-opacity="1"
                                                        stop-color="rgba(131,211,205,1)" offset="0.5"></stop>
                                                    <stop id="SvgjsStop3620" stop-opacity="1"
                                                        stop-color="rgba(89,196,188,1)" offset="0"></stop>
                                                    <stop id="SvgjsStop3621" stop-opacity="1"
                                                        stop-color="rgba(89,196,188,1)" offset="1"></stop>
                                                    <stop id="SvgjsStop3622" stop-opacity="1"
                                                        stop-color="rgba(131,211,205,1)" offset="1"></stop>
                                                </linearGradient>
                                                <linearGradient id="SvgjsLinearGradient3624" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop3625" stop-opacity="1"
                                                        stop-color="rgba(131,211,205,1)" offset="0.5"></stop>
                                                    <stop id="SvgjsStop3626" stop-opacity="1"
                                                        stop-color="rgba(89,196,188,1)" offset="0"></stop>
                                                    <stop id="SvgjsStop3627" stop-opacity="1"
                                                        stop-color="rgba(89,196,188,1)" offset="1"></stop>
                                                    <stop id="SvgjsStop3628" stop-opacity="1"
                                                        stop-color="rgba(131,211,205,1)" offset="1"></stop>
                                                </linearGradient>
                                                <linearGradient id="SvgjsLinearGradient3632" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop3633" stop-opacity="1"
                                                        stop-color="rgba(138,155,194,1)" offset="0.5"></stop>
                                                    <stop id="SvgjsStop3634" stop-opacity="1"
                                                        stop-color="rgba(99,122,174,1)" offset="0"></stop>
                                                    <stop id="SvgjsStop3635" stop-opacity="1"
                                                        stop-color="rgba(99,122,174,1)" offset="1"></stop>
                                                    <stop id="SvgjsStop3636" stop-opacity="1"
                                                        stop-color="rgba(138,155,194,1)" offset="1"></stop>
                                                </linearGradient>
                                                <linearGradient id="SvgjsLinearGradient3638" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop3639" stop-opacity="1"
                                                        stop-color="rgba(138,155,194,1)" offset="0.5"></stop>
                                                    <stop id="SvgjsStop3640" stop-opacity="1"
                                                        stop-color="rgba(99,122,174,1)" offset="0"></stop>
                                                    <stop id="SvgjsStop3641" stop-opacity="1"
                                                        stop-color="rgba(99,122,174,1)" offset="1"></stop>
                                                    <stop id="SvgjsStop3642" stop-opacity="1"
                                                        stop-color="rgba(138,155,194,1)" offset="1"></stop>
                                                </linearGradient>
                                                <linearGradient id="SvgjsLinearGradient3644" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop3645" stop-opacity="1"
                                                        stop-color="rgba(138,155,194,1)" offset="0.5"></stop>
                                                    <stop id="SvgjsStop3646" stop-opacity="1"
                                                        stop-color="rgba(99,122,174,1)" offset="0"></stop>
                                                    <stop id="SvgjsStop3647" stop-opacity="1"
                                                        stop-color="rgba(99,122,174,1)" offset="1"></stop>
                                                    <stop id="SvgjsStop3648" stop-opacity="1"
                                                        stop-color="rgba(138,155,194,1)" offset="1"></stop>
                                                </linearGradient>
                                                <linearGradient id="SvgjsLinearGradient3650" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop3651" stop-opacity="1"
                                                        stop-color="rgba(138,155,194,1)" offset="0.5"></stop>
                                                    <stop id="SvgjsStop3652" stop-opacity="1"
                                                        stop-color="rgba(99,122,174,1)" offset="0"></stop>
                                                    <stop id="SvgjsStop3653" stop-opacity="1"
                                                        stop-color="rgba(99,122,174,1)" offset="1"></stop>
                                                    <stop id="SvgjsStop3654" stop-opacity="1"
                                                        stop-color="rgba(138,155,194,1)" offset="1"></stop>
                                                </linearGradient>
                                            </defs>
                                            <line id="SvgjsLine3584" x1="0" y1="0" x2="0"
                                                y2="253.348" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0"
                                                y="0" width="1" height="253.348" fill="#b1b9c4" filter="none"
                                                fill-opacity="0.9" stroke-width="0"></line>
                                            <g id="SvgjsG3670" class="apexcharts-yaxis apexcharts-xaxis-inversed"
                                                rel="0">
                                                <g id="SvgjsG3671"
                                                    class="apexcharts-yaxis-texts-g apexcharts-xaxis-inversed-texts-g"
                                                    transform="translate(0, 0)"><text id="SvgjsText3672"
                                                        font-family="Helvetica, Arial, sans-serif" x="-15"
                                                        y="34.54745454545455" text-anchor="end" dominant-baseline="auto"
                                                        font-size="11px" fill="#373d3f" class="apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">Design</text><text
                                                        id="SvgjsText3673" font-family="Helvetica, Arial, sans-serif"
                                                        x="-15" y="97.88445454545456" text-anchor="end"
                                                        dominant-baseline="auto" font-size="11px" fill="#373d3f"
                                                        class="apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">Code</text><text
                                                        id="SvgjsText3674" font-family="Helvetica, Arial, sans-serif"
                                                        x="-15" y="161.22145454545455" text-anchor="end"
                                                        dominant-baseline="auto" font-size="11px" fill="#373d3f"
                                                        class="apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">Test</text><text
                                                        id="SvgjsText3675" font-family="Helvetica, Arial, sans-serif"
                                                        x="-15" y="224.55845454545454" text-anchor="end"
                                                        dominant-baseline="auto" font-size="11px" fill="#373d3f"
                                                        class="apexcharts-yaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">Deployment</text>
                                                </g>
                                                <line id="SvgjsLine3676" x1="0" y1="254.348"
                                                    x2="484.36083984375" y2="254.348" stroke="#78909c"
                                                    stroke-dasharray="0" stroke-width="1"></line>
                                            </g>
                                            <g id="SvgjsG3656" class="apexcharts-xaxis apexcharts-yaxis-inversed">
                                                <g id="SvgjsG3657" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -8)"><text id="SvgjsText3658"
                                                        font-family="Helvetica, Arial, sans-serif" x="29.496333195612976"
                                                        y="283.348" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan3659">02 Mar</tspan>
                                                        <title>02 Mar</title>
                                                    </text><text id="SvgjsText3660"
                                                        font-family="Helvetica, Arial, sans-serif" x="104.01338547926682"
                                                        y="283.348" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan3661">04 Mar</tspan>
                                                        <title>04 Mar</title>
                                                    </text><text id="SvgjsText3662"
                                                        font-family="Helvetica, Arial, sans-serif" x="178.53043776292066"
                                                        y="283.348" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan3663">06 Mar</tspan>
                                                        <title>06 Mar</title>
                                                    </text><text id="SvgjsText3664"
                                                        font-family="Helvetica, Arial, sans-serif" x="253.04749004657447"
                                                        y="283.348" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan3665">08 Mar</tspan>
                                                        <title>08 Mar</title>
                                                    </text><text id="SvgjsText3666"
                                                        font-family="Helvetica, Arial, sans-serif" x="327.5645423302283"
                                                        y="283.348" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan3667">10 Mar</tspan>
                                                        <title>10 Mar</title>
                                                    </text><text id="SvgjsText3668"
                                                        font-family="Helvetica, Arial, sans-serif" x="402.0815946138821"
                                                        y="283.348" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" fill="#373d3f" class="apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan3669">12 Mar</tspan>
                                                        <title>12 Mar</title>
                                                    </text></g>
                                            </g>
                                            <g id="SvgjsG3677" class="apexcharts-grid">
                                                <g id="SvgjsG3678" class="apexcharts-gridlines-horizontal">
                                                    <line id="SvgjsLine3684" x1="0" y1="0"
                                                        x2="484.36083984375" y2="0" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine3685" x1="0" y1="63.337"
                                                        x2="484.36083984375" y2="63.337" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine3686" x1="0" y1="126.674"
                                                        x2="484.36083984375" y2="126.674" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine3687" x1="0" y1="190.01100000000002"
                                                        x2="484.36083984375" y2="190.01100000000002" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine3688" x1="0" y1="253.348"
                                                        x2="484.36083984375" y2="253.348" stroke="#e0e0e0"
                                                        stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG3679" class="apexcharts-gridlines-vertical"></g>
                                                <line id="SvgjsLine3680" x1="97.17216796875" y1="254.348"
                                                    x2="97.17216796875" y2="260.348" stroke="#78909c"
                                                    stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine3681" x1="194.34433593750003" y1="254.348"
                                                    x2="194.34433593750003" y2="260.348" stroke="#78909c"
                                                    stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine3682" x1="291.5165039062501" y1="254.348"
                                                    x2="291.5165039062501" y2="260.348" stroke="#78909c"
                                                    stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine3683" x1="388.6886718750001" y1="254.348"
                                                    x2="388.6886718750001" y2="260.348" stroke="#78909c"
                                                    stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine3690" x1="0" y1="253.348"
                                                    x2="484.36083984375" y2="253.348" stroke="transparent"
                                                    stroke-dasharray="0"></line>
                                                <line id="SvgjsLine3689" x1="0" y1="1" x2="0"
                                                    y2="253.348" stroke="transparent" stroke-dasharray="0"></line>
                                            </g>
                                            <g id="SvgjsG3603" class="apexcharts-rangebar-series apexcharts-plot-series">
                                                <g id="SvgjsG3604" class="apexcharts-series Bob" rel="1"
                                                    data:realIndex="0">
                                                    <path id="apexcharts-rangebar-area-0"
                                                        d="M 37.2585261418717 9.50055L 74.5170522837434 9.50055L 74.5170522837434 31.6685L 37.2585261418717 31.6685L 37.2585261418717 9.50055"
                                                        fill="url(#SvgjsLinearGradient3606)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-rangebar-area"
                                                        index="0" clip-path="url(#gridRectMask6bmalobb)"
                                                        pathTo="M 37.2585261418717 9.50055L 74.5170522837434 9.50055L 74.5170522837434 31.6685L 37.2585261418717 31.6685L 37.2585261418717 9.50055"
                                                        pathFrom="M -669014.0954026441 9.50055L 37.2585261418717 9.50055L 37.2585261418717 31.6685L 37.2585261418717 31.6685L 37.2585261418717 9.50055"
                                                        cy="72.83755000000001" cx="74.5170522837434" j="0"
                                                        val="1551571200000" barHeight="22.16795"
                                                        barWidth="37.2585261418717"></path>
                                                    <path id="apexcharts-rangebar-area-0"
                                                        d="M 37.2585261418717 72.83755000000001L 111.77557842549868 72.83755000000001L 111.77557842549868 95.00550000000001L 37.2585261418717 95.00550000000001L 37.2585261418717 72.83755000000001"
                                                        fill="url(#SvgjsLinearGradient3612)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-rangebar-area"
                                                        index="0" clip-path="url(#gridRectMask6bmalobb)"
                                                        pathTo="M 37.2585261418717 72.83755000000001L 111.77557842549868 72.83755000000001L 111.77557842549868 95.00550000000001L 37.2585261418717 95.00550000000001L 37.2585261418717 72.83755000000001"
                                                        pathFrom="M -669014.0954026441 72.83755000000001L 37.2585261418717 72.83755000000001L 37.2585261418717 95.00550000000001L 37.2585261418717 95.00550000000001L 37.2585261418717 72.83755000000001"
                                                        cy="136.17455" cx="111.77557842549868" j="1" val="1551657600000"
                                                        barHeight="22.16795" barWidth="74.51705228362698"></path>
                                                    <path id="apexcharts-rangebar-area-0"
                                                        d="M 111.77557842549868 136.17455L 223.55115685099736 136.17455L 223.55115685099736 158.3425L 111.77557842549868 158.3425L 111.77557842549868 136.17455"
                                                        fill="url(#SvgjsLinearGradient3618)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-rangebar-area"
                                                        index="0" clip-path="url(#gridRectMask6bmalobb)"
                                                        pathTo="M 111.77557842549868 136.17455L 223.55115685099736 136.17455L 223.55115685099736 158.3425L 111.77557842549868 158.3425L 111.77557842549868 136.17455"
                                                        pathFrom="M -669014.0954026441 136.17455L 111.77557842549868 136.17455L 111.77557842549868 158.3425L 111.77557842549868 158.3425L 111.77557842549868 136.17455"
                                                        cy="199.51155" cx="223.55115685099736" j="2" val="1551916800000"
                                                        barHeight="22.16795" barWidth="111.77557842549868"></path>
                                                    <path id="apexcharts-rangebar-area-0"
                                                        d="M 372.5852614182513 199.51155L 409.843787560123 199.51155L 409.843787560123 221.6795L 372.5852614182513 221.6795L 372.5852614182513 199.51155"
                                                        fill="url(#SvgjsLinearGradient3624)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-rangebar-area"
                                                        index="0" clip-path="url(#gridRectMask6bmalobb)"
                                                        pathTo="M 372.5852614182513 199.51155L 409.843787560123 199.51155L 409.843787560123 221.6795L 372.5852614182513 221.6795L 372.5852614182513 199.51155"
                                                        pathFrom="M -669014.0954026441 199.51155L 372.5852614182513 199.51155L 372.5852614182513 221.6795L 372.5852614182513 221.6795L 372.5852614182513 199.51155"
                                                        cy="262.84855" cx="409.843787560123" j="3" val="1552348800000"
                                                        barHeight="22.16795" barWidth="37.2585261418717"></path>
                                                    <g id="SvgjsG3605" class="apexcharts-datalabels"></g>
                                                </g>
                                                <g id="SvgjsG3630" class="apexcharts-series Joe" rel="2"
                                                    data:realIndex="1">
                                                    <path id="apexcharts-rangebar-area-1"
                                                        d="M 0 31.6685L 37.2585261418717 31.6685L 37.2585261418717 53.83645L 0 53.83645L 0 31.6685"
                                                        fill="url(#SvgjsLinearGradient3632)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-rangebar-area"
                                                        index="1" clip-path="url(#gridRectMask6bmalobb)"
                                                        pathTo="M 0 31.6685L 37.2585261418717 31.6685L 37.2585261418717 53.83645L 0 53.83645L 0 31.6685"
                                                        pathFrom="M -669014.0954026441 31.6685L 0 31.6685L 0 53.83645L 0 53.83645L 0 31.6685"
                                                        cy="95.00550000000001" cx="37.2585261418717" j="0"
                                                        val="1551484800000" barHeight="22.16795"
                                                        barWidth="37.2585261418717"></path>
                                                    <path id="apexcharts-rangebar-area-1"
                                                        d="M 74.5170522837434 95.00550000000001L 223.55115685099736 95.00550000000001L 223.55115685099736 117.17345000000002L 74.5170522837434 117.17345000000002L 74.5170522837434 95.00550000000001"
                                                        fill="url(#SvgjsLinearGradient3638)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-rangebar-area"
                                                        index="1" clip-path="url(#gridRectMask6bmalobb)"
                                                        pathTo="M 74.5170522837434 95.00550000000001L 223.55115685099736 95.00550000000001L 223.55115685099736 117.17345000000002L 74.5170522837434 117.17345000000002L 74.5170522837434 95.00550000000001"
                                                        pathFrom="M -669014.0954026441 95.00550000000001L 74.5170522837434 95.00550000000001L 74.5170522837434 117.17345000000002L 74.5170522837434 117.17345000000002L 74.5170522837434 95.00550000000001"
                                                        cy="158.3425" cx="223.55115685099736" j="1" val="1551916800000"
                                                        barHeight="22.16795" barWidth="149.03410456725396"></path>
                                                    <path id="apexcharts-rangebar-area-1"
                                                        d="M 186.29263070912566 158.3425L 298.06820913462434 158.3425L 298.06820913462434 180.51045L 186.29263070912566 180.51045L 186.29263070912566 158.3425"
                                                        fill="url(#SvgjsLinearGradient3644)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-rangebar-area"
                                                        index="1" clip-path="url(#gridRectMask6bmalobb)"
                                                        pathTo="M 186.29263070912566 158.3425L 298.06820913462434 158.3425L 298.06820913462434 180.51045L 186.29263070912566 180.51045L 186.29263070912566 158.3425"
                                                        pathFrom="M -669014.0954026441 158.3425L 186.29263070912566 158.3425L 186.29263070912566 180.51045L 186.29263070912566 180.51045L 186.29263070912566 158.3425"
                                                        cy="221.6795" cx="298.06820913462434" j="2" val="1552089600000"
                                                        barHeight="22.16795" barWidth="111.77557842549868"></path>
                                                    <path id="apexcharts-rangebar-area-1"
                                                        d="M 335.32673527649604 221.6795L 372.5852614182513 221.6795L 372.5852614182513 243.84744999999998L 335.32673527649604 243.84744999999998L 335.32673527649604 221.6795"
                                                        fill="url(#SvgjsLinearGradient3650)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-rangebar-area"
                                                        index="1" clip-path="url(#gridRectMask6bmalobb)"
                                                        pathTo="M 335.32673527649604 221.6795L 372.5852614182513 221.6795L 372.5852614182513 243.84744999999998L 335.32673527649604 243.84744999999998L 335.32673527649604 221.6795"
                                                        pathFrom="M -669014.0954026441 221.6795L 335.32673527649604 221.6795L 335.32673527649604 243.84744999999998L 335.32673527649604 243.84744999999998L 335.32673527649604 221.6795"
                                                        cy="285.0165" cx="372.5852614182513" j="3" val="1552262400000"
                                                        barHeight="22.16795" barWidth="37.25852614175528"></path>
                                                    <g id="SvgjsG3631" class="apexcharts-datalabels"></g>
                                                </g>
                                            </g>
                                            <line id="SvgjsLine3691" x1="0" y1="0" x2="484.36083984375"
                                                y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine3692" x1="0" y1="0" x2="484.36083984375"
                                                y2="0" stroke-dasharray="0" stroke-width="0"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG3693" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG3694" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG3695" class="apexcharts-point-annotations"></g>
                                        </g>
                                        <rect id="SvgjsRect3583" width="0" height="0" x="0" y="0"
                                            rx="0" ry="0" fill="#fefefe" opacity="1"
                                            stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                    </svg>
                                    <div class="apexcharts-tooltip light">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                        <div class="apexcharts-tooltip-series-group"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(89, 196, 188);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-label"></span><span
                                                        class="apexcharts-tooltip-text-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(99, 122, 174);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-label"></span><span
                                                        class="apexcharts-tooltip-text-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 622px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card appliances-grp">
                        <div class="body clearfix">
                            <div class="icon"><img alt="" src="{{ url('assets/images/air-conditioner.png') }}">
                            </div>
                            <div class="content">
                                <h6>Air Conditioner <span class="text-success">On</span></h6>
                                <p>Temprature <span class="text-warning">25° C</span></p>
                                <p>Status <span class="text-warning">Cooling On</span></p>
                            </div>
                        </div>
                        <div class="body clearfix">
                            <div class="icon"><img alt="" src="{{ url('assets/images/fridge.png') }}"></div>
                            <div class="content">
                                <h6>Fridge <span class="text-success">On</span></h6>
                                <p>Temprature <span class="text-primary">10° C</span></p>
                                <p>Status <span class="text-success">Stand By</span></p>
                            </div>
                        </div>
                        <div class="body clearfix">
                            <div class="icon"><img alt="" src="{{ url('assets/images/washing-machine.png') }}">
                            </div>
                            <div class="content">
                                <h6>Washing Machine <span class="text-success">On</span></h6>
                                <p>Remaining Time <span class="text-primary">01:23:21</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix row-deck" style='margin-left: -65px'>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Lights Indoor</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">All On</a></li>
                                        <li><a href="javascript:void(0);">All Off</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group">
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Kitchen</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Dining Room</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked="">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Living Room</h6>
                                    <span class="text-danger">Not Connected</span>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Kitchen</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Bath Room</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked="">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Store Room</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Lights Outdoor</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">All On</a></li>
                                        <li><a href="javascript:void(0);">All Off</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group">
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Front Door</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Garage</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Garden</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked="">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Back Door</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked="">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Pool</h6>
                                    <span class="text-danger">Fused</span>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Main Door</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Other Appliences</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">All On</a></li>
                                        <li><a href="javascript:void(0);">All Off</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group">
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">TV</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Apple Tv</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked="">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Sound Ststem</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked="">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Air Conditioner</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Fridge</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked="">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between list-group-item align-items-center">
                                    <h6 class="mb-0">Washing Machine</h6>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked="">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
