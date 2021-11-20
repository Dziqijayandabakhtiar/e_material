
<?php  
    include "../fungsi/koneksi.php";

    if (isset($_GET['id'])) {
        //die($id = $_GET['id']);
        $id = $_GET['id'];
        

        if ($_GET['konfirmasi'] == 'edit') {
            header("location:?p=edit&id=$id");
        } else if ($_GET['aksi'] == 'hapus') {
            header("location:?p=hapus&id=$id");
        } 
    }

    
    $query = mysqli_query($koneksi, "SELECT pemesanan.id, pemesanan.kode_brg, nama_staff, bidang_bagian, nama_brg, jumlah, satuan, keterangan, status FROM pemesanan INNER JOIN stokbarang ON pemesanan.kode_brg = stokbarang.kode_brg WHERE pemesanan.id ='$id' "); 

    
?>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
             <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Konfirmasi Pemesanan</h3>
                </div> 
                <br>                               
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-offset-4 col-sm-2 control-label">Unit Pelayanan</label>
                        <div class="col-sm-2">
                            <p class="form-control-status-bar">ferry</p>
                        </div>
                    </div>
                    <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-offset-4 col-sm-2 control-label">Bidang bagian</label>
                        <div class="col-sm-2">
                            <p class="form-control-status-bar">bidang1</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-offset-4 col-sm-2 control-label">Nama Barang</label>
                        <div class="col-sm-2">
                            <p class="form-control-status-bar">spidol</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-offset-4 col-sm-2 control-label">Jumlah</label>
                        <div class="col-sm-2">
                            <p class="form-control-status-bar">40</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-offset-4 col-sm-2 control-label">Satuan</label>
                        <div class="col-sm-2">
                            <p class="form-control-status-bar">buah</p>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                            <a href="setuju.php"><button class="btn btn-primary">Setuju</button></a>
                            <a href="tidaksetuju.php"><button class="btn btn-danger">Tidak Setuju</button></a>                            
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>



</section>


