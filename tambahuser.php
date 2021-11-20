<?php  

    include "fungsi/koneksi.php";

    if(isset($_POST['simpan'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = $_POST['level'];


        $query = mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$username', '$password', '$level') ");        
        if ($query) {
            header("location:index.php?p=user");
        } else {
            echo 'gagal : ' . mysqli_error($koneksi);
        }
    }


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Permintaan dan Pengeluaran Material Teknik</title>
	<!-- Icon  -->
	<link rel="shortcut icon" type="image/icon" href="bpbd.JPG">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/bootstrap/css/custom.css" rel="stylesheet">
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" >
    <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet">
    <link href="assets/fa/css/font-awesome.min.css" rel="stylesheet">  
</head>

<section class="content">
    <div class="row">
        <div class="col-sm-12 col-xs-12">
        <div class="login-box-body">
      	<h3 class="text-center">Registrasi Akun</h3>
      	<img src="gambar/bpbd.JPG" style="width: 120px; height: 100px;">        
             </div>
                <form method="post"  action="" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group ">
                            <label for="username" class="col-sm-offset-1 col-sm-3 control-label">Username</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="username">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="paswword"class="col-sm-offset-1 col-sm-3 control-label">Password</label>
                            <div class="col-sm-4">
                                <input required type="password" class="form-control" name="password">
                            </div>
                        </div>
                        </div>                  
                        <div class="form-group">
                            <label id="tes"for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Level</label>
                            <div class="col-sm-4">
                                <select required name="level" class="form-control">
                                    <option >--Pilih Level--</option>
                                    <option value="unit_pelayanan">Staff/Karyawan</option>
                                    <option value="admin_gudang">Admin Gudang</option>
                                </select>
                            </div>
                        </div>                         
                        <div class="form-group">
                            <input type="submit" name="simpan" class="btn btn-primary col-sm-offset-4 " value="Simpan" > 
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">                                                                              
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
    </div>
</section>
<footer class="main-footer"> 
  <div class="copyright text-center my-auto">
      <span>Copyright &copy; Aplikasi Bpbd 2020 &bull; by Ferry&Adam </span>
</div>
  </footer>
