<?php
ob_start();
require_once "functions/db.php";

$sql = "SELECT * FROM phone";
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
    <title>Call-center | Call</title>
    <link href="../client/css/style.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="../admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
        <?php include './components/header.php'; ?>
        <!-- Left navbar-header -->
        <?php include './components/navbar.php'; ?>
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
                            <li class="active">Call</li>
                        </ol>
                    </div>
                </div>
                <!--.row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Create Call</h3>
                            <p class="text-muted m-b-30 font-13"> (New Call) </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-6">
                                    <form action="functions/new_lead.php" method="POST">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="number" name="number" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Start time</label>
                                            <input type="time" name="stime" class="form-control" required><br />
                                            <label>End time</label>
                                            <input type="time" name="etime" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Feedback</label>
                                            <textarea name="comment" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 col-xs-12 control-label">Call status</label>
                                            <div class="col-md-6 col-xs-12">
                                                <select name="status" class="form-control select">
                                                    <option value="">Select Call status</option>
                                                    <option value="incoming">Incoming </option>
                                                    <option value="outgoing">Outgoing</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="container-s">
                                            <label class="col-md-6 col-xs-12 control-label">Rate</label>
                                                <div class="star-widget">
                                                    <input type="radio" name="rate" value="5" id="rate-5">
                                                    <label for="rate-5" class="fas fa-star"></label>
                                                    <input type="radio" name="rate" value="4" id="rate-4">
                                                    <label for="rate-4" class="fas fa-star"></label>
                                                    <input type="radio" name="rate" value="3" id="rate-3">
                                                    <label for="rate-3" class="fas fa-star"></label>
                                                    <input type="radio" name="rate" value="2" id="rate-2">
                                                    <label for="rate-2" class="fas fa-star"></label>
                                                    <input type="radio" name="rate" value="1" id="rate-1">
                                                    <label for="rate-1" class="fas fa-star"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <br /><br />
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
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Call Log ( <x style="color: orange;"><?php echo mysqli_num_rows($query); ?></x> )</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <?php
                                    if (mysqli_num_rows($query) == 0) {
                                        echo "<i style='color:brown;'>No Phone calls Here :( </i> ";
                                    } else {
                                        echo '
                                            <thead>
                                                <tr>
                                                    <th>Number</th>
                                                    <th>Name</th>
                                                    <th>date</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                    }
                                    while ($row = mysqli_fetch_array($query)) {
                                        // $id = $row["id"]
                                        echo '
                                            <tr>
                                                <td class="txt-oflo">' . $row["number"] . '</td>
                                                <td class="txt-oflo">' . $row["name"] . '</td>
                                                <td class="txt-oflo">' . $row["date"] . '</td>
                                                <td><a href="#"><i class="fa fa-trash"  data-toggle="modal" data-target="#responsive-modal' . $row["id"] . '" title="remove" style="color:red;"></i></a></td>
                                                <!-- /.modal -->
                                                <div id="responsive-modal' . $row["id"] . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title">Are you sure you want to delete this phone Call?</h4>
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
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
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>