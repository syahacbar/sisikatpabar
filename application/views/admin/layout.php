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
        <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>resources/template/assets/favicon.png" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>resources/admintheme/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>resources/admintheme/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url();?>resources/admintheme/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>resources/admintheme/js/datatables-simple-demo.js"></script>
    </body>
</html>
