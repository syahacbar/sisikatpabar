<?php
 header("Content-Type: application/vnd.ms-word");
        header("Expires: 0");
        header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
        header("Content-disposition: attachment; filename=export.doc");
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
    <title>Laporan</title>
<style>
@page Section1 {size:595.45pt 841.7pt; margin:1.0in 1.25in 1.0in 1.25in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}
div.Section1 {page:Section1;}
@page Section2 {size:841.7pt 595.45pt;mso-page-orientation:landscape;margin:1.25in 1.0in 1.25in 1.0in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}
div.Section2 {page:Section2;}
</style>
</head>
<body>
    <div class=Section2>
    <div class="table-responsive-sm">
    <h2 class="mt-4">DATA LAPORAN PENGADUAN SISIKAT</h2>
    <h3></h3>
    <table class="table">
      <!-- <caption>List of users</caption> -->
      <thead>
        <tr class="align-middle">
            <th scope="col">No.</th>
            <th scope="col">Tgl. <br>Pengaduan</th>
            <th scope="col">Isi Laporan/<br>Pengaduan</th>
            <th scope="col">Nama/<br>Ruas Jalan</th>
            <th scope="col">Distrik</th>
            <th scope="col">Kab./Kota</th>
            <th scope="col">Titik Lokasi <br>(Koordinat)</th>
            <th scope="col">Nama/NIK</th>
            <th scope="col">No. HP/<br>Email</th>
            <th scope="col">Alamat <br>(Sesuai KTP)</th>
            <th scope="col">Dokumentasi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($laporan as $lap) { ?>
        <tr>
          <td><?php echo $no++;?></td>
          <td><?php echo $lap['tgl_laporan'];?></td>
          <td><?php echo $lap['pengaduan'];?></td>
          <td><?php echo $lap['lokasi_namajalan'];?></td>
          <td><?php echo $lap['lokasidistrik'];?></td>
          <td><?php echo $lap['lokasikabkota'];?></td>
          <td><?php echo $lap['latitude']."<br>".$lap['longitude'];?></td>
          <td><?php echo $lap['nama_pelapor']."<br>".$lap['nik'];?></td>
          <td><?php echo $lap['no_hp'];?></td>
          <td><?php echo $lap['alamat_pelapor'];?></td>
          <td>
            <img src="<?php echo base_url('upload/dokumentasi/').$lap['dokumentasi1'];?>"><br>
            <img src="<?php echo base_url('upload/dokumentasi/').$lap['dokumentasi2'];?>"><br>
            <img src="<?php echo base_url('upload/dokumentasi/').$lap['dokumentasi3'];?>">
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>

    <footer>
        <div class="row">
            <div class="province col">
                <img src="https://d23ndc1l41hue8.cloudfront.net/wp-content/uploads/2020/09/LOGO_9100_PAPUA-BARAT-407x540.png">
            </div>
            <div class="sisikat col">
                <img src="https://sisikat.com/resources/template/assets/logo-sisikat.png">
            </div>
            <div class="spacer col">
                <img src="https://sisikat.com/resources/template/assets/logo-sisikat.png">
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