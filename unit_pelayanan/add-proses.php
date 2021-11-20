<?php  

	include "../fungsi/koneksi.php";

	if(isset($_POST['simpan'])) {

		$nama_staff = $_POST['nama_staff'];
		$id_bidang= $_POST['id_bidang'];
		$kode_brg = $_POST['kode_brg'];
		$jumlah = $_POST['jumlah'];		
		$tgl_pemesanan = date('Y-m-d');
		$id_jenis = $_POST['id_jenis'];
		
		

		$query = "INSERT into sementara (nama_staff, id_bidang, kode_brg, id_jenis,  jumlah, tgl_permintaan) VALUES 
										('$nama_staff', '$id_bidang', '$kode_brg', '$id_jenis', '$jumlah', '$tgl_pemesanan')

			";
		$hasil = mysqli_query($koneksi, $query);
		if ($hasil) {
			header("location:index.php?p=formpesan");
		} else {
			die("ada kesalahan : " . mysqli_error($koneksi));
		}
	}
?>