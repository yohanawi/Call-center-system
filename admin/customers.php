<?php
require_once('functions/db.php');

$sql_cus = "SELECT * FROM customers";
$query_cus = mysqli_query($connection, $sql_cus);
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
    <title>Call-center | Customers</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
              <li class="active">Customers</li>
            </ol>
          </div>
        </div>
        <!--.row-->
        <div class="row">
          <div class="col-md-12">
            <div class="white-box">
              <div class="container mt-4">
                <hr>
                <h3 class="box-title m-b-0">Customers ( <x style="color: orange;"><?php echo mysqli_num_rows($query_cus); ?></x> )</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                  <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <?php
                    if (mysqli_num_rows($query_cus) == 0) {
                      echo "<i style='color:brown;'>No logs Here :( </i> ";
                    } else {
                      echo '
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                <tbody>';
                    }
                    while ($row = mysqli_fetch_array($query_cus)) {
                      // $id = $row["id"]
                      echo '
                                                    <tr>
                                                        <td>' . $row["first_name"] . ' ' . $row["last_name"] . '</td>
                                                        <td>' . $row["email"] . '</td>
                                                        <td>' . $row["created_at"] . '</td>
                                                        <td><a href="#"><i class="fa fa-trash" data-toggle="modal" data-target="#responsive-modal' . $row["id"] . '" title="remove" style="color:red;"></i></a></td>
                                                        <!-- /.modal -->
                                                        <div id="responsive-modal' . $row["id"] . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Are you sure you want to delete this customer?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="functions/cus_del.php" method="post">
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
                <br>

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
  <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
  <!-- start - This is for export functionality only -->
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
  <!-- end - This is for export functionality only -->
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
      $(document).ready(function() {
        var table = $('#example').DataTable({
          "columnDefs": [{
            "visible": false,
            "targets": 2
          }],
          "order": [
            [2, 'asc']
          ],
          "displayLength": 25,
          "drawCallback": function(settings) {
            var api = this.api();
            var rows = api.rows({
              page: 'current'
            }).nodes();
            var last = null;
            api.column(2, {
              page: 'current'
            }).data().each(function(group, i) {
              if (last !== group) {
                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                last = group;
              }
            });
          }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
          var currentOrder = table.order()[0];
          if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            table.order([2, 'desc']).draw();
          } else {
            table.order([2, 'asc']).draw();
          }
        });
      });
    });
    $('#example23').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });
  </script>
  <!--Style Switcher -->
  <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

</body>

</html>