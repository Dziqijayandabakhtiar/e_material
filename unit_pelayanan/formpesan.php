<?php  
    include "../fungsi/koneksi.php";
    $error = "";


?>

<section class="content">
    <div class="row">
        <div class="col-sm-5 col-xs-10">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Form Permintaan Material Teknik</h3>
                </div>
                <form method="post" id="tes"  action="add-proses.php" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group ">
                            <label for="nama_barang" class="a col-sm-3 control-label">Nama Pemohon</label>
                            <div class="col-sm-3">
                                <input type="text" readonly value="<?= $_SESSION['username']; ?>" class="form-control" name="nama_staff">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bidang_bagian" class=" col-sm-3 control-label">Bidang Bagian</label>
                            <div class="col-sm-5">
                                <select id="bidang_bagian" required="isikan dulu" class="form-control" name="id_bidang">
                                <option value="">--Pilih bidang bagian--</option>
                                <option value="Bidang 1">Bidang 1</option>
                                <option value="Bidang 2">Bidang 2</option>
                                <option value="Bidang 3">Bidang 3</option>
                                <option value="Bidang 4">Bidang 4</option>
                                <option value="Program">Program</option>
                                <option value="Umum Kepegawaian">Umum Kepegawaian</option>
                                <option value="Pusdalop">Pusdalop</option>
                                <option value="Keuangan">Keuangan</option>                               
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="jenis_brg" class=" col-sm-3 control-label">Jenis Barang</label>
                            <div class="col-sm-5">
                                <select id="jenis_brg" required="isikan dulu" class="form-control" name="id_jenis">
                                <option value="">--Pilih Jenis Barang--</option>
                                <?php  
                                    include "../fungsi/koneksi.php";
                                    $queryJenis = mysqli_query($koneksi, "select * from jenis_barang");
                                    if (mysqli_num_rows($queryJenis)) {
                                        while($row=mysqli_fetch_assoc($queryJenis)):
                                    ?>                                        
                                        <option value="<?= $row['id_jenis']; ?>"><?= $row['jenis_brg']; ?></option>
                                    <?php endwhile; } ?>                                      
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  for="nama_brg" class="col-sm-3 control-label">Nama Barang</label>
                            <div class="col-sm-5">
                                <select id="nama_brg" required="isikan dulu" class="form-control" name="kode_brg">
                                <option value="">--Pilih Nama Barang--</option>                                                                  
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stok" class="col-sm-3 control-label">Stok Tersedia</label>
                            <div class="col-sm-3">
                                <input id="stok" disabled value="----" type="text" class="form-control" name="stok">
                            </div>                                                        
                        </div>
                         <div class="form-group">
                            <label for="stok" class=" col-sm-3 control-label">Jumlah</label>
                            <div class="col-sm-3">
                                <input id="jumlah" type="number" onkeyup="sendAjax()" class="form-control" name="jumlah" required>                                
                            </div>
                            <span class="col-sm-7"> <?php echo $error; ?></span>
                        </div>
                         
                        
                        <div class="form-group">
                            <input type="submit" id="simpan" name="simpan" class="btn btn-primary col-sm-offset-3 " value="Simpan" > 
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">                                                                              
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-7 col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="text-center">Data Permintaan Hari Ini</h3>
                </div>
                
                    <table class="table table-responsive">
                        <tr>
                            <th>No</th>
                            <th>Nama Pemohon</th>
                            <th>Bidang Bagian</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                        <?php 
                            $sekarang  = date("Y-m-d");
                            $queryTampil = mysqli_query($koneksi, "SELECT sementara.nama_staff, sementara.id_bidang, sementara.id_sementara, stokbarang.nama_brg, stokbarang.satuan, jumlah FROM sementara INNER JOIN stokbarang ON sementara.kode_brg  = stokbarang.kode_brg WHERE tgl_permintaan = '$sekarang' AND sementara.nama_staff='$_SESSION[username]' "  );
                            $no = 1;
                            if(mysqli_num_rows($queryTampil) > 0) {
                                while($row = mysqli_fetch_assoc($queryTampil)):
                            
                         ?>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['nama_staff']; ?></td>
                            <td><?php echo $row['id_bidang']; ?></td>
                            <td><?php echo $row['nama_brg']; ?></td>
                            <td><?php echo $row['jumlah']; ?> </td>
                            <td><?php echo $row['satuan'] ?></td>
                            
                            <td><a href="hapusps.php?id=<?php echo $row['id_sementara']; ?>" class="btn btn-danger">Hapus</a></td>
                        </tr>
                    <?php $no++; endwhile; } else { echo "<tr><td>Tidak ada permintaan barang hari ini</td></tr>"; } ?>
                    </table>    
                <div class="box-body">
                    <a class="btn btn-success" href="pesan.php" >Minta Barang</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $("#bidang_bagian").change(function(){
            var bdg = $(this).val();
            var dataString = 'bdg='+bdg;
            $.ajax({
                type:"POST",
                url:"getdata1.php",
                data:dataString,
                success:function(html){
                    $("#nama_brg").html(html);                    
                }
            });
        });

        $("#jenis_brg").change(function(){
            var jenis = $(this).val();
            var dataString = 'jenis='+jenis;
            $.ajax({
                type:"POST",
                url:"getdata.php",
                data:dataString,
                success:function(html){
                    $("#nama_brg").html(html);                    
                }
            });
        });

        $("#nama_brg").change(function(){
            var kode = $(this).val();
            var dataString = 'kode='+kode;
            $.ajax({
                type:"POST",
                url:"getkode.php",
                data:dataString,
                success:function(html){
                    $("#stok").val(html);        
                }
            });
        });
				       
    });


	
	 function cek_stok(){
                var jumlah = $("#jumlah").val();                
                var kode_brg = $("#nama_brg").val();   
                $.ajax({
                    url: 'cekstok.php',
                    data:"jumlah="+jumlah+"&kode_brg="+kode_brg,
                    dataType:'json',
                }).success(function (data) {                                      
                                      
                   
                        if(data.hasil == 1){                            
                            $("#tes").submit(function(e){
                                e.preventDefault();
                                alert(data.pesan);
                            });
                        }
                        
                   

                });
            }

   function sendAjax() {
    setTimeout(
        function() {
            var jumlah = $("#jumlah").val();                
                var kode_brg = $("#nama_brg").val();   
                $.ajax({
                    url: 'cekstok.php',
                    data:"jumlah="+jumlah+"&kode_brg="+kode_brg,
                    dataType:'json',
                }).success(function (data) {                                      
                                      
                   
                        if(data.hasil == 1){                            
                            
                                alert(data.pesan);
                                $("#jumlah").val("");
                            
                        }
                        
                   

                });
        }, 1000);
}
</script>