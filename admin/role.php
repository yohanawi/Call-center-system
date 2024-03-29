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
$sql = 'SELECT * FROM role';
$query = mysqli_query($connection, $sql);
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
    <title>Call-center | Roles</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
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
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Role</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Create Role</h3>
                            <p class="text-muted m-b-30 font-13"> (role) </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-6">
                                    <form action="functions/new_admin.php" method="POST">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <input type="text" name="role" class="form-control" required="">
                                        </div>
                                        <div class="form-group text-center m-t-20">
                                            <div class="col-xs-12">
                                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="insert">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-12">
                        <div class="white-box">
                            <!-- row -->
                            <div class="row">
                                <div class="col-lg-12 col-md-9 col-sm-12 col-xs-12 mail_listing">
                                    <div class="inbox-center">
                                        <?php
                                        if (isset($_GET["deleted"])) {
                                            echo
                                            '<div class="alert alert-warning" >
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                                    <strong>DELETED!! </strong><p> The role has been successfully deleted.</p>
                                                    </div>';
                                        } elseif (isset($_GET["del_error"])) {
                                            echo
                                            '<div class="alert alert-danger" >
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                                    <strong>ERROR!! </strong><p> There was an error during deleting this record. Please try again.</p>
                                                    </div>';
                                        }
                                        ?>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <h4>Call-center Role(<b style="color: orange;"><?php echo mysqli_num_rows($query); ?></b>)</h4>
                                                        <?php
                                                        if (mysqli_num_rows($query) == 0) {
                                                            echo "<i style='color:brown;'>No role Yet :( </i> ";
                                                        } else {
                                                            echo '<thead>
                                                                            <tr>
                                                                                <th>Role</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                    <tbody>';
                                                        }
                                                        ?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_array($query)) {
                                                    echo '
                                                            <tr>
                                                                <td class="hidden-xs">' . $row["role"] . '</td>
                                                                <td><a href="#"><i class="fa fa-trash"  data-toggle="modal" data-target="#responsive-modal' . $row["id"] . '" title="remove" style="color:red;"></i></a></td>
                                                                <!-- /.modal -->
                                                                <div id="responsive-modal' . $row["id"] . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                <h4 class="modal-title">Are you sure you want to delete this role?</h4>
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
                                                            </tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-7 m-t-20"> Showing 1 - <?php echo mysqli_num_rows($query); ?> </div>
                                        <div class="col-xs-5 m-t-20">
                                            <div class="btn-group pull-right">
                                                <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-left"></i></button>
                                                <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
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
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>