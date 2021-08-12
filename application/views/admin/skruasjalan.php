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
                            <div id="identity" class="row mb-4">
                                <input type="text" name="namask" class="form-control">
                            </div>
                            <div id="identity" class="row mb-4">
                                <h6>Unggah Foto KTP</h6>
                                <div class="dropzone ktp" id="ktp">
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

            
            
            <script>
                var sk_upload= new Dropzone(".sk",{
                    autoProcessQueue: true,
                    url: "<?php echo site_url('upload/skruasjalan') ?>",
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
                    c.append("kodelap", $('#kodelap').val());
                });

            </script>