<?php  
    include "../fungsi/koneksi.php";
    include "../fungsi/fungsi.php";
    $query = mysqli_query($koneksi, "SELECT distinct(nama_staff), tgl_permintaan FROM permintaan WHERE status!=1");    
?>
<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
             <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Data Permintaan Barang habis pakai/Material</h3>
                </div>                
				
                <div class="box-body"> 
                    <div class="table-responsive">
                        <table id="datapesanan" class="table text-center">
                            <thead  > 
                                <tr>
                                    <th>No</th> 
									<th>Tanggal Permintaan</th>
                                    <th>Nama Pemohon</th>
                                    <th>Aksi</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php 
                                        $no =1 ;
                                        if (mysqli_num_rows($query)) {
                                            while($row=mysqli_fetch_assoc($query)):

                                     ?>
                                        <td> <?= $no; ?> </td>       
										<td> <?= tanggal_indo($row['tgl_permintaan']); ?> </td> 										
                                        <td> <?= $row['nama_staff']; ?> </td>                                    
                                        <td>                                                                                                                                                                                                        
                                        <a href="?p=detil&nama_staff=<?=$row['nama_staff'];?> &tgl=<?= $row['tgl_permintaan']; ?>"><span data-placement='top' data-toggle='tooltip' title='Detail Permintaan'><button    class="btn btn-info">Detail Permintaan</button></span></a>           
										
										</td>                                                                                            
                            </tr>
                            <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Tidak ada permintaan material teknik.</td></tr>";} ?>
                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</section>