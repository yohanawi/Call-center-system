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
    <title>Call-center | Settings</title>
    <!-- Bootstrap Core CSS -->
    <link href="../admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="../admiin/css/animate.css" rel="stylesheet">
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
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
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
                            <li class="active">Settings</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--.row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Change Your Account Settings</h3>
                            <p class="text-muted m-b-30 font-13"> (Password Update) </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="functions/settings.php" method="post">
                                        <!-- EMAIL HIDDEN -->
                                        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" />
                                        <!-- EMAIL HIDDEN -->
                                        <div class="form-group">
                                            <label for="exampleInputpwd1">New Password</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input type="password" name="password" id="Password" class="form-control" id="exampleInputpwd1" placeholder="Enter Password" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputpwd2">Confirm Password</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input type="password" name="password2" id="ConfirmPassword" class="form-control" id="exampleInputpwd2" placeholder="Confirm Password" required="">
                                            </div>
                                            <div id="msg" style="padding-left: 10px;"></div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
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
    <!--END CHECK IF PASSWORDS MATCH -->
</body>

</html>