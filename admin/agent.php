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

$sql_agent = 'SELECT * FROM agent';
$query_agent = mysqli_query($connection, $sql_agent);
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
    <title>Call-center | Agent</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
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
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?php echo $email; ?></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Agent</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--.row-->
                <div class="row">
                    <div class="col-md-5">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Creating A New Agent</h3>
                            <p class="text-muted m-b-30 font-13"> Fill in the form below: </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="functions/new_admin.php" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Enter name" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-email"></i></div>
                                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputCom">Company</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input type="text" name="company" id="company" class="form-control" placeholder="Enter Company" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputphone">Phone</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input type="number" name="phone" id="phone" class="form-control" id="phone" placeholder="Confirm Phone" required="">
                                            </div>
                                            <div id="msg" style="padding-left: 10px;"></div>
                                        </div>
                                        <button type="submit" name="save" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="white-box">
                            <?php
                            if (isset($_GET["success"])) {
                                echo
                                '<div class="alert alert-success" >
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                            <strong>DONE!! </strong><p> The new Company Agent has been added. They can now log in to their account with their credentials.</p>
                                        </div>';
                            } elseif (isset($_GET["deleted"])) {
                                echo
                                '<div class="alert alert-warning" >
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                            <strong>DELETED!! </strong><p> The Agent has been successfully removed.</p>
                                        </div>';
                            } elseif (isset($_GET["del_error"])) {
                                echo
                                '<div class="alert alert-danger" >
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                            <strong>ERROR!! </strong><p> There was an error during deleting this record. Please try again.</p>
                                        </div>';
                            }
                            ?>
                            <h3 class="box-title m-b-0">Agents ( <x style="color: orange;"><?php echo mysqli_num_rows($query_agent); ?></x> )</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <?php
                                    if (mysqli_num_rows($query_agent) == 0) {
                                        echo "<i style='color:brown;'>No agents Here :( </i> ";
                                    } else {
                                        echo '
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Company</th>
                                                            <th>Phone</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                <tbody>';
                                    }
                                    while ($row = mysqli_fetch_array($query_agent)) {
                                        // $id = $row["id"]
                                        echo '
                                                    <tr>
                                                        <td>' . $row["name"] . '</td>
                                                        <td>' . $row["email"] . '</td>
                                                        <td>' . $row["company"]. '</td>
                                                        <td>' . $row["phone"]. '</td>
                                                        <td><a href="#"><i class="fa fa-trash"  data-toggle="modal" data-target="#responsive-modal' . $row["id"] . '" title="remove" style="color:red;"></i></a></td>
                                                        <!-- /.modal -->
                                                        <div id="responsive-modal' . $row["id"] . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Are you sure you want to delete this agent?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="functions/del_agent.php" method="post">
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
                            </div>
                        </div>
                    </div>
                </div>
                <!--./row-->
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
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/jasny-bootstrap.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

    <!-- CHECK IF PASSWORDS MATCH -->
    <script>
        $(document).ready(function() {
            $("#ConfirmPassword").keyup(function() {
                if ($("#Password").val() != $("#ConfirmPassword").val()) {
                    $("#msg").html("Password do not match").css("color", "red");
                } else {
                    $("#msg").html("Password matched").css("color", "green");
                }
            });
        });
    </script>
    <!--END CHECK IF PASSWORDS MATCH -->

</body>

</html>