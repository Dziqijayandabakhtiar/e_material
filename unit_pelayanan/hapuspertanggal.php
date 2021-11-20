<?php
	include "../fungsi/koneksi.php";

	if(isset($_GET['tanggal'])){
		$id=$_GET['id'];
		
	    $query = mysqli_query($koneksi,"delete from permintaaan where id_permintaan='$id' AND nama_staff='$_SESSION[username]' ");
	    if ($query) {
	    	header("location:index.php?p=datapesanan");
	    } else {
	    	echo 'gagal';
	    }
	
	}
?>