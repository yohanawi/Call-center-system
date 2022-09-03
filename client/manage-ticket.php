<?php
ob_start();
require_once "functions/db.php";

$sql_ticket = "SELECT * FROM ticket";
$query_tickets = mysqli_query($connection, $sql_ticket);
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
    <title>Call-center | Manage ticket</title>
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Ticket</a></li>
                            <li class="active">Manage Ticket</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--.row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Tickets</h3></br>
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
                                                    <h4 class="semi-bold"><?php echo $row['subject']; ?></h4>
                                                    <p><span class="text-success bold">Ticket #<?php echo $row['id']; ?></span> - Created on <?php echo $row['date']; ?>
                                                        <span class="label label-important" style="color: red;"><?php echo $row['status']; ?></span>
                                                    </p>
                                                </div>
                                                <div class="grid-body  no-border" style="display:none">
                                                    <div class="post">
                                                        <div class="info-wrapper">
                                                            <div class="info"><?php echo $row['priority']; ?> </div>
                                                            <div class="info"><?php echo $row['description']; ?> </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <br>
                                                    <?php
                                                    if ($row['priority'] != '') :
                                                    ?>
                                                        <div class="form-actions">
                                                            <div class="post col-md-12">
                                                                <div class="user-profile-pic-wrapper">
                                                                    <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="assets/img/admin.png" data-src="assets/img/admin.png" src="assets/img/admin.png" alt="Admin"> </div>
                                                                </div>
                                                                <div class="info-wrapper">
                                                                    <?php echo $row['admin_remark']; ?>
                                                                    <hr>
                                                                    <p class="small-text">Posted on <?php echo $row['date']; ?></p>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php }
                                } else { ?>
                                        <h3 align="center" style="color:red;">No Record found</h3>
                                    <?php } ?>
                                        </div>
                                    </div>
                        </div>
                    </div>
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
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="assets/js/support_ticket.js" type="text/javascript"></script>
</body>

</html>