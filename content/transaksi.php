<?php 
		include 'system/proses.php';
		$connect = mysqli_connect("localhost", "root", "", "db_laundry");
		$query = "SELECT max(no_transaksi) as maxKode FROM transaksi";
		$hasil = mysqli_query($connect, $query);
		$data = mysqli_fetch_array($hasil);
		$kodebarang = $data['maxKode'];
		$nourut = (int) substr($kodebarang, 5, 5);
		$nourut++;
		$char = "TR";
		$nomot = $char . sprintf("%05s", $nourut);
 ?>
<body onload="buka_tab()">
<div class="container-fluid">
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
       		<a href="#">Transaksi</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    

	<div class="container">
		<form action="crud/simpan_transaksi.php" method="POST">

			<input type="hidden" name="kode_ptg" id="kode_ptg" value="<?php echo $_SESSION['kode_ptg'] ?>">
			<div class="row">
				<div class="col-sm-auto">
					<div class="form-inline">
						<label for="no_order">No Transaksi&nbsp;&nbsp;&nbsp;&nbsp;</label>
		                <input type="text" id="no_transaksi" name="no_transaksi" class="form-control" value="<?php echo $nomot; ?>" readonly>  
		            </div>
	            </div>
	            <div class="col-sm-auto">
					<div class="form-inline">
						<label for="tgl_ini">Tanggal&nbsp;&nbsp;&nbsp;&nbsp;</label>
		                <input type="date" id="tgl_ini" name="tgl_ini" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>  
		            </div>
	            </div>
			</div>


			<hr>

			<div class="row">
				<div class="col-sm-2">
					<div class="form-group">
						<center><label for="no_order">No Order</label></center>
						<input type="text" name="no_order" id="no_orderrr" class="form-control" autocomplete="off" placeholder="Masukkan No Order..." onkeyup="cari_tr()" required="">
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<center><label for="nama_pelanggann">Nama Pelanggan</label></center>
						<input type="text" name="nama_pelanggan" id="nama_pelanggann" class="form-control" autocomplete="off" readonly>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<center><label for="nama_jasa" >Nama Jasa</label></center>
						<input type="text" name="nama_jasa" id="nama_jasa" class="form-control" autocomplete="off" readonly>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<center><label for="harga">harga</label></center>
						<input type="text" name="harga" id="harga" class="form-control" autocomplete="off" readonly>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<center><label for="berat">Berat</label></center>
						<input type="text" name="berat" id="berat" class="form-control" autocomplete="off" readonly style="cursor: no-drop;">
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<center><label for="total" >Total</label></center>
						<input type="text" name="total" id="total" class="form-control" autocomplete="off" readonly>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-2">
					<div class="form-group">
						<center><label for="bayar" >bayar</label></center>
						<input type="text" name="bayar" id="bayar" class="form-control" autocomplete="off" onkeyup="tltr()" required="">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<center><label for="kembali" >kembali</label></center>
						<input type="text" name="kembali" id="kembali" class="form-control" autocomplete="off" readonly>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<center><label for="status" >status</label></center>
						<select id="status" name="status" class="custom-select" style="cursor: pointer;">
							<option value="Sudah Diambil">Sudah Diambil</option>
						</select>
					</div>
				</div>
				<div class="col-sm-5">
					<div id="harga_tr" class="card-header bg-info text-center" style=" height: 80px; font-size: 50px; color: #fff; line-height: 100%;">
						
					</div>
				</div>
			</div><br>
			<div class="row">
				<input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-block">
			</div>
		</form>
		


	</div>


    
</div>
</body>


