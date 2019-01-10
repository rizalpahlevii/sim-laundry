<?php 
		include 'system/proses.php';
		$connect = mysqli_connect("localhost", "root", "", "db_laundry");
		$query = "SELECT max(nomer_order) as maxKode FROM tb_order";
		$hasil = mysqli_query($connect, $query);
		$data = mysqli_fetch_array($hasil);
		$kodebarang = $data['maxKode'];
		$nourut = (int) substr($kodebarang, 4, 4);
		$nourut++;
		$char = "LDR";
		$nomot = $char . sprintf("%04s", $nourut);
 ?>
<body onload="buka_tab()">
<div class="container-fluid">
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
       		<a href="#">Cucian Masuk</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    

	<div class="container">
		<form action="crud/simpan_order.php" method="POST">
			<input type="hidden" name="kode_ptg" id="kode_ptg" value="<?php echo $_SESSION['kode_ptg'] ?>">
			<div class="row" id="kotak_no_order">
				
	            
			</div>
			<div class="card-header bg-info text-center" id="gambar_harga" style=" margin: -40px 0px 0px 450px ;border-radius: 4px; font-family: segoe ui; font-size: 50px; width: 500px; height: 90px;">
	            	
	        </div>
			<h5></h5>
			<div class="row">
				<div class="col-sm-auto">
					<div class="form-inline">
						<label for="tgl_masuk">Tanggal&nbsp;&nbsp;&nbsp;&nbsp;</label>
		                <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>  
		            </div>
	            </div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<center><label for="pelanggan">Pelanggan</label></center>
						<select name="opt_pelanggan" id="pelanggan" class="custom-select" onchange="plgn()" style="cursor: pointer;">
								<option disabled selected>Pilih</option>
								<option value="Pelanggan">Pelanggan</option>
								<option value="Non Pelanggan">Non Pelanggan</option>
						</select>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<center><label for="id_pelanggan" id="lbidp">ID Pelanggan</label></center>
						<input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control" onkeyup="okoc()" autocomplete="off">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<center><label for="nama_pelanggan" id="lbnmp">Nama Pelanggan</label></center>
						<input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" readonly>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<center><label for="kode_jasa">Kode jasa</label></center>
						
						
						<select name="kode_jasa" id="kode_jasa"  class="custom-select" onchange="kdjs()" style="cursor: pointer;">
							<option disabled selected>--Pilih Kode Jasa--</option>
							<?php 
									$qw = $db->get("*","jasa","ORDER BY kode_jasa ASC");
									foreach($qw as $tamp){
							?>
							<option value="<?php echo $tamp['kode_jasa'] ?>"><?php echo $tamp['kode_jasa'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<center><label for="nama_jasa">Nama jasa</label></center>
						<input type="text" name="nama_jasa" id="nama_jasa" class=" form-control" readonly required="">
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<center><label for="harga_jasa">Harga</label></center>
						<input type="text" name="harga_jasa" id="harga_jasa" class=" form-control" readonly>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<center><label for="berat">Berat</label></center>


						<input type="text" name="berat" id="berat" class="form-control" onkeyup="ttl()" required="" autocomplete="off">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<center><label for="total">Total</label></center>
						<input type="text" name="total" id="total" class="form-control" autocomplete="off" readonly="">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<center><label for="status">Status</label></center>
						<select name="status" id="status" class="custom-select" style="cursor: pointer;">
							<option disabled selected>--Pilih Status Cucian--</option>
							<option value="belum diambil" selected>Belum Diambil</option>
							
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<center><label for="tgl_selesai">Tanggal Selesai</label></center>
						<input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" autocomplete="off" min="<?php echo date('Y-m-d',time()+60*60*24) ?>" required="">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="button" name="submit" class="btn btn-primary btn-block" value="Simpan" style="margin-top: 30px;" onclick="simpan_order()">
					</div>
				</div>
				
			</div>
		</form>
		<hr>
			<div class="tabel-order" id="tabel-order">
				
			</div>
		<hr>


	</div>


    
</div>
</body>


