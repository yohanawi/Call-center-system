<?php
ob_start();
require_once "functions/db.php"; //databse connection
session_start(); // If session variable is not set it will redirect to login page
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("location: login.php");
    exit;
}
$email = $_SESSION['email'];

$sql_contacts = "SELECT * FROM contacts";
$query_contacts = mysqli_query($connection, $sql_contacts);
$sql_subscribers = "SELECT * FROM subscribers";
$query_subscribers = mysqli_query($connection, $sql_subscribers);
$sql_phone = "SELECT * FROM phone";
$query_phone = mysqli_query($connection, $sql_phone);
$sql_ticket = "SELECT * FROM ticket";
$query_ticket = mysqli_query($connection, $sql_ticket);
$sql_agent = "SELECT * FROM agent";
$query_agent = mysqli_query($connection, $sql_agent);
$chart_data = "";
while ($row = mysqli_fetch_array($query_agent)) {

    $productname[]  = $row['company'];
    $sales[] = $row['id'];
}
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
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                            <h5 class="text-muted vb">Tickets</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger"><?php echo mysqli_num_rows($query_ticket); ?></h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                            <h5 class="text-muted vb">Phone Call log</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-megna"><?php echo mysqli_num_rows($query_phone); ?></h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                            <h5 class="text-muted vb">Contact Messages</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-primary"><?php echo mysqli_num_rows($query_contacts); ?></h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6  b-0">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                                            <h5 class="text-muted vb">Call-center Subscribers</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-success"><?php echo mysqli_num_rows($query_subscribers); ?></h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <div style="width:50%;hieght:40%;text-align:center">
                                <h2 class="page-header">Agents</h2>
                                <div>Company </div>
                                <canvas id="chartjs_pie"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
                <div class="row">
                <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <div id="myChart2" style="width:100%; max-width:600px; height:500px;"></div>
                            <?php
                            $chkresults2 = mysqli_query($connection, "SELECT date(date) AS date, COUNT(*) AS id FROM subscribers GROUP BY date(date)");
                            ?>
                            <script>
                                google.charts.load('current', {
                                    packages: ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart2);

                                function drawChart2() {
                                    // Set Data
                                    var data = google.visualization.arrayToDataTable([
                                        ['Date', 'Subscribers'],
                                        <?php
                                        while ($row = mysqli_fetch_assoc($chkresults2)) {
                                            echo "['" . $row["date"] . "'," . $row["id"] . "],";
                                        }
                                        ?>
                                    ]);
                                    // Set OptionsS
                                    var options = {
                                        title: 'Subscribers',
                                        hAxis: {
                                            title: 'Date'
                                        },
                                        vAxis: {
                                            title: 'ID'
                                        },
                                        legend: 'none'
                                    };
                                    // Draw
                                    var chart = new google.visualization.LineChart(document.getElementById('myChart2'));
                                    chart.draw(data, options);
                                }
                            </script>
                        </div>
                    </div>
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
                </div>
                <!--row-->
                <div class="row">
                <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent Messages</h3>
                            <div class="comment-center">
                                <div class="comment-body">
                                    <div class="mail-contnet">
                                        <?php
                                        if (mysqli_num_rows($query_contacts) == 0) {
                                            echo "<i style='color:brown;'>There are no massages yet :( </i> ";
                                        } else {
                                            $counter = 0;
                                            $max = 3;
                                            while ($row2 = mysqli_fetch_array($query_contacts)) {
                                                $id = $row2["id"];
                                                $sql2 = "SELECT * FROM contacts WHERE id='$id'";
                                                $query2 = mysqli_query($connection, $sql2);
                                                while (($row3 = mysqli_fetch_assoc($query2)) and ($counter < $max)) {
                                                    echo '<b>' . $row2["names"] . '</b>
                                                                <h5>Email : ' . $row3["email"] . '</h5>
                                                                <span class="mail-desc">' . $row2["message"] . '</span> <span class="time pull-right">' . $row2["date"] . '</span>';
                                                    $counter++;
                                                }
                                            }
                                        }
                                        ?>
                                        <hr>
                                        <a href="inbox.php" class="btn btn-info btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">View All Messages</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <div class="row sales-report">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h2>Call Center 2022</h2>
                                    <p>Tickets</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <h1 class="text-right text-success m-t-20"><?php echo mysqli_num_rows($query_ticket); ?></h1>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <?php
                                    if (mysqli_num_rows($query_ticket) == 0) {
                                        echo "<i style='color:brown;'>No Posts Yet :( Upload first today! </i> ";
                                    } else {
                                        echo '<thead>
                                                        <tr>
                                                            <th>Subject</th>
                                                            <th>DATE</th>
                                                            <th>Description</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
                                    }
                                    $counter = 0;
                                    $max = 3;
                                    while (($row = mysqli_fetch_array($query_ticket)) and ($counter < $max)) {
                                        $id = $row["id"];
                                        $sql2 = "SELECT * FROM ticket WHERE id=$id";
                                        $query2 = mysqli_query($connection, $sql2);
                                        echo '<tr>
                                                <td class="txt-oflo">' . $row["subject"] . '</td>
                                                <td class="txt-oflo">' . $row["date"] . '</td>
                                                <td class="txt-oflo">' . $row["description"] . '</td>
                                                <td class="txt-oflo" style="color: red;">' . $row["status"] . '</td>
                                                
                                            </tr>';
                                        $counter++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <a href="manage-ticket.php" class="btn btn-info btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">View All Tickets</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- line chart -->
                <!-- /.row -->
                <!-- .right-sidebar -->
                <?php include './components/sidebar.php'; ?>
            </div>
            <!-- /.container-fluid -->
            <?php include './components/footer.php'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.toast({
                heading: 'Welcome to Call-center admin',
                text: 'view, edit and upload new posts to keep your users engaged.',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'info',
                hideAfter: 3700,
                stack: 6
            })
        });
    </script>

    <script src="../client/assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
    <script src="../client/assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
    <script src="../client/assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
    <script type="text/javascript" src="js/highcharts.js"></script>
    <script type="text/javascript" src="js/exporting.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById("chartjs_pie").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($productname); ?>,
            datasets: [{
                backgroundColor: [
                    "#5969ff",
                    "#ff407b",
                    "#25d5f2",
                    "#ffc750",
                    "#2ec551",
                    "#7040fa",
                    "#ff004e"
                ],
                data: <?php echo json_encode($sales); ?>,
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },


        }
    });
</script>

</html>