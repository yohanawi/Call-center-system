<?php
if (!empty($_GET['tid'] && !empty($_GET['product']))) {
  $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

  $tid = $GET['tid'];
  $product = $GET['product'];
} else {
  header('Location: ../payment.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="icon" type="image/png" sizes="16x16" href="/images/telephone-call.png">
  <title>Call-center | Success</title>
  <link href="/client/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="/client/css/Css.css">
  <!-- Bootstrap Core CSS -->
  <link href="/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
  <link href="/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <!-- animation CSS -->
  <link href="/admin/css/animate.css" rel="stylesheet">
  <!-- Menu CSS -->
  <link href="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
  <!-- animation CSS -->
  <link href="/admin/css/animate.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="/admin/css/style.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="/admin/css/colors/blue.css" id="theme" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
    <nav class="navbar navbar-default navbar-static-top m-b-0">
      <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <div class="top-left-part"><a class="logo" href="index.php"><b><img src="/images/telephone-call.png" style="width: 30px; height: 30px;" alt="home" /></b><span class="hidden-xs"><b>Callcenter</b></span></a></div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
          <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
          <li>
            <form role="search" class="app-search hidden-xs">
              <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a>
            </form>
          </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
          <!-- /.dropdown -->
          <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
          <!-- /.dropdown -->
        </ul>
      </div>
      <!-- /.navbar-header -->
      <!-- /.navbar-top-links -->
      <!-- /.navbar-static-side -->
    </nav>
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
          <li class="sidebar-search hidden-sm hidden-md hidden-lg">
            <!-- input-group -->
            <div class="input-group custom-search-form">
              <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
              </span>
            </div>
            <!-- /input-group -->
          </li>
          <li class="user-pro">
            <a href="#" class="waves-effect"><img src="/plugins/images/user.jpg" alt="user-img" class="img-circle"> <span class="hide-menu"> Account<span class="fa arrow"></span></span>
            </a>
            <ul class="nav nav-second-level">
              <li><a href="../profile.php"><i class="ti-user"></i>Profile</a></li>
              <li><a href="../settings.php"><i class="ti-settings"></i>Account Setting</a></li>
              <li><a href="../functions/logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
            </ul>
          </li>
          <li class="nav-small-cap m-t-10">--- Main Menu</li>
          <li> <a href="../index.php" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </a></li>
          <li> <a href="#" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="p"></i> <span class="hide-menu"> Leads <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li><a href="../leads.php">Create Leads</a></li>
              <li><a href="../manage-leads.php">Manage Leads</a></li>
            </ul>
          </li>
          <li class="nav-small-cap">--- Other</li>
          <li> <a href="../call.php" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="1"></i> <span class="hide-menu"> Call </a></li>
          <li> <a href="#" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="."></i> <span class="hide-menu"> Tickets <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li><a href="../ticket.php">Create-Ticket</a></li>
              <li><a href="../manage-ticket.php">Manage-Ticket </a></li>
            </ul>
          </li>
          <li> <a href="../payment.php" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="1"></i> <span class="hide-menu"> Payment </a></li>
          <li><a href="../functions/logout.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
        </ul>
      </div>
    </div>
    <!-- Page Content -->
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row bg-title">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"></h4>
          </div>
          <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
              <li><a href="#">Dashboard</a></li>
              <li class="active">Payment-Success</li>
            </ol>
          </div>
        </div>
        <!--.row-->
        <div class="row">
          <div class="col-md-12">
            <div class="white-box">
              <div class="container mt-4">
                <h2>Thank you for purchasing <?php echo $product; ?></h2>
                <hr>
                <p>Your transaction ID is: <span><?php echo $tid; ?></span></p>
                <p>Check your email for more info</p>
                <div class="row">
                  <div class="col">
                    <p><a href="../payment.php" class="btn btn-light mt-2">Go Back</a></p>
                  </div>
                  <p><a href="customers.php" class="btn btn-light mt-2">Customers</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <?php include '../components/sidebar.php'; ?>
      </div>
      <!-- /.container-fluid -->
      <?php include '../components/footer.php'; ?>
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- jQuery -->

  <script src="/plugins/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="/admin/bootstrap/dist/js/tether.min.js"></script>
  <script src="/admin/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
  <!-- Menu Plugin JavaScript -->
  <script src="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
  <!--slimscroll JavaScript -->
  <script src="/admin/js/jquery.slimscroll.js"></script>
  <!--Wave Effects -->
  <script src="/admin/js/waves.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="/admin/js/custom.min.js"></script>
  <script src="/admin/js/jasny-bootstrap.js"></script>
  <!-- start - This is for export functionality only -->
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
  <!-- end - This is for export functionality only -->
  <!--Style Switcher -->
  <script src="/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

</body>

</html>