<?php  

	include "../fungsi/koneksi.php";

	$id = $_POST['bdg'];
	

	$query = mysqli_query($koneksi,"select * from jenis_bidang WHERE id_bidang='$id'");
    
    if (mysqli_num_rows($query)) {
    	echo "<option>--Pilih Bidang Bagian--</option>";
        while($row=mysqli_fetch_assoc($query)){

        	echo "<option value=$row[nama_staff]>$row[nama_brg] </option>\n";

    	}                                                    
    }
  
?>