<?php  

include "../fungsi/koneksi.php";

if(isset($_POST['update'])) {
	$id = $_POST['id'];
	
	$username = $_POST['username'];	
	
	$level = $_POST['level'];	
	
	$query = mysqli_query($koneksi, "UPDATE user SET username='$username', level='$level' WHERE id_user ='$id' ");
	
	if ($query) {
		header("location:index.php?p=user");
	} else {
		echo 'error' . mysqli_error($koneksi);
	}

}



?>