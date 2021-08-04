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

           

            <!-- Filter dan Picker -->
            <div class="row mb-4">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-filter me-1"></i>
                            Filter Data Laporan/Pengaduan Yang Akan Diunduh
                        </div>
                        <div class="card-body">
                            <?php echo form_open('admin/cetak',array('id'=>'formfiltercetak')); ?>
                           <div class="row">
                                <label for="country" class="control-label">Jenis Infrastruktur</label>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="RBInfrastruktur" id="RBInfrastruktur" value="semua" checked>
                                                <label class="form-check-label">Semua Infrastruktur</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="RBInfrastruktur" id="RBInfrastruktur" value="jalan">
                                                <label class="form-check-label">Jalan</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="RBInfrastruktur" id="RBInfrastruktur" value="drainase">
                                                <label class="form-check-label">Drainase</label>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label for="country" class="control-label">Kabupaten/Kota</label>
                                <div class="col">
                                    <select class="form-control" name="kabupaten" id="kabupaten">
                                        <option value="semua">- Semua Kabupaten/Kota -</option>
                                        <?php 
                                            foreach($kabupaten as $kab)
                                            {
                                                echo '<option value="'.$kab->kode.'">'.$kab->nama.'</option>';
                                            }
                                        ?> 
                                    </select>
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <label class="control-label" for="datetimepick">Rentang Waktu</label>
                                <div class='col'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1'>
                                        <input type="date" name="startdate" id="datetimepick">
                                        </div>
                                    </div>
                                </div>
                                <div class='col'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                        <input type="date" name="todate" id="datetimepick">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="input-group">
                                    <button class="btn btn-sm btn-primary" type="submit">Download</button>
                                </div>
                            </div>
                        
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!--
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card mb-4">
                        <div class="card-header preview">
                            <div class="left">
                                <i class="fas fa-eye me-1"></i>
                                Pratinjau Laporan
                            </div>
                            <div class="right">
                                <div class="btn-group dropstart">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bars"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fas fa-file-pdf"></i> Save As PDF</a></li>
                                    <li><a href="#"><i class="fas fa-file-word"></i> Save As Word</a></li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            -->
            </div>
        </div>

