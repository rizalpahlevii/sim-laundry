<?php 
include '../system/proses.php';
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
<div class="col-sm-4">
	<div class="form-inline">
		<label for="no_order">No Order&nbsp;</label>
		<input type="text" id="no_order" class="form-control" readonly="" value="<?php echo $nomot; ?>" name="no_order">  
	</div>
</div>