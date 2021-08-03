<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">

<!-- Custom Date-Time Picker -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url();?>resources/admintheme/css/download.css">



        <div class="container-fluid px-4">
            <h2 class="mt-4">Download Laporan</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>

            <!-- Pilih Jenis Infrastruktur dan kabkota -->
                <div class="row mb-4">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="country" class="col-sm-2 control-label">Jenis Infrastruktur</label>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">Jalan</label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">Drainase</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="country" class="col-sm-2 control-label">Kabupaten/Kota</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="lokasi_kabkota" id="lokasi_kabkota">
                                <option value="0">- Semua Kabupaten/Kota -</option>
                                <!-- <?php 
                                    foreach($form_kab as $kab)
                                    {
                                        echo '<option value="'.$kab->kode.'">'.$kab->nama.'</option>';
                                    }
                                ?> -->
                            </select>
                        </div>
                    </div>
                </div>
            <!-- Akhir Pilih Jenis Infrastruktur dan kabkota -->


            <!-- Filter dan Picker -->
            <div class="row mb-4">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-filter me-1"></i>
                            Filter Data Laporan/Pengaduan Yang Akan Diunduh
                        </div>
                        <div class="card-body">
                            <div class="row">
                                        <label class="control-label" for="datetimepick">Rentang Waktu</label>
                                <div class='col'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1'>
                                        <input type="date" name="datetimepick" id="datetimepick">
                                            <!-- <input type='text' class="form-control" /> -->
                                            <!-- <span class="input-group-addon"> -->
                                            <!-- <span class="glyphicon glyphicon-calendar"></span> -->
                                            <!-- </span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class='col'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                        <input type="date" name="datetimepick" id="datetimepick">
                                        <!-- <input type='text' class="form-control" /> -->
                                        <!-- <span class="input-group-addon"> -->
                                        <!-- <span class="glyphicon glyphicon-calendar"></span> -->
                                        <!-- </span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card mb-4">
                        <div class="card-header preview">
                            <div class="left">
                                <i class="fas fa-eye me-1"></i>
                                Pratinjau Laporan
                            </div>
                            <div class="right">
                                <!-- Default dropstart button -->
                                <div class="btn-group dropstart">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bars"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Download PDF</a></li>
                                    <li><a href="#">Download JPG</a></li>
                                    <li><a href="#">Cetak</a></li>
                                    <li><a href="#">Lihat Full Screen</a></li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"><canvas id="laporanbulanan" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
            <!-- Filter dan Picker -->
        </div>

<!-- <script>
  $(function () {
    $('#datetimepicker1').datetimepicker();

    $('#datetimepicker2').datetimepicker();
 });
</script> -->


