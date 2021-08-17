<div class="container-fluid px-4">
    <h2 class="mt-4">SK Ruas Jalan</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>

    <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4 unggahfilesk">
                        <div class="card-body">
                            <?php echo form_open_multipart('',array('id'=>'formuploadsk')); ?>
                                <div id="identity" class="row mb-4">
                                    <h6>Unggah File SK Ruas Jalan</h6>
                                    <input id="namask" type="text" name="namask" class="form-control" placeholder="Ketikkan nama file SK di sini">
                                </div>
                                <div id="identity" class="row mb-4">
                                    <h6>Unggah File SK Ruas Jalan</h6>
                                    <div class="dropzone skruasjalan" id="skruasjalan">
                                        <div class="dz-message">
                                            <h3> Klik atau Drop file PDF disini</h3>
                                        </div>
                                    </div>
                                </div>
                                <button id="btnSubmit" name="submit" type="submit" class="btn btn-primary btn-block mb-4">Kirim File</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-body">
                        <table id="datatablesSimple" class="tabelSK">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama SK</th>
                                    <th>Tgl. Diunggah</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($skruasjalan as $sk) { ?>
                                <tr>
                                    
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $sk['namask'];?></td>
                                    <td><?php echo $sk['uploaded_on'];?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
   
                        </div>
                    </div>
                </div>
            </div>
        </div>

           <script>
            Dropzone.autoDiscover = false;
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
                    location.reload();
                });

            </script>