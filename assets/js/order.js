
function plgn(){
	plh = $('#pelanggan').val();
	if(plh=="Pelanggan"){
		$('#lbidp').show("slow");
		$('#lbnmp').show("slow");
		$('#id_pelanggan').show("slow");
		$('#nama_pelanggan').show("slow");
	}else{
		$('#lbidp').hide("slow");
		$('#lbnmp').hide("slow");
		$('#id_pelanggan').hide("slow");
		$('#nama_pelanggan').hide("slow");
	}
}


function kdjs(){

	$.ajax({
		url:"content/cari_jasa.php",
		type:"POST",
		dataType:"json",
		data:{
			kode_jasa:$('#kode_jasa').val()
		},
		success:function(hasil){
			$('#nama_jasa').val(hasil.nama_jasa);
			$('#harga_jasa').val(hasil.harga_jasa);
			
		}

	});
}

function ttl(){
	var berat = $('#berat').val();
	var harga = $('#harga_jasa').val();
	var tot = berat*harga;
	$('#total').val(tot);
	$('#gambar_harga').text('Rp. '+tot);
}

// Cari Pelanggan
function okoc(){

	$.ajax({
		url:"content/cari_plg.php",
		type:"POST",
		dataType:"json",
		data:{
			id_pelanggan:$('#id_pelanggan').val()
		},
		success:function(hasil){
			$('#nama_pelanggan').val(hasil.nama_pelanggan);
			
		}

	});
}


function buka_tab(){
	
	$('#tabel-order').load('content/tabel_order.php');
	$('#kotak_no_order').load('content/no_order.php');
	

}
function buka_struk(){
	id=$('#no_order').val();
	window.open("struk/struk.php?no="+id);

}

function kp(ido){
	
	$.ajax({
		url:"crud/hapus_order.php",
		type:"POST",
		data:{
			id_order:ido
		},
		success:function(hasil){
			alert(hasil);
			buka_tab();
		}

	});

}



function simpan_order(){
	id:$('#no_order').val();
	$.ajax({
		url:"crud/simpan_order.php",
		type:"POST",
		data:{
			no_order:$('#no_order').val(),
			tgl_masuk:$('#tgl_masuk').val(),
			opt_pelanggan:$('#pelanggan').val(),
			id_pelanggan:$('#id_pelanggan').val(),
			nama_pelanggan:$('#nama_pelanggan').val(),
			kode_jasa:$('#kode_jasa').val(),
			nama_jasa:$('#nama_jasa').val(),
			harga_jasa:$('#harga_jasa').val(),
			berat:$('#berat').val(),
			total:$('#total').val(),
			status:$('#status').val(),
			tgl_selesai:$('#tgl_selesai').val(),
			kode_ptg:$('#kode_ptg').val(),


		},
		success:function(hasil){
			alert(hasil);
			buka_tab();
			bersihkan();
			buka_struk();
			
		}
	});
}
function bersihkan(){
	$('#pelanggan').val("Pilih");
	$('#id_pelanggan').val("");
	$('#nama_pelanggan').val("");
	$('#kode_jasa').val("--Pilih Kode Jasa--");
	$('#nama_jasa').val("");
	$('#harga_jasa').val("");
	$('#berat').val("");
	$('#total').val("");
	$('#status').val("--Pilih Status Cucian--");
	$('#tgl_selesai').val("");
	$('#gambar_harga').text("");


}

function cari_tr(){
	$.ajax({
		url:"content/cari_f_tr.php",
		type:"POST",
		dataType:"json",
		data:{
			no_order:$('#no_orderrr').val()
		},
		success:function(hasil){
			$('#nama_pelanggann').val(hasil.nama_pelanggan);
			$('#nama_jasa').val(hasil.nama_jasa);
			$('#harga').val(hasil.harga);
			$('#berat').val(hasil.berat_cucian);
			$('#total').val(hasil.total_harga);
			
			
		}

	});
}



function tltr(){
	t = $('#total').val();
	b = $('#bayar').val();
	$('#kembali').val(b-t);
	rs = b-t;
	$('#harga_tr').text('Rp. '+rs);
}
$(document).ready(function(){
	$('#harga_tr').text('Rp. 00000000-,');
});





