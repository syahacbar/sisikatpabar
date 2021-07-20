<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Untuk Favicon -->
        <title>SI-SIKAT - Laporan Pengaduan </title>
        <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>resources/template/assets/favicon.png" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

        <!-- Tambahan Link Untuk CSS dari Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        
        <!-- Font Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url();?>resources/template/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>resources/template/css/css-pengaduan.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>resources/template/css/laporan.css" rel="stylesheet" />

        <!-- Tambahan Link CSS Untuk Counter -->
        <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand" href="#">
                <img src="<?php echo base_url();?>resources/template/assets/logo-sisikat.png" width="30" height="30" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url();?>">Tentang SI-SIKAT</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url('lapor');?>#statistik">Statistik</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#">Lihat Laporan</a></li>
                    </ul>
                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            <span class="small">Masuk</span>
                        </span>
                    </button>
                </div>
            </div>
        </nav>

        <!-- TABEL LAPORAN -->
        <div class="laporan">
        <h2 class="display-4 text-center lh-1 mb-4 ">Laporan Pengaduan</h2>
        </div>
        <div class="search container">
            <form action="" method="">
                <input class="col-lg-9 col-md-9 col-sm-9 col-xs-9" type="text" name="keyword" autofocus placeholder="Ketik kata kunci di sini ..." autocomplete="off">
                <button class="col-lg-3 col-md-3 col-sm-3 col-xs-3" type="submit" name="cari">Cari</button>
            </form>
        </div>
        <div class="table-responsive">
            <div class="container">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th style="width:5%">No.</th>
                    <th style="width:20%">Dokumentasi</th>
                    <th style="width:30%">Isi Lapaoran</th>
                    <th  style="width:15%">Lokasi</th>
                    <th  style="width:15%">Tanggal Dilaporkan</th>
                    <th style="width:10%">Status</th>

                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach ($laporan as $l) { ?>
                <tr>
                    <th scope="row"><?php echo $no++;?></th>
                    <td>
                        <img src="<?php echo base_url('upload/dokumentasi/').$l['nama_file'];?>" alt="">
                        <p><?php echo $l['lokasi_namajalan'];?></p>
                    </td>
                    <td><?php echo word_limiter($l['pengaduan'],50);?></td>
                    <td><?php echo $l['lokasi'];?></td>
                    <td><?php echo $l['tgl_laporan'];?></td>
                    <td>
                        <i class="bi bi-check-square-fill me-2"></i>
                       <p>Selesai</p>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
        
        <!-- Footer -->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">SI-SIKAT &copy; 2021. All Rights Reserved.</div>
                    <a href="#!">Privasi</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Istilah</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a>
                </div>
            </div>
        </footer>
        <!-- Akhir Footer -->
        
        <!-- Tambahan JS dari Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url();?>resources/template/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        <!-- Link JS Untuk Counter -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url();?>resources/template/js/js-pengaduan.js"></script>

    </body>
</html>
