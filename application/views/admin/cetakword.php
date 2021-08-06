<?php 

  header("Content-Type: application/force-download");
  header("Cache-Control: no-cache, must-revalidate");
  header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
  header("content-disposition: attachment;filename=".$filename.".doc");
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tambahan Link Untuk CSS dari Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>resources/admintheme/css/print.css">
    <link rel="stylesheet" href="<?php echo base_url();?>resources/admintheme/css/cetakword.css">
    <title>Laporan</title>
</head>
<body>
  <div class="Section2">
  <div id="exptoword" class="table-responsive-sm">
    <h2 class="mt-4">DATA LAPORAN PENGADUAN SISIKAT</h2><br>
    <table class="table">
      <!-- <caption>List of users</caption> -->
      <thead>
        <tr class="align-middle">
            <th width="30">No.</th>
            <th width="60">Tanggal <br>Pengaduan</th>
            <th width="60">Jenis <br>Infrastruktur</th>
            <th width="90">Isi Laporan/<br>Pengaduan</th>
            <th width="70">Nama/<br>Ruas Jalan</th>
            <th width="60">Kec./Distrik</th>
            <th width="60">Kab./Kota</th>
            <th width="70">Titik Lokasi<br>(Koordinat)</th>
            <th width="70">Nama Pelapor/<br>NIK</th>
            <th width="70">No. HP/<br>Email</th>
            <th width="80">Alamat Lengkap<br>(Sesuai KTP)</th>
            <th width="100">Dokumentasi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($laporan as $lap) 
        { 
          if($lap['dokumentasi1']!=NULL) {
            $dokumentasi1 = base_url('upload/dokumentasi/').$lap['dokumentasi1'];
          } else {
            $dokumentasi1 = base_url('resources/admintheme/assets/img/noimage.jpg');
          }
          if($lap['dokumentasi2']!=NULL) {
            $dokumentasi2 = base_url('upload/dokumentasi/').$lap['dokumentasi2'];
          } else {
            $dokumentasi2 = base_url('resources/admintheme/assets/img/noimage.jpg');
          }
          if($lap['dokumentasi3']!=NULL) {
            $dokumentasi3 = base_url('upload/dokumentasi/').$lap['dokumentasi3'];
          } else {
            $dokumentasi3 = base_url('resources/admintheme/assets/img/noimage.jpg');
          } 
        ?>
        <tr>
          <td><?php echo $no++;?></td>
          <td><?php echo $lap['tgl_laporan'];?></td>
          <td><?php echo $lap['infrastruktur'];?></td>
          <td><?php echo $lap['pengaduan'];?></td>
          <td><?php echo $lap['lokasi_namajalan'];?></td>
          <td><?php echo $lap['lokasidistrik'];?></td>
          <td><?php echo $lap['lokasikabkota'];?></td>
          <td><?php echo $lap['latitude']."<br>".$lap['longitude'];?></td>
          <td><?php echo $lap['nama_pelapor']."<br>".$lap['nik'];?></td>
          <td><?php echo $lap['no_hp'];?></td>
          <td><?php echo $lap['alamat_pelapor'];?></td>
          <td>
            <img width="150" height="80" src="<?php echo $dokumentasi1;?>"><br>
            <img width="150" height="80" src="<?php echo $dokumentasi2;?>"><br>
            <img width="150" height="80" src="<?php echo $dokumentasi3;?>">
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

    <footer>
        <div class="row">
            <div class="province col">
                <img src="<?php echo base_url('resources/admintheme/assets/img/logo-footer-cetak.png');?>">
            </div>
            <div class="date col">
                <p>Copyright SISIKAT 2021<br>
                Print Date: <?php echo date("d-m-Y H:i:s");?></p>
            </div>
        </div>
    </footer>
    </div>
</body>
</html>