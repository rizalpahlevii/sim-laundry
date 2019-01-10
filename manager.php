<?php 
  session_start();
  

  if(!isset($_SESSION["login_ldr"]) || $_SESSION['level_ptg']!="manager"){
    echo "<script>alert('Anda Bukan Manager')</script>";
    header("Location: login.php");
    exit;
  }
  

 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIM Laundry</title>
   
    <!-- Bootstrap core CSS-->
    <link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   
    <!-- dataTables -->
   
    <link rel="stylesheet" type="text/css" href="assets/vendor/dataTables/css/dataTables.bootstrap4.css">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">

      <a class="navbar-brand mr-1" href="">SIM Laundry</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        
      </form>
      
      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        
        
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="logoutdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i> <?php echo $_SESSION['nama_ptg']; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="logoutdd">
            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-user"></i> <?php echo $_SESSION['level_ptg']; ?></a>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-fw fa-sign-out-alt"></i> Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav" style="margin-top: 56px;">
         
        <li class="nav-item">
          <a class="nav-link" href="manager.php?p=home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        
        


       
        <li class="nav-item">
          <a class="nav-link" href="manager.php?p=laporan">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan Transaksi</span></a>
        </li>
        
      </ul>

      <div id="content-wrapper" style="margin-top:56px;">

        <?php 
          if( empty($_GET['p']) ){
            echo "<script>document.location.href='manager.php?p=home'</script>";
          }else{
            $p=$_GET['p'];
            include "content_m/$p.php";
          }
         ?>

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Logout ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
   <!--  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- dataTables -->
    
    <script type="text/javascript" src="assets/vendor/dataTables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/vendor/dataTables/js/dataTables.bootstrap4.js"></script>
    <!-- Order -->
    <script type="text/javascript" src="assets/js/order.js"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin.min.js"></script>
    <!-- modal edit -->
    <script type="text/javascript" src="assets/js/modal_edit.js"></script>
  </body>

</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tb-petugas').DataTable();
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
      $('#lbidp').hide();
      $('#lbnmp').hide();
      $('#id_pelanggan').hide();
      $('#nama_pelanggan').hide();
  });
</script>

















