<?php echo form_open_multipart('upload/skruasjalan');?>

<?php
    $uploadDir = 'uploads';
    if (!empty($_FILES)) {
    $tmpFile = $_FILES['file']['tmp_name'];
    $filename = $uploadDir.'/'.time().'-'. $_FILES['file']['name'];
    move_uploaded_file($tmpFile,$filename);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SI-SIKAT | ADMIN PROVINSI</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>resources/admintheme/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>resources/admintheme/css/icon-css.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>resources/admintheme/css/css-modal.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>resources/template/assets/favicon.png" />

        <!-- JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>resources/admintheme/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>resources/admintheme/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url();?>resources/admintheme/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>resources/admintheme/js/datatables-simple-demo.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

        <!-- Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style>
            div#skruasjalan .card.mb-4 {
                padding: 15px;
            }

            .dz-default.dz-message span {
                font-size: 0;
            }

            .dz-default.dz-message span:after {
                font-size: 16px !important;
                content: "Seret atau pilih file untuk diunggah";
                text-align: center;
            }

            .dz-default.dz-message span:before {
                content: " ";
                background-image: url(https://image.flaticon.com/icons/png/512/337/337946.png);
                background-position: center;
                background-repeat: no-repeat;
                background-size: contain;
                height: 65px !important;
                display: block;
                font-size: 0;
            }

            form#image-upload {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            div#skruasjalan .col-md-12 {
                margin-bottom: 20px;
            }

            div#skruasjalan .dropzone {
                min-height: 150px;
                border: 1px solid rgb(206 212 218);
                background: white;
                padding: 20px 20px;
                border-radius: 5px;
            }

            div#skruasjalan button#uploadFile {
                margin-top: 20px;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?php echo base_url('admin');?>">Panel Admin SISIKAT</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo site_url('auth/change_password');?>">Change Password</a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('auth/login_history');?>">Login History</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('auth/logout');?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link <?php if($this->uri->segment(2)==NULL){ echo'active'; }?>" href="<?php echo site_url('admin');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Laporan Pengaduan</div>

                            <a class="nav-link collapsed <?php if($this->uri->segment(2)=='infrastruktur'){ echo'active'; }?>" href="<?php echo site_url('admin/infrastruktur');?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-road"></i></div>
                               By-Infrastruktur
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="<?php echo $this->uri->segment(2)=='infrastruktur' ? 'collapse.show' : 'collapse';?>" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?php if($this->uri->segment(2)=='infrastruktur' && $this->uri->segment(3)==NULL){ echo'active'; }?>" href="<?php echo base_url('admin/infrastruktur')?>">Semua Infrastruktur</a>
                                    <a class="nav-link <?php if($this->uri->segment(2)=='infrastruktur' && $this->uri->segment(3)=='jalan'){ echo'active'; }?>" href="<?php echo site_url('admin/infrastruktur/jalan');?>">
                                        Jalan
                                    </a>
                                    <a class="nav-link <?php if($this->uri->segment(2)=='infrastruktur' && $this->uri->segment(3)=='drainase'){ echo'active'; }?>" href="<?php echo site_url('admin/infrastruktur/drainase');?>">
                                        Drainase
                                    </a>  
                                </nav>
                            </div>                        
                            
                            <a class="nav-link collapsed <?php if($this->uri->segment(2)=='kabkota'){ echo'active'; }?>" href="<?php echo site_url('admin/kabkota');?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                By-Kabupaten/Kota
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="<?php echo $this->uri->segment(2)=='kabkota' ? 'collapse.show' : 'collapse';?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?php if($this->uri->segment(2)=='kabkota' && $this->uri->segment(3)==NULL){ echo'active'; }?>" href="<?php echo base_url('admin/kabkota')?>">Semua Kab/Kota</a>
                                <?php foreach ($kabupaten as $kab) { ?>    
                                    <a class="nav-link <?php if($this->uri->segment(2)=='kabkota' && $this->uri->segment(3)==$kab->kode){ echo'active'; }?>" href="<?php echo base_url('admin/kabkota/').$kab->kode?>"><?php echo ucwords(strtolower($kab->nama));?></a>
                                <?php } ?>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Pelaporan</div>
                            <a class="nav-link <?php if($this->uri->segment(2)=='download'){ echo'active'; }?>" href="<?php echo site_url('admin/download');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-download"></i></div>
                                Unduh Laporan
                            </a>

                             <div class="sb-sidenav-menu-heading">Manajemen Pengguna</div>
                            <a class="nav-link <?php if($this->uri->segment(2)=='users'){ echo'active'; }?>" href="<?php echo site_url('admin/users');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Admin Kab/Kota
                            </a>

                            <div class="sb-sidenav-menu-heading">Pengaturan</div>
                            <a class="nav-link <?php if($this->uri->segment(2)=='skruasjalan'){ echo'active'; }?>" href="<?php echo site_url('admin/skruasjalan');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                SK Ruas Jalan
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo ($this->ion_auth->logged_in()) ? ucfirst($this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name) : 'Please Login';?>
                    </div>
                </nav>
            </div>
            

                <div id="layoutSidenav_content">
                    <main>
                        <div id="skruasjalan" class="container-fluid px-4">
                            <h2 class="mt-4">SK Ruas Jalan</h2>
                            <div class="card mb-4">
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active"></li>
                            </ol>

                            <div class="row mb-4">
                                <div id="content">

                                <!-- Unggah File -->
                                <div id="identity" class="row mb-4">
                                    <h6>Unggah Foto KTP</h6>
                                    <div class="dropzone sk" id="sk">
                                        <div class="dz-message">
                                            <h3> Klik atau Drop gambar disini</h3>
                                        </div>
                                    </div>
                                </div>
                                    <!-- <button type="button" id="submit_dropzone_form">UPLOAD</button> -->
                                <button id="btnSubmit" name="submit" type="submit" class="btn btn-primary btn-block mb-4">Kirim Laporan</button>
                                <!-- Tombol Kirim -->
                                </div>
                            </div> 
                        </div>
                    </main>

                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; 2021 | Sistem Informasi Infrastruktur Berbasis Parisipasi Masyarakat</div>
                                <div>
                                    <a href="#">Privacy Policy</a>
                                    &middot;
                                    <a href="#">Terms &amp; Conditions</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            
            <script>
                Dropzone.autoDiscover = false;
                $(document).ready(function(){   

                    var sk_upload= new Dropzone(".sk",{
                        autoProcessQueue: true,
                        url: "<?php echo site_url('upload/skruasjalan') ?>",
                        maxFilesize: 50,
                        // maxFiles: 1,
                        method:"post",
                        acceptedFiles:"application/pdf",
                        paramName:"filesk",
                        dictInvalidFileType:"Type file ini tidak dizinkan",
                        addRemoveLinks:true,
                    });

                    sk_upload.on("sending",function(a,b,c){
                        a.token=Math.random();
                        c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
                        c.append("filesk", $('#filesk').val());
                    });


                });
            </script>
    </body>
</html>
