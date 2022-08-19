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
    <title>Call-center | Profile</title>
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?php echo $email; ?></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Account</a></li>
                            <li class="active">Profile</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--.row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Profile</h3>
                            <p class="text-muted m-b-30 font-13"> (Profile Update) </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-6">
                                    <form action="functions/update.php" method="POST">
                                        <?php
                                        $query = mysqli_query($connection, "SELECT * FROM users WHERE email= '$email'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <input type="hidden" name="id" value="<?php $row['id']; ?>" />
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                                    <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                                    <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-mobile"></i></div>
                                                    <input type="number" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-email"></i></div>
                                                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required="">
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="panel-footer">
                                            <button class="btn btn-default" type="reset">Clear Form</button>
                                            <input type="submit" value="Update" name="update" class="btn btn-primary pull-right">
                                        </div>
                                    </form>
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
</body>

</html>