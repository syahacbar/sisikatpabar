<?php echo $map['js']; ?>
<!-- Header Web -->
<header id="header" class="masthead">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <!-- Header - Bagian tulisan SISIKAT dan tagline-->
            <div class="col-lg-9">
                <div class="mb-5 mb-lg-0 text-center text-lg-start">
                    <h1 class="display-1 lh-1 mb-3">SI-SIKAT</h1>
                    <p class="lead fw-normal text-muted mb-5" style="font-size:16px">
                        Adalah akronim dari Sistem Partisipasi Masyarakat.<br>
                        Tujuan utama dari sistem ini adalah untuk meningkatan kinerja Bidang Bina Marga Dinas PUPR Provinsi Papua Barat dalam melakukan penyiapan bahan dan perumusan konsep kebijakan teknis yang berkenaan dengan kebinamargaan khususnya dalam perencanaan infrastruktur jalan.
                    </p>
                    <p class="lead fw-normal text-muted mb-5" style="font-size:16px">
                        Laporan langsung dari masyarakat melalui media ini diharapkan dapat menjadi masukan terhadap perkembangan infrastruktur jalan di Provinsi Papua Barat.
                    <p class="lead fw-normal text-muted mb-5" style="font-size:16px">
                        Selanjutnya data Laporan Pengaduan yang telah diterima nantinya akan diverifikasi kembali oleh Bidang Bina Marga OPD Dinas PUPR Provinsi Papua Barat sebelum dirumuskan menjadi konsep kebijakan teknis dalam perencanaan infrastruktur jalan di Provinsi Papua Barat.
                    </p>
                    <div class="d-flex flex-column flex-lg-row align-items-center">
                        <!-- <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." />Lapor Sekarang</a>
                                <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a> -->
                        <a class="me-lg-3 mb-4 mb-lg-0" href="#formulir">Lapor Sekarang</a>
                        <!-- <a class="me-lg-3 mb-4 mb-lg-0" href="#!" >Alur</a> -->
                    </div>
                </div>
            </div>
            <!-- Header - Akhir Bagian tulisan SISIKAT dan tagline-->

            <!-- Header - Gambar Mockup HP -->
            <div class="col-lg-3">
                <div class="masthead-device-mockup">
                    <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                <stop class="gradient-start-color" offset="0%"></stop>
                                <stop class="gradient-end-color" offset="100%"></stop>
                            </linearGradient>
                        </defs>
                        <circle cx="50" cy="50" r="50"></circle>
                    </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
                        <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect>
                    </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="50"></circle>
                    </svg>
                    <div class="device-wrapper">
                        <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                            <div class="screen bg-black">
                                <img src="<?php echo base_url(); ?>resources/template/assets/img/form.jpg" style="max-width: 100%; height: 100%" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header - Gambar Mockup HP -->
        </div>
    </div>
</header>
<!-- Header Web -->

<!-- Statistik Laporan -->
<section id="statistik">
    <h2 class="display-4 text-center lh-1 mb-4 ">Jumlah Laporan Sekarang</h2>
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-12 order-lg-1 mb-5 mb-lg-0">
                <div class="container-fluid px-5">
                    <div id="jalandrainase" class="row gx-10">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="employees">
                                <p class="counter-count"><?php echo $jum_lap_jalan; ?></p>
                                <p class="employee-p">Pengaduan Masalah Jalan</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="customer">
                                <p class="counter-count"><?php echo $jum_lap_drainase; ?></p>
                                <p class="employee-p">Pengaduan Masalah Drainase</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="more-btn col-lg-12 order-lg-1 mb-5 mb-lg-0">
                    <a href="<?php echo base_url('statistik'); ?>" class="btn btn-outline-primary">Statistik Selengkapnya</a>
                </div>
            </div>
        </div>
</section>
<!-- Statistik Laporan -->

<!-- Formulir Pengaduan -->
<section id="formlapor">
    <div id="formulir" class="container">
        <div class="container px-5">
            <h2 class="display-4 text-center lh-1 mb-4">Form Laporan Pengaduan</h2>
            <div class="row gx-5 align-items-center">
                <h3>Identitas Pelapor</h3>
                <p>Lengkapi data identitas anda sesuai KTP.</p>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php echo form_open_multipart('lapor/add', array('id' => 'formlaporan')); ?>


                    <!-- NIK dan Nama -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <!-- <div id="only-number" class="form-outline">
                                            <input id="nik" id="number" name="nik" type="text" class="form-control" placeholder="Ketik NIK Anda" required/>
                                      </div> -->

                            <div class="form-group form-outline only-number">
                                <input type="text" name="nik" class="form-control number" placeholder="Ketik NIK Anda" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-outline">
                                <input name="nama_pelapor" type="text" class="form-control" placeholder="Ketik Nama Anda" required />
                            </div>
                        </div>
                    </div>
                    <!-- Akhir NIK dan Nama -->


                    <div id="alamatuser" class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <textarea name="alamat_pelapor" class="form-control" rows="6" placeholder="Ketik alamat Anda dengan format: Nama Jalan, No. Rumah/Blok, Nama Kompleks, RT/RW" required></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-outline">
                                    <select name="kab_pelapor" id="kab_pelapor" required>
                                        <option value=""><i class="fas fa-chevron-down"></i>- Pilih Kabupaten/Kota -</option>
                                        <?php
                                        foreach ($kabupaten as $kab) {
                                            echo '<option value="' . $kab->kode . '">' . $kab->nama . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-outline">
                                        <select name="kec_pelapor" id="kec_pelapor" required>
                                            <option value="">- Pilih Kecamatan/Distrik -</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <select name="des_pelapor" id="des_pelapor" required>
                                        <option value=""><i class="fas fa-chevron-down"></i>- Pilih Kelurahan/Desa -</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Email dan Nomor HP-->
                    <div class="row mb-4">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-outline">
                                <input name="email" type="email" class="form-control" placeholder="Ketik Alamat Email Anda" required />
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group form-outline only-number">
                                <input type="text" name="no_hp" class="form-control number" placeholder="Ketik Nomor WhatsApp Anda" required>
                            </div>
                        </div>
                    </div>
                    <!-- Email -->

                    <!-- Unggah KTP -->
                    <div id="identity" class="row mb-4">
                        <h6>Unggah Foto KTP</h6>
                        <div class="dropzone ktp" id="ktp">
                            <div class="dz-message">
                                <h3> Klik atau Drop gambar disini</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Jenis Infrastruktur-->
                    <div class="report">
                        <h3>Data Laporan</h3>
                        <p>Isi formulir laporan pengaduan tentang infrastruktur dibawah ini.</p>
                    </div>

                    <!-- Maps -->
                    <div id="maps" class="row mb-4">
                        <div class="col">
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <p>Tandai lokasi yang dilaporkan dengan menggeser penanda merah pada peta berikut ini.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="form-outline">
                                <?php echo $map['html']; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Maps -->


                    <!-- Latitude & Longitude -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input name="latitude" type="text" id="latitude" class="form-control" placeholder="Latitude" value="<?php echo set_value('latitude'); ?>" readonly required />
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-outline">
                                <input name="longitude" type="text" id="longitude" class="form-control" placeholder="Longitude" value="<?php echo set_value('longitude'); ?>" readonly required />
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Latitude & Longitude -->

                    <div id="jenisinfra" class="row mb-4">
                        <label class="form-label">Pilih Jenis Infrastruktur</label>
                        <div class="col-md-6">
                            <div class="form-check" name="infrastruktur">
                                <input class="form-check-input" value="jalan" type="radio" name="infrastruktur" id="flexRadioDefault1" required>
                                <label class="form-check-label" value="Jalan" for="flexRadioDefault1">Jalan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" value="jalan" type="radio" name="infrastruktur" id="flexRadioDefault2" required>
                                <label class="form-check-label" value="Drainase" for="flexRadioDefault2">Drainase</label>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Jenis Infrastruktur-->

                    <!-- Ruas Jalan -->
                    <div id="ruasnamajalan" class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <textarea name="lokasi_namajalan" type="text" class="form-control" rows="4" placeholder="Ketik ruas nama jalan di sini" required></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-outline">
                                    <select name="lokasi_kabkota" id="lokasi_kabkota" required>
                                        <option value="">- Pilih Kabupaten/Kota -</option>
                                        <?php
                                        foreach ($kabupaten as $kab) {
                                            echo '<option value="' . $kab->kode . '">' . $kab->nama . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-outline">
                                        <select name="lokasi_distrik" id="lokasi_distrik" required>
                                            <option value="">- Pilih Kecamatan/Distrik -</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Akhir Ruas Jalan -->

                    <!-- Isi Laporan -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <textarea name="pengaduan" class="form-control" rows="4" placeholder="Jelaskan laporan Anda di sini" required></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Isi Laporan -->


                    <!-- Doc. Laporan -->
                    <div class="row mb-4">
                        <h6>Unggah Bukti Laporan</h6>
                        <p>Sesuaikan gambar yang diunggah dengan instruksi. Klik ikon tanda tanya untuk melihat instruksi.</p>
                        <div id="foto1" class="col">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBantuan">
                                <i class="bi bi-question-octagon-fill"></i>
                            </button>
                            <div class="dropzone dokumentasi dokumentasi1" id="dokumentasi">
                                <div class="dz-message">
                                    <p>Foto Pertama</p>
                                </div>
                            </div>
                        </div>

                        <div id="foto2" class="col">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBantuan1">
                                <i class="bi bi-question-octagon-fill"></i>
                            </button>
                            <div class="dropzone dokumentasi dokumentasi2" id="dokumentasi">
                                <div class="dz-message">
                                    <p>Foto Kedua</p>
                                </div>
                            </div>
                        </div>

                        <div id="fotoselfi" class="col">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBantuan2">
                                <i class="bi bi-question-octagon-fill"></i>
                            </button>
                            <div class="dropzone dokumentasi dokumentasi3" id="dokumentasi">
                                <div class="dz-message">
                                    <p>Foto Selfi</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kebijakan Privasi -->
                    <div id="policy" class="form-check d-flex justify-content-center mb-4">
                        <label class="form-check-label">Dengan ini, saya menyatakan bahwa informasi yang saya berikan adalah benar dan dapat dipertanggungjawabkan.</label>
                    </div>
                    <!-- Akhir Kebijakan Privasi -->

                    <div class="row mb-4">
                        <center><?php echo $recaptcha; ?></center>
                    </div>

                    <input type="hidden" id="kodelap" name="kodelap" value="<?php echo $kodelap; ?>">
                    <!-- Tombol Kirim -->
                    <button id="btnSubmit" name="submit" type="submit" class="btn btn-primary btn-block mb-4">Kirim Laporan</button>
                    <!-- Tombol Kirim -->
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div id="loader"></div>
        </div>
    </div>
    </div>
</section>
<!-- Akhir Formulir pengaduan -->




<script>
    function setMapToForm(latitude, longitude) {
        $('input[name="latitude"]').val(latitude);
        $('input[name="longitude"]').val(longitude);
    }

    Dropzone.autoDiscover = false;
    var spinner = $('#loader');
    $(document).ready(function() {


        $("#lokasi_kabkota").change(function() {
            var url = "<?php echo site_url('lapor/add_ajax_kec'); ?>/" + $(this).val();
            $('#lokasi_distrik').load(url);
            return false;
        });
        $("#kab_pelapor").change(function() {
            var url = "<?php echo site_url('lapor/add_ajax_kec'); ?>/" + $(this).val();
            $('#kec_pelapor').load(url);
            return false;
        });
        $("#kec_pelapor").change(function() {
            var url = "<?php echo site_url('lapor/add_ajax_des'); ?>/" + $(this).val();
            $('#des_pelapor').load(url);
            return false;
        });


        var ktp_upload = new Dropzone(".ktp", {
            autoProcessQueue: true,
            url: "<?php echo site_url('lapor/uploadktp') ?>",
            maxFilesize: 50,
            maxFiles: 1,
            method: "post",
            acceptedFiles: "image/*",
            paramName: "filektp",
            dictInvalidFileType: "Type file ini tidak dizinkan",
            addRemoveLinks: true,
        });

        ktp_upload.on("sending", function(a, b, c) {
            a.token = Math.random();
            c.append("token_foto", a.token); //Menmpersiapkan token untuk masing masing foto
            c.append("kodelap", $('#kodelap').val());
        });

        var dokumentasi1_upload = new Dropzone(".dokumentasi1", {
            autoProcessQueue: true,
            url: "<?php echo site_url('lapor/uploaddokumentasi1') ?>",
            maxFilesize: 50,
            maxFiles: 1,
            method: "post",
            acceptedFiles: "image/*",
            paramName: "filedokumentasi1",
            dictInvalidFileType: "Type file ini tidak dizinkan",
            addRemoveLinks: true,
        });

        dokumentasi1_upload.on("sending", function(a, b, c) {
            a.token = Math.random();
            c.append("token_dokumentasi", a.token); //Menmpersiapkan token untuk masing masing foto
            c.append("kodelap", $('#kodelap').val());
            c.append("kategori", "dokumentasi1");
        });
        var dokumentasi2_upload = new Dropzone(".dokumentasi2", {
            autoProcessQueue: true,
            url: "<?php echo site_url('lapor/uploaddokumentasi2') ?>",
            maxFilesize: 50,
            maxFiles: 1,
            method: "post",
            acceptedFiles: "image/*",
            paramName: "filedokumentasi2",
            dictInvalidFileType: "Type file ini tidak dizinkan",
            addRemoveLinks: true,
        });

        dokumentasi2_upload.on("sending", function(a, b, c) {
            a.token = Math.random();
            c.append("token_dokumentasi", a.token); //Menmpersiapkan token untuk masing masing foto
            c.append("kodelap", $('#kodelap').val());
            c.append("kategori", "dokumentasi2");
        });
        var dokumentasi3_upload = new Dropzone(".dokumentasi3", {
            autoProcessQueue: true,
            url: "<?php echo site_url('lapor/uploaddokumentasi3') ?>",
            maxFilesize: 50,
            maxFiles: 1,
            method: "post",
            acceptedFiles: "image/*",
            paramName: "filedokumentasi3",
            dictInvalidFileType: "Type file ini tidak dizinkan",
            addRemoveLinks: true,
        });

        dokumentasi3_upload.on("sending", function(a, b, c) {
            a.token = Math.random();
            c.append("token_dokumentasi", a.token); //Menmpersiapkan token untuk masing masing foto
            c.append("kodelap", $('#kodelap').val());
            c.append("kategori", "dokumentasi3");
        });

        $('#formlaporan').submit(function(e) {
            e.preventDefault();
            spinner.show();
            //ktp_upload.processQueue();
            //dokumentasi1_upload.processQueue();
            //dokumentasi2_upload.processQueue();
            //dokumentasi3_upload.processQueue();

            document.getElementById("btnSubmit").classList.add('disabled');


            var nik = $("input[name='nik']").val();
            var nama_pelapor = $("input[name='nama_pelapor']").val();
            var alamat_pelapor = $("textarea[name='alamat_pelapor']").val();
            var kab_pelapor = $("select[name='kab_pelapor']").val();
            var kec_pelapor = $("select[name='kec_pelapor']").val();
            var des_pelapor = $("select[name='des_pelapor']").val();
            var email = $("input[name='email']").val();
            var no_hp = $("input[name='no_hp']").val();
            var infrastruktur = $("input[name='infrastruktur']").val();
            var latitude = $("input[name='latitude']").val();
            var longitude = $("input[name='longitude']").val();
            var lokasi_namajalan = $("textarea[name='lokasi_namajalan']").val();
            var lokasi_kabkota = $("select[name='lokasi_kabkota']").val();
            var lokasi_distrik = $("select[name='lokasi_distrik']").val();
            var pengaduan = $("textarea[name='pengaduan']").val();
            var kodelap = $("input[name='kodelap']").val();


            $.ajax({
                url: "<?php echo site_url('lapor/add') ?>",
                type: "POST",
                data: {
                    nik: nik,
                    nama_pelapor: nama_pelapor,
                    kab_pelapor: kab_pelapor,
                    kec_pelapor: kec_pelapor,
                    des_pelapor: des_pelapor,
                    alamat_pelapor: alamat_pelapor,
                    email: email,
                    no_hp: no_hp,
                    infrastruktur: infrastruktur,
                    latitude: latitude,
                    longitude: longitude,
                    lokasi_namajalan: lokasi_namajalan,
                    lokasi_kabkota: lokasi_kabkota,
                    lokasi_distrik: lokasi_distrik,
                    pengaduan: pengaduan,
                    kodelap: kodelap,
                    'g-recaptcha-response': grecaptcha.getResponse()
                },
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    alert("Laporan Berhasil Terkirim");
                    spinner.hide();
                    location.reload();
                }
            });

        });


    });
</script>

<script>
    $(function() {
        $('.only-number').on('keydown', '.number', function(e) {
            -1 !== $
                .inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/
                .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) ||
                35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) &&
                (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
        });
    })
</script>