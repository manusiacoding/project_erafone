<?php
  session_start();
    
  if(!isset($_SESSION['roles'])){
    header("location:../../login.php?message=not_login");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Erajaya</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <style>
      tr:hover{
        cursor: pointer;
      }
    </style>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Settings</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Edit Profile</a></li>
              <li><a href="../../logout.php" class="dropdown-item">Logout</a></li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Erajaya</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-laptop"></i>
                <p>
                  Menu 1
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
                <p>
                  Menu 2
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
                <p>
                  Menu 3
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  Reports
                </p>
              </a>
            </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 m-2">
            <div id="card">
                
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <!-- <tr>
                            <th colspan="4" style="text-align: center;">WAC PUSAT</th>
                            <th colspan="3" style="text-align: center;">WAC AREA</th>
                        </tr> -->
                        <tr>
                            <th>Customer Number</th>
                            <th>Nama Customer</th>
                            <th>Kelurahan</th>
                            <th>Kota</th>
                            <th>Status</th>
                            <th>Payment Status</th>
                            <th>Status Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">WAC PUSAT</h4>
                            </div>
                            <div class="modal-body">
                              <form  method="POST" class="formcust">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="hidden" name="idcust" id="idcust">
                                        <input type="text" name="nama" class="form-control" id="nama" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="notelp">Nomor Telepon</label>
                                        <input type="text" name="notelp" class="form-control" id="notelp" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <!-- <input type="textarea" name="alamat" class="form-control" id="alamat"> -->
                                        <textarea name="alamat" class="form-control" cols="10" rows="2" id="alamat" readonly></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" name="kecamatan" class="form-control" id="kecamatan" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="kota">Kota</label>
                                        <input type="text" name="kota" class="form-control" id="kota" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Type Produk</label>
                                        <input type="text" name="type" class="form-control" id="type" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="warna">Warna</label>
                                        <input type="text" name="warna" class="form-control" id="warna" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="opsi">Opsi Pembayaran</label>
                                        <input type="text" name="opsi" class="form-control" id="opsi" readonly>
                                    </div>
                                    <div class="form-group">
                                        <!-- <input type="text" name="status" id="status"> -->
                                        <label for="toko">Nama Toko</label>
                                        <input type="text" name="toko" class="form-control" id="toko">
                                    </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary swalDefaultError" id="save">Booking</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
x
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- Toast PLUGINS -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script>
  jQuery(document).ready(function($){
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000
      });

      $('#example1').DataTable({
          // "responsive": true,
          // "autoWidth": true,
          "order":[[0, "desc"]],
          "serverside": 'true',
          "lengthChange": false,
          "processing": true,
          "ajax": "datatable.php",
          "columns": [
              {data: 'id_customer'},
              {data: 'nama'},
              {data: 'kelurahan'},
              {data: 'kota'},
              {data: 'status'},
              {data: 'payment_status'},
              {data: 'transaction_status'}
              // toastr.error('Tidak bisa booking karena status order telah di konfirmasi.')
          ]
      });
      var table = $('#example1').DataTable();
      setInterval( function () {
          table.ajax.reload( null, false ); // page not reload but data in datatable auto reload in 3 seconds
      }, 3000 );
      $('#example1 tbody').on('click', 'tr', function () {
          var id = this.cells[0].innerHTML;
          // alert(id);
          
          $("#idcust").val(id).trigger("change");
          $("#myModal").modal("show");
      }); 
      $("#idcust").bind("change", function(){
          // alert($(this).val()); 
          var idcust = $(this).val();
          $.ajax({
            url: 'ajaxrespon.php',
            type: 'GET',
            dataType: 'json',
            data: {
              'id_customer': idcust
            },
            success: function (data) {
              $("#nama").val(data['nama']);
              $("#notelp").val(data['notelp']);
              $("#alamat").val(data['alamat']);
              $("#kecamatan").val(data['kecamatan']);
              $("#kota").val(data['kota']);
              $("#type").val(data['type_produk']);
              $("#warna").val(data['warna']);
              $("#opsi").val(data['ops_pembayaran']);

              if(data['status'] == "Available"){
                // alert("1");
                $('#save').prop('disabled', false);
                $("#toko").val('');

                $('#save').on('click', function(){
                  var toko = $('#toko').val();
                  if(toko != ""){
                    var data = $('.formcust').serialize();
                    $.ajax({
                      type: 'POST',
                      url: "booking.php",
                      data: data,
                      success: function() {
                        // update customer order data
                        $.ajax({
                          url: "update_cust_order.php",
                          type: "POST",
                          cache: false,
                          data:{
                            id: $('#idcust').val(),
                            toko: $('#toko').val(),
                          },
                          success: function(dataResult){
                            var dataResult = JSON.parse(dataResult);
                            if(dataResult.statusCode==200){
                              $('#myModal').modal().hide();
                              alert('Data updated successfully !');
                              // location.reload();					
                            }
                          }
                        });
                      }
                    });
                  }else{
                    toastr.error('Mohon isi nama toko!')
                  }
                });
              }else{
                // alert("2");
                toastr.error('Tidak bisa booking karena status booking telah dikonfirmasi.')
                $('#save').prop('disabled', true);
                $('#toko').prop('disabled', true);
                $("#toko").val(data['nama_toko']);
              }
            }
          });
      });
  });
</script>
</body>
</html>
