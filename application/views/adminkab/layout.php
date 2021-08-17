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
    <!-- <link href="<?php echo base_url();?>resources/admintheme/css/icon-css.css" rel="stylesheet" /> -->
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


    <script src="<?php echo base_url('resources/datatables/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('resources/datatables/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('resources/datatables/datatables/js/dataTables.bootstrap.min.js')?>"></script>

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

            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo site_url('auth/edit_user/').$this->ion_auth->user()->row()->id;?>">Edit Profile</a></li>
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


<div id="modal_lapdetail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> Laporan #<span id="idlap"></span></h3>
        <button type="button" class="btn btn-danger btn-closemodal" data-dismiss="modal"><i class="fa fa-times"></i></button>

    </div>
    <div class="modal-body">
        <h5 class="card-title">Data Pelapor</h5>
        <div class="row">
            <div id="idcard" class="col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <img src="" id="imgktp" alt="id-card" >
                    </div>
                </div>
            </div>

            <div id="identity" class="col-sm-7">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td width="30%">NIK</td>
                                    <td>:</td>
                                    <td><span id="nikModal"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%">Nama Lengkap</td>
                                    <td>:</td>
                                    <td><span id="namaModal"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%">Alamat Lengkap</td>
                                    <td>:</td>
                                    <td><span id="alamatModal"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%">Email</td>
                                    <td>:</td>
                                    <td><span id="emailModal"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%">Nomor HP</td>
                                    <td>:</td>
                                    <td><span id="nohpModal"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="report" class="col-sm-12">
                <h4 class="card-title">Detail Laporan</span></h4>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td width="35%">Jenis Infrastruktur</td>
                                    <td>:</td>
                                    <td><span id="infra"></span></td>
                                </tr>
                                <tr>
                                    <td width="35%">Koordinat Lokasi</td>
                                    <td>:</td>
                                    <td>
                                        <span id="koordinat"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%">Nama Ruas Jalan</td>
                                    <td>:</td>
                                    <td><span id="ruasjalan"></span></td>
                                </tr>
                                <tr>
                                    <td width="35%">Kec/Distrik</td>
                                    <td>:</td>
                                    <td><span id="lokasidistrik"></span></td>
                                </tr>
                                <tr>
                                    <td width="35%">Kab/Kota</td>
                                    <td>:</td>
                                    <td><span id="lokasikabkota"></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <h5>Isi Laporan:</h5>
                        <p id="pengaduan"><p>

                            <h5>Dokumentasi:</h5>
                            <div class="row">
                                <div class="col-sm-4">
                                    <img id="dok1" src="" alt="jalan1">
                                </div>
                                <div class="col-sm-4">
                                    <img id="dok2" src="" alt="jalan2">   
                                </div>
                                <div class="col-sm-4">    
                                    <img id="dok3" src="" alt="jalan3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="modal-footer">
            <button class="btn btn-sm btn-info btnTerima" id="" value=""><i class="fa fa-check-circle"></i> Terima</button>&nbsp;
            <button class="btn btn-sm btn-danger btnTolak" id="" value=""><i class="fa fa-ban"></i> Tolak</button>
        </div> -->
    </div>
  </div>
</div>

</body>
</html>
<script>
    $(document).ready(function() {
        $("#modal_lapdetail").on("click", ".btn-closemodal", function(){
            $('#modal_lapdetail').modal('hide');
        });
    });
</script>