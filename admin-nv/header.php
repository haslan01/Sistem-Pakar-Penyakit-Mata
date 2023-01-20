<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible"
    content="IE=edge,chrome=1"><![endif]-->
    <title>Sistem Pakar | DempsterShafer</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/templatemo_main.css">
    <!-- Dashboard Template
    http://www.templatemo.com/preview/templatemo_415_dashboard -->
</head>
<body>
    <div class="navbar " role="navigation">
        <div class="navbar-header">
            <div class="logo">
                <h1>Dashboard - Admin | Metode Naive Bayes</h1>
            </div>
            <button
                type="button"
                class="navbar-toggle"
                data-toggle="collapse"
                data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
    <div class="template-page-wrapper">
        <div class="navbar-collapse collapse templatemo-sidebar">
            <ul class="templatemo-sidebar-menu">
                <li>
                    <form class="navbar-form">
                        <input
                            type="text"
                            class="form-control"
                            id="templatemo_search_box"
                            placeholder="Search...">
                        <span class="btn btn-default">Go</span>
                    </form>
                </li>
                <li class="active">
                    <a href="homepage.php">
                        <i class="fa fa-home"></i>Dashboard</a>
                </li>
                <li class="sub open">
                    <a href="javascript:;">
                        <i class="fa fa-database"></i>Master Data
                        <div class="pull-right">
                            <span class="caret"></span></div>
                    </a>
                    <ul class="templatemo-submenu">
                        <li>
                            <a href="data_penyakit.php">
                                <span class="badge pull-right"></span>Data Penyakit & Solusi</a>
                        </li>
                        <li>
                            <a href="data_gejala.php">
                                <span class="badge pull-right"></span>Data Gejala</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="data_laporan.php">
                        <i class="fa fa-database"></i>
                        <span class="badge pull-right"></span>Laporan</a>
                </li>
                <!-- <li class="sub open">
                    <a href="javascript:;">
                        <i class="fa fa-database"></i>Laporan<div class="pull-right">
                            <span class="caret"></span></div>
                    </a>
                    <ul class="templatemo-submenu">
                        <li>
                            <a href="lapgejala.php">Laporan Gejala</a>
                        </li>
                        <li>
                            <a href="lapuser.php">
                                <span class="badge pull-right"></span>Laporan User</a>
                        </li>
                    </ul>
                </li> -->
                <!--<li><a href="manage_user.php"><i class="fa fa-users"></i><span class="badge
                pull-right">NEW</span>Manage Users</a></li>-->
                <li>
                    <a href="javascript:;" data-toggle="modal" data-target="#confirmModal">
                        <i class="fa fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>
        <!--/.navbar-collapse -->

        <!-- Modal -->
        <div
            class="modal fade"
            id="confirmModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Apakah anda ingin keluar program ?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="../index.php" class="btn btn-primary">Yes</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/templatemo_script.js"></script>
        <script type="text/javascript">
            // Line chart
            var randomScalingFactor = function () {
                return Math.round(Math.random() * 100)
            };
            var lineChartData = {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July"
                ],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor()
                        ]
                    }, {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor()
                        ]
                    }
                ]

            }

            window.onload = function () {
                var ctx_line = document
                    .getElementById("templatemo-line-chart")
                    .getContext("2d");
                window.myLine = new Chart(ctx_line).Line(lineChartData, {responsive: true});
            };

            $('#myTab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            });

            $('#loading-example-btn').click(function () {
                var btn = $(this);
                btn.button('loading');
                // $.ajax(...).always(function () {   btn.button('reset'); });
            });
        </script>