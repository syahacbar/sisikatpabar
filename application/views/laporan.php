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
        <!-- <link href="<?php echo base_url('resources/datatables/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet"> -->
        <link href="<?php echo base_url();?>resources/template/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>resources/template/css/css-pengaduan.css" rel="stylesheet" />
           
        <!-- Halaman Laporan Pengaduan -->
        <link href="<?php echo base_url('resources/datatables/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('resources/template/css/laporan.css')?>" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <style type="text/css">
            table.dataTable tbody td {
              vertical-align: top;
            }
        </style>

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

        <!-- TABEL LAPORAN -->
        <div class="laporan">
        <h2 class="display-4 text-center lh-1 mb-4 ">Laporan Pengaduan</h2>
        </div>

        <!-- Email dan Nomor HP-->
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <label for="country" class="col-sm-2 control-label">Jenis Infrastruktur</label>
                    <div class="col-sm-12">
                        <?php echo $form_infrastruktur; ?>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <label for="country" class="col-sm-2 control-label">Kabupaten/Kota</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="lokasi_kabkota" id="lokasi_kabkota">
                            <option value="0">- Semua Kabupaten/Kota -</option>
                            <?php 
                                foreach($form_kab as $kab)
                                {
                                    echo '<option value="'.$kab->kode.'">'.$kab->nama.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <label for="country" class="col-sm-2 control-label">Kecamatan/Distrik</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="lokasi_distrik" id="lokasi_distrik">
                            <option value="0">- Semua Kecamatan/Distrik -</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <label for="LastName" class="filter col-sm-2 control-label">Pilih</label>
                    <div class="col-sm-12">
                        <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Email -->

        <div class="table-responsive" >
            <div class="container">
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width:5%">No.</th>
                        <th style="width:35%">Dokumentasi</th>
                        <th style="width:30%">Isi Laporan/Pengaduan</th>
                        <th style="width:15%">Lokasi<br>Kec/Distrik<br>Kab/Kota</th>
                        <th style="width:10%">Tanggal Dilaporkan</th>
                        <th style="width:5%">Detail</th>
                    </tr>
                </thead>
                <tbody>
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

        <!-- Modal Detail Laporan Terakhir-->
        <div class="modal fade" id="report-detail" tabindex="-1" role="dialog" aria-labelledby="report-detailTitle" aria-hidden="true">
            <div id="newreport" class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="modal-header">
                        <h5 class="modal-title" id="report-detailTitle"><span id="lokasi_namajalan"></span></h5>
                    </div>
                    <div class="modal-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://1.bp.blogspot.com/-EzByB5vQIps/WYnxel_SovI/AAAAAAAAAQM/wAjNlJcJYR8No8RmLDYItcNXzLtx67mjgCLcBGAs/s1600/tips%2Bberkendara%2Bdi%2Bjalanan%2Brusak.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://1.bp.blogspot.com/-EzByB5vQIps/WYnxel_SovI/AAAAAAAAAQM/wAjNlJcJYR8No8RmLDYItcNXzLtx67mjgCLcBGAs/s1600/tips%2Bberkendara%2Bdi%2Bjalanan%2Brusak.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://1.bp.blogspot.com/-EzByB5vQIps/WYnxel_SovI/AAAAAAAAAQM/wAjNlJcJYR8No8RmLDYItcNXzLtx67mjgCLcBGAs/s1600/tips%2Bberkendara%2Bdi%2Bjalanan%2Brusak.jpg" class="d-block w-100" alt="...">
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
                            <p class="card-text"><span id="pengaduan"></span></p>
                            <p class="card-text"><small class="text-muted">Lokasi Ruas Jalan: </small><span id="lokasi_namajalan"></span></p>
                            <p class="card-text"><small class="text-muted">Koordinat Lokasi: </small><span id="lokasi_koordinat"></span></p>
                            <p class="card-text"><small class="text-muted">Kecamatan/Distrik: </small><span id="lokasi_distrik"></span></p>
                            <p class="card-text"><small class="text-muted">Kabupaten/Kota: </small><span id="lokasi_kabkota"></span></p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Detail Laporan Terakhir-->
        
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
         
        <script src="<?php echo base_url('resources/datatables/jquery/jquery-2.2.3.min.js')?>"></script>
        <script src="<?php echo base_url('resources/datatables/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('resources/datatables/datatables/js/jquery.dataTables.min.js')?>"></script>
        <script src="<?php echo base_url('resources/datatables/datatables/js/dataTables.bootstrap.min.js')?>"></script>
        <script type="text/javascript">
 
            var table;
             
            $(document).ready(function() {
             
                //datatables
                table = $('#table').DataTable({ 
             
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.
             
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": "<?php echo site_url('laporan/ajax_list')?>",
                        "type": "POST",
                        "data": function ( data ) {
                            data.infrastruktur = $('#infrastruktur').val();
                            data.lokasi_kabkota = $('#lokasi_kabkota').val();
                            data.lokasi_distrik = $('#lokasi_distrik').val();
                        }
                    },
             
                    //Set column definition initialisation properties.
                    "columnDefs": [
                    { 
                        "width": 10,
                        "targets": [ 0 ], //first column / numbering column
                        "orderable": false, //set not orderable
                    },
                    {   "targets": [ 1 ], //first column / numbering column
                        "orderable": false, //set not orderable
                    },
                    {   "targets": [ 5 ], //first column / numbering column
                        "orderable": false, //set not orderable
                        "className": 'dt-body-right',
                    },
                    ],
                    fixedColumns: true,
             
                });
             
                $('#btn-filter').click(function(){ //button filter event click
                    table.ajax.reload();  //just reload table
                });

                $("#lokasi_kabkota").change(function (){
                    var url = "<?php echo site_url('laporan/add_ajax_kec');?>/"+$(this).val();
                    $('#lokasi_distrik').load(url);
                    return false;
                });

                $('#report-detail').on('show.bs.modal', function(e) {

                    //get data-id attribute of the clicked element
                    var lokasi_namajalan = $(e.relatedTarget).data('lokasi_namajalan');
                    var lokasi_kabkota = $(e.relatedTarget).data('lokasi_kabkota');
                    var lokasi_distrik = $(e.relatedTarget).data('lokasi_distrik');
                    var lokasi_koordinat = $(e.relatedTarget).data('lokasi_koordinat');
                    var pengaduan = $(e.relatedTarget).data('pengaduan');

                    //populate the textbox
                    $(e.currentTarget).find('span[id="lokasi_namajalan"]').text(lokasi_namajalan);
                    $(e.currentTarget).find('span[id="lokasi_kabkota"]').text(lokasi_kabkota);
                    $(e.currentTarget).find('span[id="lokasi_distrik"]').text(lokasi_distrik);
                    $(e.currentTarget).find('span[id="lokasi_koordinat"]').text(lokasi_koordinat);
                    $(e.currentTarget).find('span[id="pengaduan"]').text(pengaduan);
                });
             
            });
             
            </script>
    </body>
</html>
