<?php 
  
  include "../fungsi/koneksi.php";
  include "../fungsi/fungsi.php";

  ob_start(); 
  $id  = isset($_GET['id']) ? $_GET['id'] : false;


  $nama_staff = $_GET['nama_staff'];
  $tgl= $_GET['tgl'];
    
?>
<!-- Setting CSS bagian header/ kop -->
<style type="text/css">
  table.page_header {width: 1020px; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
  table.page_footer {width: 1020px; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
  
 
</style>
<!-- Setting Margin header/ kop -->
  <!-- Setting CSS Tabel data yang akan ditampilkan -->
  <style type="text/css">
  .tabel2 {
    border-collapse: collapse;
    margin-left: 145px;
    
  }
  .tabel2 th, .tabel2 td {
      padding: 5px 5px;
      border: 1px solid #000;

  }

   table.isi {
    margin: 0 170px;

  }

  .isi td {
    padding: 15px 15px;
  }

  div.kanan {
     position: absolute;
     bottom: 100px;
     right: 50px;
     
  }

  div.tengah {
     position: absolute;
     bottom: 100px;
     right: 330px;
     
  }

  div.kiri {
     position: absolute;
     bottom: 100px;
     left: 10px;     
  }

  </style>
  <table>
  <tr>
      <th rowspan="3"><img src="../gambar/jateng.png" style="width:100px;height:100px" /></th>
      <td align="center" style="width: 520px;"><font style="font-size: 18px"><b>PEMERINTAH PROVINSI JAWA TENGAH  <br> SEKRETARIAT BADAN PENANGGULANGAN BENCANA DAERAH</b></font>
      <br><br>Jl.Imam Bonjol No. 1 F Telp.024 – 3519904 (Hunting), Fax 024 – 3519186 <br> Kode Pos 50141 email : bpbd_jateng@yahoo.com, Semarang</td>
	  <th rowspan="3"><img src="../gambar/bpbd.JPG" style="width:100px;height:80px" /></th>
    </tr>
  </table>
  <hr>
  <p align="center" style="font-weight: bold; font-size: 18px;"><u>BUKTI PENGELUARAN PERMINTAAN BARANG (BPP)</u></p>
  <br><br>
  <h4 style="color: black; text-align: center;">Pengeluaran Permintaan Barang dari nama pemohon : <?= $nama_staff; ?></h4>
  <div class="isi" style="margin: 0 auto;">
   <table class="tabel2">
    <thead>
      <tr>
        <td style="text-align: center; "><b>No.</b></td>        
        <td style="text-align: center; "><b>Kode Barang</b></td>
        <td style="text-align: center; "><b>Nama Barang</b></td>
		<td style="text-align: center; "><b>Satuan</b></td> 
        <td style="text-align: center; "><b>Jumlah</b></td>                                        
      </tr>
    </thead>
    <tbody>
      <?php

       
       $query = mysqli_query($koneksi, "SELECT permintaan.kode_brg, nama_staff, nama_brg, jumlah, satuan, tgl_permintaan FROM permintaan INNER JOIN stokbarang ON permintaan.kode_brg = stokbarang.kode_brg  WHERE nama_staff='$nama_staff' AND  status=1 AND tgl_permintaan='$tgl' "); 
      $i   = 1;
      while($data=mysqli_fetch_array($query))
      {
      ?>
      <tr>
        <td style="text-align: center;"><?php echo $i; ?></td>             
        <td style="text-align: center;"><?php echo $data['kode_brg']; ?></td>
        <td style="text-align: center;"><?php echo $data['nama_brg']; ?></td>
		<td style="text-align: center;"><?php echo $data['satuan']; ?></td>  
        <td style="text-align: center;"><?php echo $data['jumlah']; ?></td>                            
      </tr>
    <?php
    $i++;
    }
    ?>
    </tbody>
  </table>
  <?php 

  $query2 = mysqli_query($koneksi, "SELECT permintaan.nama_staff FROM permintaan WHERE nama_staff='$nama_staff' AND  status=1 AND tgl_permintaan='$tgl' ");  
  $data2 = mysqli_fetch_assoc($query2);

  ?>

  <p>Pada hari ini tanggal : <b> <?=  tanggal_indo($tgl); ?></b> telah dikeluarkan serta serah terima barang berupa seperti yang tersebut di atas.</p>

  </div>
 
  <?php 

      $query2 = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$nama_staff' ");
      if ($query2){                
        $data = mysqli_fetch_assoc($query2);

      } else {
        echo 'gagal';
      }
   ?>

  

<!-- Memanggil fungsi bawaan HTML2PDF -->
<?php
$content = ob_get_clean();
 include '../assets/html2pdf/html2pdf.class.php';
 try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'UTF-8', array(10, 10, 4, 10));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('bukti_permintaan_dan_pengeluaran_barang.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>