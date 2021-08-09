<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SI-SIKAT | ADMIN KAB/KOTA</title>
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

        <!-- Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Panel Admin SISIKAT</a>
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
                            <a class="nav-link <?php if($this->uri->segment(2)==NULL){ echo'active'; }?>" href="<?php echo site_url('adminkab');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Laporan Pengaduan</div>

                            <a class="nav-link collapsed <?php if($this->uri->segment(2)=='infrastruktur'){ echo'active'; }?>" href="<?php echo site_url('adminkab/infrastruktur');?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-road"></i></div>
                               By-Infrastruktur
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="<?php echo $this->uri->segment(2)=='infrastruktur' ? 'collapse.show' : 'collapse';?>" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?php if($this->uri->segment(2)=='infrastruktur' && $this->uri->segment(3)==NULL){ echo'active'; }?>" href="<?php echo base_url('adminkab/infrastruktur')?>">Semua Infrastruktur</a>
                                    <a class="nav-link <?php if($this->uri->segment(2)=='infrastruktur' && $this->uri->segment(3)=='jalan'){ echo'active'; }?>" href="<?php echo site_url('adminkab/infrastruktur/jalan');?>">
                                        Jalan
                                    </a>
                                    <a class="nav-link <?php if($this->uri->segment(2)=='infrastruktur' && $this->uri->segment(3)=='drainase'){ echo'active'; }?>" href="<?php echo site_url('adminkab/infrastruktur/drainase');?>">
                                        Drainase
                                    </a>  
                                </nav>
                            </div>                        
                            
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo ($this->ion_auth->logged_in()) ? ucfirst($this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name)  : 'Please Login';?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <?php                    
                        if(isset($_view) && $_view)
                         $this->load->view($_view);
                    ?>    
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


        <!-- Modal Detail Setiap Infrastruktur -->
        <div class="modal fade" id="ISBN-001122" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Laporan</h5>
                <button id="closeBtn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="card-title">Data Pelapor</h5>
            <div class="row">
                <div id="idcard" class="col-sm-5">
                    <div class="card">
                    <div class="card-body">
                        <img src="http://1.bp.blogspot.com/-cKbR2Cw8BLU/VrLaPvhz9pI/AAAAAAAAAcE/Pe9LhaTN1sY/s1600/Scan%2BKTP.JPG" alt="id-card" >
                    </div>
                    </div>
                </div>
                
                <div id="identity" class="col-sm-7">
                    <div class="card">
                    <div class="card-body">
                        <table class="table">
                        <tbody>
                            <tr>
                            <td width="30%">NIK</td>
                            <td>:</td>
                            <td>1904502455xxx</td>
                            </tr>
                            <tr>
                            <td width="30%">Nama Lengkap</td>
                            <td>:</td>
                            <td>Gajah Mada Bin Gajah Duduk</td>
                            </tr>
                            <tr>
                            <td width="30%">Alamat Lengkap</td>
                            <td>:</td>
                            <td>(Alamat Rumah, RT/RW, Kab./Kota, Kec./Distrik, dan Kel./Desa)</td>
                            </tr>
                            <tr>
                            <td width="30%">Email</td>
                            <td>:</td>
                            <td>myemail@email.com</td>
                            </tr>
                            <tr>
                            <td width="30%">Nomor HP</td>
                            <td>:</td>
                            <td>0812474147444</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <div id="report" class="col-sm-12">
                    <h4 class="card-title">Detail Laporan</h4>
                    <div class="card">
                    <div class="card-body">
                        <table class="table">
                        <tbody>
                            <tr>
                            <td width="35%">Jenis Infrastruktur</td>
                            <td>:</td>
                            <td>Jalan</td>
                            </tr>
                            <tr>
                            <td width="35%">Koordinat Lokasi</td>
                            <td>:</td>
                            <td>Latitude: | Longitude: </td>
                            </tr>
                            <tr>
                            <td width="35%">Nama Ruas Jalan</td>
                            <td>:</td>
                            <td>Jalan Pertanian Kebuk Jeruk Kebun Anggur</td>
                            </tr>
                            <tr>
                            <td width="35%">Alamat Lengkap</td>
                            <td>:</td>
                            <td>(Kab./Kota, Kec./Distrik, dan Kel./Desa)</td>
                            </tr>
                        </tbody>
                        </table>
                        <h5>Isi Laporan:</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<p>
                        
                        <h5>Dokumentasi:</h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="https://images.pexels.com/photos/325288/pexels-photo-325288.jpeg" alt="jalan1">
                            </div>
                            <div class="col-sm-4">
                                <img src="https://images.pexels.com/photos/2902747/pexels-photo-2902747.jpeg" alt="jalan2">   
                            </div>
                            <div class="col-sm-4">    
                                <img src="https://images.pexels.com/photos/614484/pexels-photo-614484.jpeg" alt="jalan3">
                            </div>
                        </div>
                        


                    </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button id="closeBtn" type="button" class="btn btn-secondary closemodalBtn" data-dismiss="modal">Tutup</button>
            </div> -->
            </div>
        </div>
        </div>
        <!-- Akhir Modal Detail Setiap Infrastruktur -->
    </body>
</html>
