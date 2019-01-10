<?php 
include 'system/proses.php';
 ?>
      <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Laporan Transaksi</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <!-- <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">Order</div>
                 <h3 style="margin-bottom: -12px;">37</h3>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div> -->
            <div class="col-xl-4 col-sm-6 mb-4">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <div class="mr-5">Laporan Per Tangggal</div>
                  <?php 
                     $qw1 = $db->get("transaksi.no_transaksi, transaksi.nomer_order, transaksi.TGL_transaksi,petugas.nama_PTG,jasa.nama_jasa,tb_order.berat_cucian,tb_order.total_harga","transaksi","INNER JOIN tb_order on transaksi.nomer_order=tb_order.nomer_order INNER JOIN petugas ON transaksi.kode_PTG=petugas.kode_PTG INNER JOIN jasa ON tb_order.kode_jasa=jasa.kode_jasa")->rowCount();
                   ?>
                  <h3 style="margin-bottom: -12px;"><?php echo $qw1; ?></h3>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="manager.php?p=laporan_per_tanggal">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>



            <div class="col-xl-4 col-sm-6 mb-4">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">Laporan Per Bulan</div>
                  <?php 
                    $qw2 = $db->get("transaksi.no_transaksi, transaksi.nomer_order, transaksi.TGL_transaksi,petugas.nama_PTG,jasa.nama_jasa,tb_order.berat_cucian,tb_order.total_harga","transaksi","INNER JOIN tb_order on transaksi.nomer_order=tb_order.nomer_order INNER JOIN petugas ON transaksi.kode_PTG=petugas.kode_PTG INNER JOIN jasa ON tb_order.kode_jasa=jasa.kode_jasa")->rowCount();
                   ?>
                  <h3 style="margin-bottom: -12px;"><?php echo $qw2; ?></h3>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="manager.php?p=laporan_perbulan">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>






            <div class="col-xl-4 col-sm-6 mb-4">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-user-circle"></i>
                  </div>
                  <div class="mr-5">Laporan Per Tahun</div>
                  <?php 
                    $qw3 = $db->get("transaksi.no_transaksi, transaksi.nomer_order, transaksi.TGL_transaksi,petugas.nama_PTG,jasa.nama_jasa,tb_order.berat_cucian,tb_order.total_harga","transaksi","INNER JOIN tb_order on transaksi.nomer_order=tb_order.nomer_order INNER JOIN petugas ON transaksi.kode_PTG=petugas.kode_PTG INNER JOIN jasa ON tb_order.kode_jasa=jasa.kode_jasa")->rowCount();
                    
                   ?>
                  <h3 style="margin-bottom: -12px;"><?php echo $qw3; ?></h3>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="manager.php?p=laporan_pertahun">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>





            
          </div>
          






         
          

        </div>
        
        <!-- /.container-fluid -->