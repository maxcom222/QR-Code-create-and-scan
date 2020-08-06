<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{ config('app.name', 'Laravel') . ' | ' . $pageconfig['title'] }}</title>
    <link rel="apple-touch-icon" href="{{ asset("app-assets/images/ico/apple-icon-120.png") }}">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.png" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/vendors.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/tables/datatable/datatables.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/charts/apexcharts.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/extensions/tether-theme-arrows.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/extensions/tether.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/extensions/shepherd-theme-default.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/extensions/toastr.css") }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/bootstrap.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/bootstrap-extended.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/colors.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/components.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/themes/dark-layout.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/themes/semi-dark-layout.css") }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/core/menu/menu-types/vertical-menu.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/core/colors/palette-gradient.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/pages/dashboard-analytics.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/pages/card-analytics.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/plugins/tour/tour.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/plugins/extensions/toastr.css") }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/style.css") }}">
    <!-- END: Custom CSS-->
    <style>
        html body .content{
            margin-left: 0px !important;
        }
        .header-navbar.floating-nav {
            width: calc(100vw - (100vw - 100%) - calc(2.2rem * 2)) !important;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-item nav-link dropdown-user-link" href="{{ url("/") }}">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600" style="margin-bottom: auto">User Panel</span>
                            </div>
                            <span>
                                <i class="feather icon-arrow-right"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card bg-analytics text-white">
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <img src="{{ asset("app-assets/images/elements/decore-left.png") }}" class="img-left" alt="card-img-left">
                                    <img src="{{ asset("app-assets/images/elements/decore-right.png") }}" class="img-right" alt="card-img-right">
                                    <div class="avatar avatar-xl bg-primary shadow mt-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-award white font-large-1"></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="mb-2 text-white" style="line-height: 37px;">GENERAL NOTIFICATION <br> SEND ALERT TO ALL USERS</h1>
{{--                                        <p class="m-auto w-75">You have done <strong>57.6%</strong> more sales today. Check your new badge in your profile.</p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-sliders text-primary font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25">{{ $compaigns_count }}</h2>
                                <p class="mb-0">QR Codes Created</p>
                            </div>
                            <div class="card-content">
                                <div id="subscribe-gain-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-wind text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25">{{ $compaignhits_count }}</h2>
                                <p class="mb-0">QR Codes Scanned</p>
                            </div>
                            <div class="card-content">
                                <div id="orders-received-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row pb-50">
                                        <div class="col-lg-6 col-12 d-flex justify-content-between flex-column order-lg-1 order-2 mt-lg-0 mt-2">
                                            <h2 class="text-bold-700 mb-25">User Management</h2>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row avg-sessions">
                                        <div class="col-12">
                                            <div class="table-responsive mt-1">
                                                <table class="table table-hover-animation mb-0" id="user_table">
                                                    <thead>
                                                    <tr>
                                                        <th>Email</th>
                                                        <th>Lock</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($users as $user)
                                                        <tr>
                                                            <td>{{$user->email}}</td>
                                                            <td>
                                                                <div class="custom-control custom-switch custom-switch-danger switch-lg mr-2">
                                                                    <input type="checkbox" {{ $user->islocked == 1 ? "checked" : "" }} onchange="lockUser(this.checked, {{ $user->id }})" class="custom-control-input" id="locked_{{ $user->id }}">
                                                                    <label class="custom-control-label" for="locked_{{ $user->id }}">
                                                                        <span class="switch-text-left">Locked</span>
                                                                        <span class="switch-text-right">Unlocked</span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-danger" id="btn_{{$user->id}}" onclick="deleteUser({{$user->id}})">Delete</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h2 class="text-bold-700 mb-25">QR Code Management</h2>
                                            <div class="table-responsive mt-1">
                                                <table class="table table-hover-animation mb-0" id="qrcode_table">
                                                    <thead>
                                                    <tr>
                                                        <th>QR Code</th>
                                                        <th>Review</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>#879985</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info">Review</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#156897</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info">Review</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#568975</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info">Review</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#245689</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info">Review</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#245689</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info">Review</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#245689</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info">Review</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#245689</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info">Review</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#245689</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info">Review</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#245689</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info">Review</button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between pb-0">
                                <h4 class="card-title">QR Code Scan Rate</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body pt-0">
                                    <div class="height-450">
                                        <canvas id="bar-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>
<!-- END: Content-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset("app-assets/vendors/js/vendors.min.js") }}"></script>
    <!-- BEGIN Vendor JS-->

    <script src="{{ asset("app-assets/vendors/js/tables/datatable/pdfmake.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/vfs_fonts.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/datatables.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/datatables.buttons.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/buttons.print.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js") }}"></script>

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset("app-assets/vendors/js/charts/apexcharts.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/charts/chart.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/extensions/tether.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/extensions/toastr.min.js") }}"></script>
{{--    <script src="{{ asset("app-assets/vendors/js/extensions/shepherd.min.js") }}"></script>--}}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset("app-assets/js/core/app-menu.js") }}"></script>
    <script src="{{ asset("app-assets/js/core/app.js") }}"></script>
    <script src="{{ asset("app-assets/js/scripts/components.js") }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
{{--    <script src="{{ asset("app-assets/js/scripts/pages/dashboard-analytics.js") }}"></script>--}}
    <!-- END: Page JS-->

    <script>
        let compaigns_values = @php echo $compaigns_values; @endphp;
        let compaignhits_values = @php echo $compaignhits_values; @endphp;
        let user_table, qrcode_table;
        $(document).ready(function () {
            user_table = $('#user_table').DataTable({
                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
                "columnDefs": [
                    { "orderable": false, "targets": 0 }
                ]
            });
            qrcode_table = $('#qrcode_table').DataTable({
                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
                "columnDefs": [
                    { "orderable": false, "targets": 0 }
                ]
            });
            var $primary = '#7367F0';
            var $warning = '#FF9F43';
            var gainedChartoptions = {
                chart: {
                    height: 100,
                    type: 'area',
                    toolbar: {
                        show: false,
                    },
                    sparkline: {
                        enabled: true
                    },
                    grid: {
                        show: false,
                        padding: {
                            left: 0,
                            right: 0
                        }
                    },
                },
                colors: [$primary],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2.5
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 0.9,
                        opacityFrom: 0.7,
                        opacityTo: 0.5,
                        stops: [0, 80, 100]
                    }
                },
                series: [{
                    name: 'Created Count',
                    data: compaigns_values
                }],

                xaxis: {
                    labels: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    }
                },
                yaxis: [{
                    y: 0,
                    offsetX: 0,
                    offsetY: 0,
                    padding: { left: 0, right: 0 },
                }],
                tooltip: {
                    x: { show: false }
                },
            }

            var gainedChart = new ApexCharts(
                document.querySelector("#subscribe-gain-chart"),
                gainedChartoptions
            );
            gainedChart.render();
            var orderChartoptions = {
                chart: {
                    height: 100,
                    type: 'area',
                    toolbar: {
                        show: false,
                    },
                    sparkline: {
                        enabled: true
                    },
                    grid: {
                        show: false,
                        padding: {
                            left: 0,
                            right: 0
                        }
                    },
                },
                colors: [$warning],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2.5
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 0.9,
                        opacityFrom: 0.7,
                        opacityTo: 0.5,
                        stops: [0, 80, 100]
                    }
                },
                series: [{
                    name: 'Scanned Count',
                    data: compaignhits_values
                }],

                xaxis: {
                    labels: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    }
                },
                yaxis: [{
                    y: 0,
                    offsetX: 0,
                    offsetY: 0,
                    padding: { left: 0, right: 0 },
                }],
                tooltip: {
                    x: { show: false }
                },
            }
            var orderChart = new ApexCharts(
                document.querySelector("#orders-received-chart"),
                orderChartoptions
            );
            orderChart.render();
            initBarChart();
        })
        function lockUser(state, user_id) {
            console.log(state + ":" +  user_id)
            if (state) {
                toastr.success('That user was locked successfully.', 'Notification', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    "closeButton": true,
                    "progressBar": true,
                    timeOut: 2000
                });
            }else{
                toastr.success('That user was unlocked successfully.', 'Notification', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    "closeButton": true,
                    "progressBar": true,
                    timeOut: 2000
                });
            }
        }
        function deleteUser(user_id) {
            toastr.info('That user was deleted successfully.', 'Notification', {
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                "closeButton": true,
                "progressBar": true,
                timeOut: 2000
            });
            user_table.row($("#btn_" + user_id).parents("tr")).remove().draw();
        }
        function initBarChart() {
            let campaigns = @php echo $campaigns; @endphp;
            let scanned_values = @php echo $scanned_values; @endphp;
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
            for (var i = 0; i < scanned_values.length; i++)
                themeColors.push($success);
            var barChartctx = $("#bar-chart");
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
                    data: scanned_values,
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

</body>
<!-- END: Body-->

</html>
