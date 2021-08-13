<div class="container-fluid px-4">
    <h2 class="mt-4">Dashboard Admin Provinsi</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>

    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-bars"></i>
                Laporan Bulanan
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Statistik Laporan Harian
                        </div>
                        <div class="card-body"><canvas id="laporanharian" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Statistik Laporan Bulanan
                        </div>
                        <div class="card-body"><canvas id="laporanbulanan" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
        </div>

        <main>
            <div id="skruasjalan" class="container-fluid px-4">
                <h2 class="mt-4">SK Ruas Jalan</h2>
                <div class="card mb-4">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"></li>
                    </ol>

                    <div class="row mb-4">
                        <div id="content">
                        <?php echo form_open_multipart('',array('id'=>'formuploadsk')); ?>
                            <div id="identity" class="row mb-4">
                                <input id="namask" type="text" name="namask" class="form-control">
                            </div>
                            <div id="identity" class="row mb-4">
                                <h6>Unggah File SK Ruas Jalan</h6>
                                <div class="dropzone skruasjalan" id="skruasjalan">
                                    <div class="dz-message">
                                        <h3> Klik atau Drop file PDF disini</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- <button type="button" id="submit_dropzone_form">UPLOAD</button> -->
                                <button id="btnSubmit" name="submit" type="submit" class="btn btn-primary btn-block mb-4">Kirim File</button>
                            <!-- Tombol Kirim -->
                            <?php echo form_close(); ?>
                        </div>
                    </div> 
                </div>
            </main>

            
            
            <script>
                var sk_upload= new Dropzone(".skruasjalan",{
                    autoProcessQueue: false,
                    url: "<?php echo site_url('admin/uploadsk') ?>",
                    maxFilesize: 50,
                    maxFiles: 1,
                    method:"post",
                    acceptedFiles:"application/pdf",
                    paramName:"fileskruasjalan",
                    dictInvalidFileType:"Type file ini tidak dizinkan",
                    addRemoveLinks:true,
                });
                
                sk_upload.on("sending",function(a,b,c){
                    a.token=Math.random();
                    c.append("token_skruasjalan",a.token);
                    c.append("namask",$('#namask').val());
                });

                $('#formuploadsk').submit(function(e) {
                    e.preventDefault();
                    sk_upload.processQueue();
                });

            </script>