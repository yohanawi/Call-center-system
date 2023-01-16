<?php
ob_start();
require_once "functions/db.php"; //databse connection
session_start(); // If session variable is not set it will redirect to login page
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("location: clogin.php");
    exit;
}
$email = $_SESSION['email'];

$sql_user = "SELECT * FROM leads";
$query_user = mysqli_query($connection, $sql_user);
$sql_ticket = "SELECT * FROM ticket";
$query_ticket = mysqli_query($connection, $sql_ticket);
$sql_phone = "SELECT * FROM phone";
$query_phone = mysqli_query($connection, $sql_phone);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/telephone-call.png">
    <title>Call-center</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <!-- Bootstrap Core CSS -->
    <link href="../admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="../admin/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="../client/css/css.css">
    <!-- Custom CSS -->
    <link href="../admin/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

    <div id="wrapper">
        <!--header-->
        <?php include './components/header.php'; ?>
        <!-- Left navbar-header -->
        <?php include './components/navbar.php'; ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php include './components/path.php'; ?>
                <?php
                if (isset($_GET['set'])) {
                    echo '<div class="alert alert-success" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>DONE!! </strong><p> Your password has been successfully updated.</p>
                            </div>';
                }
                ?>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-4 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="n" class="linea-icon linea-basic"></i>
                                            <h5 class="text-muted vb">Profile</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger"><?php echo mysqli_num_rows($query_user); ?></h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="." class="linea-icon linea-basic"></i>
                                            <h5 class="text-muted vb">Tickets</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger"><?php echo mysqli_num_rows($query_ticket); ?></h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="V" class="linea-icon linea-basic"></i>
                                            <h5 class="text-muted vb">Phone log</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger"><?php echo mysqli_num_rows($query_phone); ?></h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <div class="row sales-report">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h2>Phone Call log</h2>
                                    <p>Call logs</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <h1 class="text-right text-success m-t-20"><?php echo mysqli_num_rows($query_phone); ?></h1>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <?php
                                    if (mysqli_num_rows($query_phone) == 0) {
                                        echo "<i style='color:brown;'>No logs Yet :( Upload first call log today! </i> ";
                                    } else {
                                        echo '<thead>
                                                            <tr>
                                                                <th>Number</th>
                                                                <th>DATE</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>';
                                    }
                                    $counter = 0;
                                    $max = 3;
                                    while (($row = mysqli_fetch_array($query_phone)) and ($counter < $max)) {
                                        $id = $row["id"];
                                        $sql2 = "SELECT * FROM phone WHERE id= $id";
                                        $query2 = mysqli_query($connection, $sql2);
                                        echo '<tr>
                                                    <td class="txt-oflo">' . $row["number"] . '</td>
                                                    <td class="txt-oflo">' . $row["date"] . '</td>
                                                    <td class="txt-oflo">' . $row["status"] . '</td>
                                                </tr>';
                                        $counter++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <a href="call.php" class="btn btn-info btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">View All logs</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <?php
                            $chkresults = mysqli_query($connection, "SELECT date(date) AS date, COUNT(*) AS number FROM phone GROUP BY date(date)");
                            ?>
                            <script type="text/javascript">
                                google.charts.load('current', {
                                    'packages': ['Bar']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Date', 'Number'],
                                        <?php
                                        while ($row = mysqli_fetch_assoc($chkresults)) {
                                            echo "['" . $row["date"] . "'," . $row["number"] . "],";
                                        }
                                        ?>
                                    ]);
                                    var options = {
                                        chart: {
                                            title: '',
                                        },
                                        bars: 'vertical',
                                        vAxis: {
                                            format: 'decimal'
                                        },
                                        height: 300,
                                        colors: ['#d95f02']
                                    };
                                    var chart = new google.charts.Bar(document.getElementById('bar-graph-location'));
                                    chart.draw(data, google.charts.Bar.convertOptions(options));
                                }
                            </script>
                            <!--location where bar graph will be displayed-->
                            <div id="bar-graph-location">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>
                            <?php
                            $chkresults = mysqli_query($connection, "SELECT date(date) AS date, COUNT(*) AS id FROM ticket GROUP BY date(date)");
                            ?>
                            <script>
                                google.charts.load('current', {
                                    packages: ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    // Set Data
                                    var data = google.visualization.arrayToDataTable([
                                        ['Date', 'Status'],
                                        <?php
                                        while ($row = mysqli_fetch_assoc($chkresults)) {
                                            echo "['" . $row["date"] . "'," . $row["id"] . "],";
                                        }
                                        ?>
                                    ]);
                                    // Set Options
                                    var options = {
                                        title: 'Tickets',
                                        hAxis: {
                                            title: 'Date'
                                        },
                                        vAxis: {
                                            title: 'ID'
                                        },
                                        legend: 'none'
                                    };
                                    // Draw
                                    var chart = new google.visualization.LineChart(document.getElementById('myChart'));
                                    chart.draw(data, options);
                                }
                            </script>

                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent Tickets</h3>
                            <div class="comment-center">
                                <div class="comment-body">
                                    <div class="mail-contnet">
                                        <?php
                                        if (mysqli_num_rows($query_ticket) == 0) {
                                            echo "<i style='color:brown;'>There are no tickets yet :( </i> ";
                                        } else {
                                            $counter = 0;
                                            $max = 3;
                                            while ($row2 = mysqli_fetch_array($query_ticket)) {
                                                $id = $row2["id"];
                                                $sql2 = "SELECT * FROM ticket WHERE id='$id'";
                                                $query2 = mysqli_query($connection, $sql2);
                                                while (($row3 = mysqli_fetch_assoc($query2)) and ($counter < $max)) {
                                                    echo '<b>' . $row2["tasktype"] . '</b>
                                                                    <h5>Blog Title : ' . $row3["subject"] . '</h5>
                                                                    <span class="mail-desc">' . $row2["description"] . '</span> <span class="time pull-right">' . $row2["date"] . '</span>';
                                                    $counter++;
                                                }
                                            }
                                        }
                                        ?>
                                        <hr>
                                        <a href="manage-ticket.php" class="btn btn-info btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
                <div class="row">

                </div>

                <!-- .right-sidebar -->
                <?php include './components/sidebar.php'; ?>
            </div>
            <!-- /.container-fluid -->
            <?php include './components/footer.php'; ?>
        </div>
        <!-- /#page-wrapper -->
        <!--floating button-->
    <div class="fabs" onclick="toggleBtn()">
        <div class="action">
            <i class="fas fa-plus" id="add"></i>
            <i class="fas fa-times" id="remove" style="display: none"></i>
        </div>
        <div class="btns">
            <a href="../client/functions/whatsapp.php" class="btnw" style="background: #25D366"><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../admin/bootstrap/dist/js/tether.min.js"></script>
    <script src="../admin/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../admin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../admin/js/waves.js"></script>
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../admin/js/custom.min.js"></script>
    <script src="../admin/js/dashboard1.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.toast({
                heading: 'Welcome to Call-center user',
                text: 'view, edit and upload new posts to keep your users engaged.',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'info',
                hideAfter: 3700,
                stack: 6
            })
        });
    </script>
    <script>
        function toggleBtn() {
            const Btns = document.querySelector(".btns");
            const add = document.getElementById("add");
            const remove = document.getElementById("remove");
            const btn = document.querySelector(".btns").querySelectorAll("a");
            Btns.classList.toggle("open");
            if (Btns.classList.contains("open")) {
                remove.style.display = "block";
                add.style.display = "none";
                btn.forEach((e, i) => {
                    setTimeout(() => {
                        bottom = 40 * i;
                        e.style.bottom = bottom + "px";
                        console.log(e);
                    }, 100 * i);
                });
            } else {
                add.style.display = "block";
                remove.style.display = "none";
                btn.forEach((e, i) => {
                    e.style.bottom = "0px";
                });
            }
        }
    </script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

</html>