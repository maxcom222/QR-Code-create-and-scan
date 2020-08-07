@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/bootstrap.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/bootstrap-extended.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/charts/apexcharts.css") }}">
    <style>
        #map {
            height: 100%;
        }
        .pagination .page-item.next .page-link:after{
            content: none;
        }
        .pagination .page-item.prev .page-link:before, .pagination .page-item.previous .page-link:before{
            content: none;
        }
        .dropdown .btn:not(.btn-sm):not(.btn-lg), .dropdown .btn:not(.btn-sm):not(.btn-lg).dropdown-toggle
        {
            padding: 0 !important;
        }
    </style>
@endsection

@section('content')

    @include('layouts.topnav')

    <div id="layoutSidenav">

        @include('layouts.sidenav')
        <div id="layoutSidenav_content">
            <main>

                <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <span>Dashboard</span>
                            </h1>
                            <div class="page-header-subtitle">Campaigns and QR code scans tracking.</div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">Usage Statistics</div>
                                <div class="card-body">
                                    <canvas id="line-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">Maps</div>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block ml-2">
                                        <fieldset>
                                            <div class="vs-radio-con">
                                                <input type="radio" name="condition" checked value="today">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Scanned Today</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="d-inline-block ml-2">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-success">
                                                <input type="radio" name="condition" value="week">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Scanned This Week</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="d-inline-block ml-2">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-success">
                                                <input type="radio" name="condition" value="month">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Scanned This Month</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="d-inline-block ml-2">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-success">
                                                <input type="radio" name="condition" value="all">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">All Scans</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                </ul>
                                <div class="card-body">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-4">
                        <div class="card-header">QR Code Access Hits</div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Hit Date</th>
                                        <th>Campain Name</th>
                                        <th>Location</th>
                                        <th>Browser</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pageconfig['rs'] as $row)
                                        <tr>
                                            <td>{{ $row->created_at }}</td>
                                            <td>{{ $row->qrcode }}</td>
                                            <td>{{ $row->location }}</td>
                                            <td>{{ $row->browser }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>



            </main>
            @include('layouts.footer')
        </div>
    </div>

@endsection
@section('scripts')
    @parent
    <script src="{{ asset("app-assets/vendors/js/charts/apexcharts.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/charts/chart.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/extensions/tether.min.js") }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsucrEdmswqYrw0f6ej3bf4M4suDeRgNA"
        defer
    ></script>
    <script>
        // : AIzaSyCowNQPL0HofJEqMD6-dbpMAaP1x9fsNk4
        //ubold : AIzaSyDsucrEdmswqYrw0f6ej3bf4M4suDeRgNA
        let map;
        function initMap(value) {
            var mapCenter = new google.maps.LatLng(52, 15.3);
            var mapOptions = {
                zoom: 3,
                center: mapCenter,
                zoomControl: true,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.LEFT_CENTER
                },
                streetViewControl: true,
                streetViewControlOptions: {
                    position: google.maps.ControlPosition.LEFT_TOP
                },
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                minZoom: 1
            };
            var infowindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var locations = [];
            $.ajax({
                url: "{{ url('/getCcoordinates') }}",
                data: "type="+value,
                dataType: "json",
                success : function (data) {
                    for (const r in data) {
                        locations.push([data[r].location, parseFloat(data[r].gpslat), parseFloat(data[r].gpslng)])
                    }
                    for (i = 0; i < locations.length; i++) {
                        let marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                            map: map
                        })
                        const infowindow = new google.maps.InfoWindow({
                            content: locations[i][0] + "<p class='mb-0'>Latitude: " + locations[i][1] + ", Longitude:" + locations[i][2] + "</p>"
                        });
                        google.maps.event.addListener(marker, "click", () => {
                            $(".gm-style-iw-c").remove();
                            $(".gm-style-iw-t").remove();
                            infowindow.open(map, marker);
                        });
                    }
                },
                failure: function () {

                }
            });
        }
        $(document).ready(function () {
            $('input[type=radio][name=condition]').change(function() {
                initMap(this.value);
            });
            initMap("today");
            initBarChart();
            $("#line-chart").css("min-height", "450px");
            $("#map").css("height", (parseFloat($("#line-chart").css("height").replace("px", "")) - 23 - 8) + "px");
        });
        function initBarChart() {
            let campaigns = @php echo $campaigns; @endphp;
            let values = @php echo $values; @endphp;
            var $primary = '#7367F0';
            var $success = '#28C76F';
            var $danger = '#EA5455';
            var $warning = '#FF9F43';
            var $label_color = '#1E1E1E';
            var grid_line_color = '#dae1e7';
            var scatter_grid_color = '#f3f3f3';
            var $scatter_point_light = '#D1D4DB';
            var $scatter_point_dark = '#5175E0';
            var $white = '#fff';
            var $black = '#000';
            var themeColors = [];
            for (var i = 0; i < values.length; i++)
                themeColors.push($success);
            var barChartctx = $("#line-chart");
            // Chart Options
            var barchartOptions = {
                // Elements options apply to all of the options unless overridden in a dataset
                // In this case, we are setting the border of each bar to be 2px wide
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderSkipped: 'left'
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                responsiveAnimationDuration: 500,
                legend: { display: false },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            color: grid_line_color,
                        },
                        scaleLabel: {
                            display: true,
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            color: grid_line_color,
                        },
                        scaleLabel: {
                            display: true,
                        },
                        ticks: {
                            stepSize: 10
                        },
                    }],
                },
                title: {
                    display: true,
                    text: ''
                },

            };
            // Chart Data
            var barchartData = {
                labels: campaigns,
                datasets: [{
                    label: "Scanned Count",
                    data: values,
                    backgroundColor: themeColors,
                    borderColor: "transparent"
                }]
            };

            var barChartconfig = {
                type: 'bar',

                // Chart Options
                options: barchartOptions,

                data: barchartData
            };

            // Create the chart
            var barChart = new Chart(barChartctx, barChartconfig);
        }
    </script>
@endsection
