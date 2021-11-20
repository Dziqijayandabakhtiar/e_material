<?php  
    
    include "../fungsi/koneksi.php";

    if(isset($_GET['aksi']) && isset($_GET['id']) && isset($_GET['tgl']) && isset($_GET['nama_staff']) ) {
        $aksi = $_GET['aksi'];
        $id = $_GET['id'];
        $nama_staff = $_GET['nama_staff'];
        $tgl = $_GET['tgl'];

        if ($aksi == 'hapus') {
            $query2 = mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id='$id' ");
            if ($query2) {
                header("location:index.php?p=detil&tgl=$tgl&nama_staff=$nama_staff");
            } else {
                echo 'gagal';
            }
        }
    }


?>