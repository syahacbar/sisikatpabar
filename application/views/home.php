<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SI-SIKAT - Beranda</title>
        <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>resources/template/assets/favicon.png" />
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
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url();?>resources/template/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>resources/template/css/css-pengaduan.css" rel="stylesheet" />

        <!-- Tambahan Link CSS Untuk Counter -->
        <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
        <?php echo $map['js']; ?>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>
    </head>

    <body id="page-top">
        <!-- Navigasi Topbar-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand" href="#">
                <img src="<?php echo base_url();?>resources/template/assets/logo-sisikat.png" width="30" height="30" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url();?>">Tentang SI-SIKAT</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#statistik">Statistik</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url('laporan');?>">Lihat Laporan</a></li>
                    </ul>
                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#loginpage">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            <span class="small">Masuk</span>
                        </span>
                    </button>
                </div>
            </div>
        </nav>
        <!-- Akhir Navigasi Topbar-->
        
        <!-- Header Web -->
        <header id="header" class="masthead">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <!-- Header - Bagian tulisan SISIKAT dan tagline-->
                    <div class="col-lg-6">
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 class="display-1 lh-1 mb-3">SI-SIKAT</h1>
                            <p class="lead fw-normal text-muted mb-5">Sistem Informasi <br>Infrastruktur Berbasis Partisipasi Masyarakat</p>
                            <div class="d-flex flex-column flex-lg-row align-items-center">
                                <!-- <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." />Lapor Sekarang</a>
                                <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a> -->
                                <a class="me-lg-3 mb-4 mb-lg-0" href="#formulir" >Lapor Sekarang</a>
                                <!-- <a class="me-lg-3 mb-4 mb-lg-0" href="#!" >Alur</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- Header - Akhir Bagian tulisan SISIKAT dan tagline-->

                    <!-- Header - Gambar Mockup HP -->
                    <div class="col-lg-6">
                        <div class="masthead-device-mockup">
                            <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                        <stop class="gradient-start-color" offset="0%"></stop>
                                        <stop class="gradient-end-color" offset="100%"></stop>
                                    </linearGradient>
                                </defs>
                                <circle cx="50" cy="50" r="50"></circle></svg
                            ><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
                                <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
                                <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect></svg
                            ><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50"></circle></svg>
                            <div class="device-wrapper">
                                <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                                    <div class="screen bg-black">
                                        <img src="<?php echo base_url();?>resources/template/assets/img/form.jpg" style="max-width: 100%; height: 100%"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Header - Gambar Mockup HP -->
                </div>
            </div>
        </header>
        <!-- Header Web -->

        <!-- Statistik Laporan -->
        <section id="statistik">
            <h2 class="display-4 text-center lh-1 mb-4 ">Jumlah Laporan Sekarang</h2>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-12 order-lg-1 mb-5 mb-lg-0">
                        <div class="container-fluid px-5">
                            <div id="jalandrainase" class="row gx-10">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="employees">
                                        <p class="counter-count"><?php echo $jum_lap_jalan;?></p>
                                        <p class="employee-p">Pengaduan Masalah Jalan</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="customer">
                                        <p class="counter-count"><?php echo $jum_lap_drainase;?></p>
                                        <p class="employee-p">Pengaduan Masalah Drainase</p>
                                    </div>
                                </div>
                               
                        </div>
                    </div>
                    <div class="more-btn col-lg-12 order-lg-1 mb-5 mb-lg-0">
                        <a href="<?php echo base_url('lapor/statistik');?>" class="btn btn-outline-primary">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Statistik Laporan -->

        <!-- Formulir Pengaduan -->
        <section id="formlapor">
        <div id="formulir" class="container">
            <div class="container px-5">
                <h2 class="display-4 text-center lh-1 mb-4">Form Laporan Pengaduan</h2>
                    <div class="row gx-5 align-items-center">
                    <h3>Identitas Pelapor</h3>
                    <p>Lengkapi data identitas anda sesuai KTP.</p>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php echo form_open_multipart('lapor/add',array('id'=>'formlaporan')); ?>

                                <!-- NIK -->
                                <div class="row mb-4">
                                    <div class="col">
                                      <div class="form-outline">
                                        <input id="nik" name="nik" type="text" class="form-control" placeholder="Ketik NIK Anda" required/>
                                      </div>
                                    </div>
                                </div>   
                                <!-- Akhir NIK -->

                                <!-- Nama -->
                                <div class="row mb-4">
                                  <div class="col">
                                    <div class="form-outline">
                                      <input name="nama_pelapor" type="text" class="form-control" placeholder="Ketik Nama Anda" required/>
                                    </div>
                                  </div>
                                </div>
                                <!-- Akhir Nama -->

                                <!-- Alamat -->
                                <div class="row mb-4">
                                    <div class="col">
                                      <div class="form-outline">
                                        <textarea name="alamat_pelapor" class="form-control" rows="4" placeholder="Ketik alamat Anda dengan format: Nama Jalan, No. Rumah/Blok, Nama Kompleks, RT/RW" required></textarea>
                                      </div>
                                    </div>
                                </div>
                                <!-- Akhir Alamat --> 

                                <!-- Kabupaten -->
                                <div class="row mb-4">
                                    <div class="col">
                                      <div class="form-outline">
                                      <select name="kab_pelapor" id="kab_pelapor">
                                            <option><i class="fas fa-chevron-down"></i>- Pilih Kabupaten/Kota -</option>
                                            <?php 
                                                foreach($kabupaten as $kab)
                                                {
                                                    echo '<option value="'.$kab->kode.'">'.$kab->nama.'</option>';
                                                }
                                            ?>
                                        </select>
                                      </div>
                                    </div>
                                </div>
                                <!-- Akhir Kabupaten -->     

                                <!-- Kecamatan -->
                                <div class="row mb-4">
                                    <div class="col">
                                      <div class="form-outline">
                                        <select name="kec_pelapor" id="kec_pelapor">
                                            <option>- Pilih Kecamatan/Distrik -</option>
                                        </select>
                                      </div>
                                    </div>
                                </div>
                                <!-- Akhir Kecamatan --> 

                                <!-- Kel./Desa -->
                                <div class="row mb-4">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <select name="des_pelapor" id="des_pelapor">
                                            <option><i class="fas fa-chevron-down"></i>- Pilih Kelurahan/Desa -</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Akhir Kel./Desa -->                                                                   

                                <!-- Email dan Nomor HP-->
                                <div class="row mb-4">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-outline">
                                      <input name="email" type="email" class="form-control" placeholder="Ketik Alamat Email Anda" required/>
                                    </div>
                                  </div>

                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-outline">
                                      <input name="no_hp" type="text" class="form-control" placeholder="Ketik Nomor HP Anda" required/>
                                    </div>
                                  </div>
                                </div>
                                <!-- Email -->

                                <!-- Unggah Bukti -->
                                <div class="dropzone ktp" id="ktp">
                                    <div class="dz-message">
                                        <h3> Klik atau Drop gambar disini</h3>
                                    </div>
                                </div>
                                <!-- Jenis Infrastruktur-->
                                <div class="report">
                                    <h3>Data Laporan</h3>
                                    <p>Isi formulir laporan pengaduan tentang infrastruktur dibawah ini.</p>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <select name="infrastruktur">
                                            <option><i class="fas fa-chevron-down"></i>Pilih Jenis Infrastruktur</option>
                                            <option value="Jalan">Jalan</option>
                                            <option value="Drainase">Drainase</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Akhir Jenis Infrastruktur-->

                                <!-- Maps -->
                                <div class="row mb-4">
                                    <div class="col">
                                      <div class="form-outline">
                                        <label class="form-label">Tandai Lokasi Yang Dilaporkan Dengan Menggeser Penanda Merah Pada Peta Berikut Ini</label>
                                        <?php echo $map['html']; ?>
                                      </div>
                                    </div>
                                </div>
                                <!-- Akhir Maps -->

                                <!-- Latitude & Longitude -->
                                <div class="row mb-4">
                                    <div class="col">
                                      <div class="form-outline">
                                        <input name="latitude" type="text" id="latitude" class="form-control" placeholder="Latitude" value="<?php echo set_value('latitude'); ?>" readonly/>
                                      </div>
                                    </div>

                                    <div class="col">
                                      <div class="form-outline">
                                        <input name="longitude" type="text" id="longitude" class="form-control" placeholder="Longitude" value="<?php echo set_value('longitude'); ?>" readonly/>
                                      </div>
                                    </div>
                                </div>
                                <!-- Akhir Latitude & Longitude -->

                                <!-- Ruas Jalan -->
                                <div class="row mb-4">
                                    <div class="col">
                                      <div class="form-outline">
                                        <input name="lokasi_namajalan" type="text" class="form-control" placeholder="Ruas Nama Jalan" required/>
                                      </div>
                                    </div>
                                </div>
                                <!-- Akhir Ruas Jalan -->

                                <!-- Kabupaten -->
                                <div class="row mb-4">
                                    <div class="col">
                                      <div class="form-outline">
                                        <select name="lokasi_kabkota" id="lokasi_kabkota">
                                            <option>- Pilih Kabupaten/Kota -</option>
                                            <?php 
                                                foreach($kabupaten as $kab)
                                                {
                                                    echo '<option value="'.$kab->kode.'">'.$kab->nama.'</option>';
                                                }
                                            ?>
                                        </select>
                                      </div>
                                    </div>
                                </div>
                                <!-- Akhir Kabupaten -->

                                <!-- Kecamatan -->
                                <div class="row mb-4">
                                    <div class="col">
                                      <div class="form-outline">
                                        <select name="lokasi_distrik" id="lokasi_distrik">
                                            <option>- Pilih Kecamatan/Distrik -</option>
                                        </select>
                                      </div>
                                    </div>
                                </div>
                                <!-- Akhir Kecamatan -->

                                <!-- Isi Laporan -->
                                <div class="row mb-4">
                                    <div class="col">
                                      <div class="form-outline">
                                        <textarea name="pengaduan" class="form-control" rows="4" placeholder="Jelaskan laporan Anda di sini" required></textarea>
                                      </div>
                                    </div>
                                </div>
                                <!-- Akhir Isi Laporan -->


                                <!-- Doc. Laporan -->
                                <div class="row mb-4">
                                <h6>Unggah Bukti Laporan</h6>
                                    <p>Sesuaikan gambar yang diunggah dengan instruksi. Klik ikon tanda tanya untuk melihat instruksi.</p>
                                    <div id="foto1" class="col">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBantuan">
                                            <i class="fas fa-question" style="font-size: 48px;"></i>
                                        </button>
                                    <div class="dropzone dokumentasi" id="dokumentasi">
                                            <div class="dz-message">
                                                <p>Foto Pertama</p>
                                            </div>
                                        </div> 
                                    </div>

                                    <div id="foto2" class="col">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBantuan">
                                            <i class="fas fa-question" style="font-size: 48px;"></i>
                                        </button>
                                    <div class="dropzone dokumentasi" id="dokumentasi">
                                            <div class="dz-message">
                                                <p>Foto Kedua</p>
                                            </div>
                                        </div> 
                                    </div>

                                    <div id="fotoselfi" class="col">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBantuan">
                                            <i class="fas fa-question" style="font-size: 48px;"></i>
                                        </button>
                                        <div class="dropzone dokumentasi" id="dokumentasi">
                                            <div class="dz-message">
                                                <p>Foto Selfi</p>
                                            </div>
                                        </div> 
                                    </div>

                                </div>
                                <!-- Akhir Doc. Laporan -->                                
                                
                                <!-- <div class="dropzone dokumentasi" id="dokumentasi">
                                  <div class="dz-message">
                                    <h3> Klik atau Drop gambar dokumentasi disini</h3>
                                  </div>
                                </div>  -->

                                <!-- Kebijakan Privasi -->
                                <div id="policy" class="form-check d-flex justify-content-center mb-4">
                                  <label class="form-check-label">Dengan ini, saya menyatakan bahwa informasi yang saya berikan adalah benar dan dapat dipertanggungjawabkan.</label>
                                </div>
                                <!-- Akhir Kebijakan Privasi -->
                                <input type="hidden" id="kodelap" name="kodelap" value="<?php echo $kodelap;?>">
                                <!-- Tombol Kirim -->
                                <button id="btnSubmit" name="submit" type="submit" class="btn btn-primary btn-block mb-4">Kirim Laporan</button>
                                <!-- Tombol Kirim -->
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        </section>
        <!-- Akhir Formulir pengaduan -->

        <!--  Blok Laporan Terbaru -->
        <div id="laporan" class="container">
            <div id="newwst" class="col-lg-12">
                <h2 class="display-4 text-center lh-1 mb-4">Laporan Terbaru</h2>
                    <div class="container-fluid px-5">
                        <!-- Laporan Baris Pertama -->
                        <div class="row">
                            <?php foreach ($laporan1 as $res1) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <img src="<?php echo base_url('upload/dokumentasi/').$res1['nama_file'];?>" alt="">
                                <h3 class="font-alt"><?php echo $res1['lokasi_namajalan'];?></h3>
                                <p class="text-muted mb-0"><?php echo word_limiter($res1['pengaduan'],10); ?></p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                                    Detail
                                </button>
                            </div>

                        <?php } ?>
                        </div>
                        <!-- Akhir Laporan Baris Pertama -->

                        <!-- Laporan Baris Kedua -->
                        <div class="row">
                            <?php foreach ($laporan2 as $res2) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <img src="<?php echo base_url('upload/dokumentasi/').$res2['nama_file'];?>" alt="">
                                <h3 class="font-alt"><?php echo $res2['lokasi_namajalan'];?></h3>
                                <p class="text-muted mb-0"><?php echo word_limiter($res2['pengaduan'],10);?></p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                                    Detail
                                </button>
                            </div>
                        <?php } ?>
                        </div>
                        <!-- Laporan Baris Kedua -->
                    </div>
            </div>
        </div>
        <!--  Akhir Blok Laporan Terbaru -->
    
        <!-- Modal Detail Laporan Terakhir-->
        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div id="newreport" class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Laporan 1</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Detail Laporan di sini
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Detail Laporan Terakhir-->

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

        <!-- Modal Login Anggota-->
        <div class="modal fade" id="loginpage" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Send feedback</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                        <form>
                            <a class="navbar-brand" href="#">
                                <img src="<?php echo base_url();?>resources/template/assets/logo-sisikat.png" width="30" height="30" class="d-inline-block align-top" alt="">
                            </a>
                            <h2 class="display-4 text-center lh-1 mb-4">Login</h2>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                              <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Biarkan saya tetap masuk</label>
                            </div>
                            <button type="submit" class="btn btn-primary">MASUK</button>
                          </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Login Anggota-->

        <!-- Modal Bantuan -->
        <div class="modal fade" id="modalBantuan" tabindex="-1" role="dialog" aria-labelledby="modalBantuanLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBantuanLabel">Info!</h5>
                        <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                <div class="modal-body">
                    Silakan Unggah bukti laporan pengaduan Anda dalam bantuk gambar.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Bantuan -->


        <!-- Tambahan JS dari Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- JS Inti-->
        <script src="<?php echo base_url();?>resources/template/js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        <!-- Link ke JS Counter -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url();?>resources/template/js/js-pengaduan.js"></script>
        

        <script>
            function setMapToForm(latitude, longitude) 
            {
              $('input[name="latitude"]').val(latitude);
              $('input[name="longitude"]').val(longitude);
            }

            Dropzone.autoDiscover = false;
            $(document).ready(function(){      

                $("#lokasi_kabkota").change(function (){
                    var url = "<?php echo site_url('lapor/add_ajax_kec');?>/"+$(this).val();
                    $('#lokasi_distrik').load(url);
                    return false;
                });     
                $("#kab_pelapor").change(function (){
                    var url = "<?php echo site_url('lapor/add_ajax_kec');?>/"+$(this).val();
                    $('#kec_pelapor').load(url);
                    return false;
                });    
                $("#kec_pelapor").change(function (){
                    var url = "<?php echo site_url('lapor/add_ajax_des');?>/"+$(this).val();
                    $('#des_pelapor').load(url);
                    return false;
                });


                var ktp_upload= new Dropzone(".ktp",{
                    autoProcessQueue: false,
                    url: "<?php echo site_url('lapor/uploadktp') ?>",
                    maxFilesize: 10,
                    method:"post",
                    acceptedFiles:"image/*",
                    paramName:"filektp",
                    dictInvalidFileType:"Type file ini tidak dizinkan",
                    addRemoveLinks:true,
                });

                ktp_upload.on("sending",function(a,b,c){
                    a.token=Math.random();
                    c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
                    c.append("kodelap", $('#kodelap').val());
                });

                var dokumentasi_upload= new Dropzone(".dokumentasi",{
                    autoProcessQueue: false,
                    url: "<?php echo site_url('lapor/uploaddokumentasi') ?>",
                    maxFilesize: 10,
                    method:"post",
                    acceptedFiles:"image/*",
                    paramName:"filedokumentasi",
                    dictInvalidFileType:"Type file ini tidak dizinkan",
                    addRemoveLinks:true,
                });

                dokumentasi_upload.on("sending",function(a,b,c){
                    a.token=Math.random();
                    c.append("token_dokumentasi",a.token); //Menmpersiapkan token untuk masing masing foto
                    c.append("kodelap", $('#kodelap').val());
                });

                $('form').submit(function(e) {
                    e.preventDefault();
                    ktp_upload.processQueue();
                    dokumentasi_upload.processQueue();


                   var nik = $("input[name='nik']").val();
                   var nama_pelapor = $("input[name='nama_pelapor']").val();                  
                   var alamat_pelapor = $("textarea[name='alamat_pelapor']").val();                     
                   var kab_pelapor = $("select[name='kab_pelapor']").val();               
                   var kec_pelapor = $("select[name='kec_pelapor']").val();             
                   var des_pelapor = $("select[name='des_pelapor']").val();        
                   var email = $("input[name='email']").val();        
                   var no_hp = $("input[name='no_hp']").val();     
                   var infrastruktur = $("select[name='infrastruktur']").val();  
                   var latitude = $("input[name='latitude']").val();  
                   var longitude = $("input[name='longitude']").val();  
                   var lokasi_namajalan = $("input[name='lokasi_namajalan']").val();                    
                   var lokasi_kabkota = $("select[name='lokasi_kabkota']").val();               
                   var lokasi_distrik = $("select[name='lokasi_distrik']").val();           
                   var pengaduan = $("textarea[name='pengaduan']").val();      
                   var kodelap = $("input[name='kodelap']").val(); 


                    $.ajax({
                       url: "<?php echo site_url('lapor/add') ?>",
                       type: "POST",
                       data: {nik: nik, nama_pelapor: nama_pelapor, kab_pelapor:kab_pelapor, kec_pelapor:kec_pelapor,des_pelapor:des_pelapor,alamat_pelapor:alamat_pelapor,email:email,no_hp:no_hp,infrastruktur:infrastruktur,latitude:latitude,longitude:longitude,lokasi_namajalan:lokasi_namajalan,lokasi_kabkota:lokasi_kabkota,lokasi_distrik:lokasi_distrik,pengaduan:pengaduan,kodelap:kodelap},
                       error: function() {
                          alert('Something is wrong');
                       },
                       success: function(data) {
                            alert("Record added successfully");
                       }
                    });


                });
            });
            
        </script>

    </body>
</html>
