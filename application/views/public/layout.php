<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $title;?></title>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
        <!-- Tambahan JS dari Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>
        <!-- JS Inti-->
        <script src="<?php echo base_url();?>resources/template/js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        <!-- Link ke JS Counter -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url();?>resources/template/js/js-pengaduan.js"></script>
        
        
         <script src="<?php echo base_url('resources/datatables/jquery/jquery-2.2.3.min.js')?>"></script>
        <script src="<?php echo base_url('resources/datatables/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('resources/datatables/datatables/js/jquery.dataTables.min.js')?>"></script>
        <script src="<?php echo base_url('resources/datatables/datatables/js/dataTables.bootstrap.min.js')?>"></script>
        
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
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url();?>">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url('statistik');?>">Statistik Pengaduan</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url('skruasjalan');?>">SK Ruas Jalan</a></li>
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


                    <?php                    
                        if(isset($_view) && $_view)
                         $this->load->view($_view);
                    ?> 


        <!-- Footer -->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">SI-SIKAT &copy; 2021. All Rights Reserved.</div>
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
                        <?php echo form_open("auth/login");?>
                            <a class="navbar-brand" href="#">
                                <img src="<?php echo base_url();?>resources/template/assets/logo-sisikat.png" width="30" height="30" class="d-inline-block align-top" alt="">
                            </a>
                            <h2 class="display-4 text-center lh-1 mb-4">Login</h2>
                            <div class="mb-3">
                              <label for="identity" class="form-label">Email</label>
                              <input name="identity" type="text" class="form-control" id="identity" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label">Kata Sandi</label>
                              <input name="password" type="password" class="form-control" id="password">
                            </div>
                            <div class="mb-3 form-check">
                              <input name="remember" type="checkbox" class="form-check-input" id="remember">
                              <label class="form-check-label" for="remember">Biarkan saya tetap masuk</label>
                            </div>
                            <button type="submit" class="btn btn-primary">MASUK</button>
                          <?php echo form_close();?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Login Anggota-->

        <!-- Modal Bantuan 1 -->
        <div class="modal fade" id="modalBantuan" tabindex="-1" role="dialog" aria-labelledby="modalBantuanLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBantuanLabel">Info!</h5>
                        <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                <div class="modal-body">
                    Untuk gambar pertama, foto tampak depan jalan atau drainase. Lihat gambar di bawah ini sebagai contoh.
                    <img src="https://cdn-radar.jawapos.com/uploads/radarjombang/news/2019/04/10/perbaikan-jalan-rusak-di-jombang-terkendala-aspal-yang-belum-datang_m_130925.jpg" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Bantuan -->

        <!-- Modal Bantuan 2 -->
        <div class="modal fade" id="modalBantuan1" tabindex="-1" role="dialog" aria-labelledby="modalBantuan1Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBantuan1Label">Info!</h5>
                        <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                <div class="modal-body">
                    Silakan Unggah bukti laporan pengaduan Anda dalam bantuk gambar.
                    <img src="https://cdn-radar.jawapos.com/uploads/radarjombang/news/2019/04/10/perbaikan-jalan-rusak-di-jombang-terkendala-aspal-yang-belum-datang_m_130925.jpg" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Bantuan -->

        <!-- Modal Bantuan 3 -->
        <div class="modal fade" id="modalBantuan2" tabindex="-1" role="dialog" aria-labelledby="modalBantuan2Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBantuan2Label">Info!</h5>
                        <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                <div class="modal-body">
                    Silakan buat pose selfi dengan membelakangi jalan rusak.
                    <img src="https://www.harapanrakyat.com/wp-content/uploads/2019/03/Protes-Jalan-Rusak.jpg" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Bantuan -->

        <!-- Modal Detail Laporan-->
        <div class="modal fade" id="report-detail" tabindex="-1" role="dialog" aria-labelledby="report-detailTitle" aria-hidden="true">
            <div id="newreport" class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="modal-header">
                        <h5 class="modal-title" id="report-detailTitle"><span id="slokasi_namajalant"></span></h5>
                    </div>
                    <div class="modal-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img id="sdokumentasi1" src="" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img id="sdokumentasi2" src="" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <div class="card-body">
                            <p class="card-text"><span id="spengaduan"></span></p>
                            <p class="card-text"><small class="text-muted">Lokasi Ruas Jalan: </small><span id="slokasi_namajalan"></span></p>
                            <p class="card-text"><small class="text-muted">Kecamatan/Distrik: </small><span id="slokasi_distrik"></span></p>
                            <p class="card-text"><small class="text-muted">Kabupaten/Kota: </small><span id="slokasi_kabkota"></span></p>
                            <p class="card-text"><small class="text-muted">Koordinat Lokasi: </small><span id="slokasi_koordinat"></span></p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        
  
        



    </body>
</html>
