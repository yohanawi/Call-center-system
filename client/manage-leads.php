<?php
ob_start();
require_once "functions/db.php";
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("location: login.php");
    exit;
}
$email = $_SESSION['email'];

$sql = "SELECT * FROM phone";
$query = mysqli_query($connection, $sql);
$sql_leads = "SELECT * FROM leads";
$query_leads = mysqli_query($connection, $sql_leads);
$sql_ticket = "SELECT * FROM ticket";
$query_ticket = mysqli_query($connection, $sql_ticket);
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
    <title>Call-center | Manage Leads</title>
    <!-- Bootstrap Core CSS -->
    <link href="../admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="../admin/css/animate.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="../admin/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../admin/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../admin/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
</head>

<body>
    <div id="wrapper">
        <!--header-->
        <?php include './components/header.php'; ?>
        <!-- Left navbar-header -->
        <?php include './components/navbar.php'; ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"></div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Leads</a></li>
                            <li class="active">Manage Leads</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--.row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Lead Profile</h3></br>
                            <div class="row">
                                <div class="col-sm-12 col-xs-6">
                                    <?php
                                    $query_leads = mysqli_query($connection, "SELECT * FROM leads WHERE email= '$email'");
                                    while ($row = mysqli_fetch_array($query_leads)) {
                                    ?>
                                        <div class="row">
                                            <img src="../plugins/images/user.jpg" alt="user-img" class="img-circle" style="margin-left: 150px; width: 250px;">
                                        </div>
                                        <div class="row" style="margin-left: 100px; margin-top: 30px">
                                            <div class="col-md-12">
                                                <label>Phone :</label> <?php echo $row['phone']; ?>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Email :</label> <?php echo $row['email']; ?>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Assignet to :</label> <?php echo $row['assign']; ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-6" style="margin-left: 150px; margin-top: 30px;">
                                        <button class="btn btn-success waves-effect waves-light m-r-10" onclick="myFunction1()">Profile</button>
                                        <button class="btn btn-success waves-effect waves-light m-r-10" onclick="myFunction2()">Call</button>
                                        <button class="btn btn-success waves-effect waves-light m-r-10" onclick="myFunction3()">Ticket</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" id="profiletab">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Profile Details</h3>
                            <p class="text-muted m-b-30 font-13"> (lead profile Details) </p>
                            <div class="row">
                                <?php
                                $query_leads = mysqli_query($connection, "SELECT * FROM leads WHERE email= '$email'");
                                while ($row = mysqli_fetch_array($query_leads)) {
                                ?>
                                    <div class="col-sm-12 col-xs-6">
                                        <div class="mb-3">
                                            <label>First Name</label>
                                            <p class="form-control"><?php echo $row['fname']; ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Last Name</label>
                                            <p class="form-control"><?php echo $row['lname']; ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <label>NIC</label>
                                            <p class="form-control"><?php echo $row['nic']; ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Phone</label>
                                            <p class="form-control"><?php echo $row['phone']; ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <p class="form-control"><?php echo $row['email']; ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Birthday</label>
                                            <p class="form-control"><?php echo $row['birthday']; ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Address</label>
                                            <p class="form-control"><?php echo $row['address']; ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Gender</label>
                                            <p class="form-control"><?php echo $row['gender']; ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="calltab">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Calls Log( <x style="color: orange;"><?php echo mysqli_num_rows($query); ?></x> )</h3>
                            <div class="row">
                                <div class="col-sm-12 col-xs-6">
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <?php
                                            if (mysqli_num_rows($query) == 0) {
                                                echo "<i style='color:brown;'>No Phone calls Here :( </i> ";
                                            } else {
                                                echo '
                                                <thead>
                                                    <tr>
                                                        <th>Number</th>
                                                        <th>Name</th>
                                                        <th>Duration</th>
                                                        <th>comment</th>
                                                        <th>status</th>
                                                        <th>Rate</th>
                                                        <th>DATE</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>';
                                            }
                                            while ($row = mysqli_fetch_array($query)) {
                                                // $id = $row["id"]
                                                echo '
                                                    <tr>
                                                        <td>' . $row["number"] . '</td>
                                                        <td>' . $row["name"] . '</td>
                                                        <td>' . $row['stime'] . '  ' . $row['etime'] . '</td>
                                                        <td>' . $row["comment"] . '</td>
                                                        <td>' . $row["rate"] . '</td>
                                                        <td>' . $row["status"] . '</td>
                                                        <td>' . $row["date"] . '</td>
                                                        <td><a href="#"><i class="fa fa-trash"  data-toggle="modal" data-target="#responsive-modal' . $row["id"] . '" title="remove" style="color:red;"></i></a></td>
                                                        <!-- /.modal -->
                                                        <div id="responsive-modal' . $row["id"] . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Are you sure you want to delete this phone call?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="functions/delete.php" method="post">
                                                                            <input type="hidden" name="id" value="' . $row["id"] . '"/>
                                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <!-- End Modal -->
                                                    </tr>
                                                ';
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <a href="#" class="btn btn-info btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">View All logs</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" id="tickettab">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Tickes( <x style="color: orange;"><?php echo mysqli_num_rows($query_ticket); ?></x> )</h3>
                            <?php
                            $sql_ticket = "SELECT * FROM ticket";
                            $query_tickets = mysqli_query($connection, $sql_ticket);
                            $num = mysqli_num_rows($query_tickets);
                            if ($num > 0) {
                                while ($row = mysqli_fetch_array($query_tickets)) {
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="grid simple no-border">
                                        <div class="grid-title no-border descriptive clickable">
                                            <p><span class="text-success bold">Ticket #<?php echo $row['id']; ?></span> - Created on <?php echo $row['date']; ?></p>
                                            <h4 class="semi-bold"><?php echo $row['subject']; ?></h4>
                                            <div class="info"><?php echo $row['priority']; ?> </div>
                                            <div class="info"><?php echo $row['tasktype']; ?> </div>
                                            <div class="info"><?php echo $row['description']; ?></div>
                                            <hr>
                                        </div>
                                        <?php
                                        }
                                    } else {
                                            ?>
                                            <h3 align="center" style="color:red;">No Record found</h3>
                                        <?php
                                    }
                                        ?>
                                        <a href="manage-ticket.php" class="btn btn-info btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">View All Tickets</a>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--./row-->
    <?php include './components/sidebar.php'; ?>
    </div>
    <!-- /.container-fluid -->
    <?php include './components/footer.php'; ?>
    </div>
    <!-- /#page-wrapper -->
    </div>
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
    <!-- Custom Theme JavaScript -->
    <script src="../admin/js/custom.min.js"></script>
    <script src="../admin/js/jasny-bootstrap.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

    <script>
        function myFunction1() {
            var x = document.getElementById("profiletab");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function myFunction2() {
            var x = document.getElementById("calltab");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function myFunction3() {
            var x = document.getElementById("tickettab");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
</body>

</html>