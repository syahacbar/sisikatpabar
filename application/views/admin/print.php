<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tambahan Link Untuk CSS dari Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Laporan</title>
    <style type="text/css">
        .sisikat img {
            width: 100px;
            filter: invert(1);
        }

        .province img {
            width: 50px;
        }

        h2 {
            text-align: center;
            padding-top: 7rem;

        }

        h3 {
            text-align: center;
            padding-bottom: 2rem;

        }

        .table {
            width: 96%;
            margin: 0 2%;
        }

        .table thead th {
            vertical-align: middle;
            border: 2px solid #dee2e6;
        }

        .table td,
        .table th {
            padding: .75rem;
            vertical-align: top;
            border: 1px solid #dee2e6;
            text-align: left;
        }


        footer {
            width: 96%;
            margin: 0 2%;
        }

        .sisikat {
            display: flex;
            justify-content: center;
            width: 40%;
            padding: 0;
            min-width: 10% !important;
        }

        .sisikat img {
            height: auto;
            object-fit: contain;
            padding: 0 !important;
            width: 100%;
        }

        .province {
            width: 100px;
            display: flex;
            max-width: 100px;
            min-width: 10%;
            justify-content: center;
        }

        .province img {
            object-fit: contain;
            width: 40%;
        }


        .date.col {
            width: 100px;
            display: flex;
            max-width: 100px;
            min-width: 20%;
            justify-content: center;
            flex-direction: column;
        }

        .date.col p {
            text-align: left;
            width: 100%;
            padding: 0;
            font-weight: bold;
            font-size: 16px;
            margin: 5px 0;
        }

        .spacer.col {
            min-width: 60%;
        }

        tbody img {
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 30%;
        }


    </style>
</head>
<body>
    <div class="table-responsive-sm">
    <h2 class="mt-4">DATA LAPORAN PENGADUAN SISIKAT</h2>
    <h3><?php echo $laporan;?></h3>
    <table class="table">
      <!-- <caption>List of users</caption> -->
      <thead>
        <tr class="align-middle">
            <th scope="col">No.</th>
            <th scope="col">Tgl. <br>Pengaduan</th>
            <th scope="col">isi Pengaduan/<br>Laporan</th>
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
                <p>Copyright SISIKAT 2021</p>
                <p>Print Date: <?php echo date("d-m-Y H:i:s");?></p>
            </div>
        </div>
    </footer>
</body>
</html>