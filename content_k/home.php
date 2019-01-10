<?php 
include 'system/proses.php';
 ?>
      <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
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
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">Order</div>
                  <?php 
                    $row_order = $db->get("*","tb_order","ORDER BY nomer_order ASC")->rowCount();
                   ?>
                  <h3 style="margin-bottom: -12px;"><?php echo $row_order; ?></h3>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="kasir.php?p=order">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>


            <div class="col-xl-4 col-sm-6 mb-4">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5">Sudah Di Ambil</div>
                  <?php 
                    $row_status_sudah= $db->get("*","transaksi","ORDER BY no_transaksi ASC")->rowCount();
                    
                   ?>
                  <h3 style="margin-bottom: -12px;"><?php echo $row_status_sudah; ?></h3>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>




            <div class="col-xl-4 col-sm-6 mb-4">
              <div class="card text-white bg-dark o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-chart-bar"></i>
                  </div>
                  <div class="mr-5">Belum Di Ambil</div>
                  <?php 
                    $row_status_belum = $db->get("*","tb_order","WHERE status_cucian='belum diambil'")->rowCount();
                   
                   ?>
                  <h3 style="margin-bottom: -12px;"><?php echo $row_status_belum; ?></h3>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
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