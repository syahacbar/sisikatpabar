<div id="admin" class="container-fluid px-4">
    <h2 class="mt-4">Data Pelaporan SI-SIKAT <?php echo $infrastruktur;?></h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li> 
    </ol>
    <div class="card mb-4">
        <div class="card-header">
        <form id="filter" name="filter" method="post" action="">
            <div class="row">
                <div class="col-md-2">
                    <select class="form-control" name="lokasi_distrik" id="lokasi_distrik">
                        <option value="" <?php echo ($kodekec=='') ? 'selected' : '';?>>- Semua Kecamatan/Distrik -</option>
                        <?php foreach($form_kec as $kec) { ?>
                            <option value="<?php echo $kec->kode;?>" <?php echo ($kodekec==$kec->kode) ? 'selected' : '';?>><?php echo $kec->nama;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="status" id="status">
                        <option value="" <?php echo ($status=='') ? 'selected' : '';?>>- Semua Status -</option>
                        <option value="0" <?php echo ($status=='0') ? 'selected' : '';?>>Menunggu</option>
                        <option value="1" <?php echo ($status=='1') ? 'selected' : '';?>>Diterima</option>
                        <option value="2" <?php echo ($status=='2') ? 'selected' : '';?>>Ditolak</option>
                    </select>
                </div>
                <div class="col">
                    <input name="btnFilter" type="submit" id="btn-filter" class="btn btn-primary" value="Filter">
                </div>
            </div>
        </form>
        </div>
        <div class="card-body">
                    
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Laporan</th>
                        <th>Tanggal Dilaporkan</th>
                        <th>Pengaduan</th>
                        <th>Lokasi</th>
                        <th>Kec./Distrik</th>
                        <th>Kab./Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($laporan as $lap) { ?>
                    
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $lap['kodelap'];?></td>
                        <td><?php echo $lap['tgl_laporan'];?></td>
                        <td><?php echo $lap['pengaduan'];?></td>
                        <td><?php echo $lap['lokasi_namajalan'];?></td>
                        <td><?php echo $lap['lokasidistrik'];?></td>
                        <td><?php echo $lap['lokasikabkota'];?></td>
                        <td><?php if ($lap['status']=='1') { echo 'Diterima';} elseif ($lap['status']=='2') { echo 'Ditolak'; } else { echo 'Menunggu'; } ?></td>
                        <td>
                            <a
                                id="#modalDetail"
                                data-nik="<?php echo $lap['nik'] ?>"
                                data-ktp="<?php echo $lap['ktp'] ?>"
                                data-nama="<?php echo $lap['nama_pelapor'] ?>"
                                data-alamatpelapor="<?php echo $lap['alamat_pelapor'] ?>"
                                data-despelapor="<?php echo $lap['despelapor'] ?>"
                                data-kecpelapor="<?php echo $lap['kecpelapor']?>"
                                data-kabpelapor="<?php echo ucwords(strtolower($lap['kabpelapor']))?>"
                                data-email="<?php echo $lap['email'] ?>"
                                data-nohp="<?php echo $lap['no_hp'] ?>"

                                data-infra="<?php echo $lap['infrastruktur'] ?>"
                                data-latitude="<?php echo $lap['latitude'] ?>"
                                data-longitude="<?php echo $lap['longitude'] ?>"
                                data-ruasjalan="<?php echo $lap['lokasi_namajalan'] ?>"
                                data-lokasikabkota="<?php echo $lap['lokasikabkota']?>"
                                data-lokasidistrik="<?php echo $lap['lokasidistrik']?>"
                                data-pengaduan="<?php echo $lap['pengaduan'] ?>"
                                data-dokumentasi1="<?php echo $lap['dokumentasi1'] ?>"
                                data-dokumentasi2="<?php echo $lap['dokumentasi2'] ?>"
                                data-dokumentasi3="<?php echo $lap['dokumentasi3'] ?>"
                                data-kodelap="<?php echo $lap['kodelap'] ?>"

                                data-bs-target="#modalDetail" data-bs-toggle="modal" class="modalDetail btn btn-primary" >
                                <i class="fas fa-external-link-alt"></i> Detail
                            </a>
                            <a id="ATerima" data-id="<?php echo $lap['kodelap'];?>" class="btn btn-info"><i class="fas fa-check"></i> Terima</a>
                            
                            <a id="tolaklaporan" class="btn btn-danger <?php echo ($lap['status']=='2') ? 'disabled' : ''; ?>"><i class="fas fa-ban"></i> Tolak</a>

                            <button id="<?php echo $lap['kodelap'];?>" value="<?php echo $lap['id'];?>" class="btn btn-info btnTerima  <?php echo ($lap['status']=='1') ? 'disabled' : ''; ?>" >Terima</button>

                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#modalDetail").click(function(){
            $("#modalDetail").modal('show');
        });
        $('#closeBtn').click(function() {
            $('#modalDetail').modal('hide');
        });
        $(document).on("click", ".modalDetail", function () {
            // identitas pelapor
             var nik = $(this).data('nik');
             $(".modal-body #nikModal").text(nik);

             var ktp = $(this).data('ktp');
             const img = document.getElementById("imgModal");
            img.src = "<?php echo base_url('upload/ktp/');?>"+ktp;

            var nama = $(this).data('nama');
            $(".modal-body #namaModal").text( nama );

            var alamatpelapor = $(this).data('alamatpelapor');
            var despelapor = $(this).data('despelapor');
            var kecpelapor = $(this).data('kecpelapor');
            var kabpelapor = $(this).data('kabpelapor');
            $(".modal-body #alamatModal").html(alamatpelapor+"<br>"+despelapor+"<br>"+kecpelapor+"<br>"+kabpelapor);

            var email = $(this).data('email');
            $(".modal-body #emailModal").text( email );

            var hp = $(this).data('nohp');
            $(".modal-body #nohpModal").text( hp );

            // data laporan
            var infra = $(this).data('infra');
            $(".modal-body #infra").text(infra);

            var latitude = $(this).data('latitude');
            var longitude = $(this).data('longitude');
            $(".modal-body #koordinat").html(latitude+", "+longitude);
            

            var ruasjalan = $(this).data('ruasjalan');
            $(".modal-body #ruasjalan").text(ruasjalan);

            var lokasikabkota = $(this).data('lokasikabkota');
            $(".modal-body #lokasikabkota").html(lokasikabkota);

            var lokasidistrik = $(this).data('lokasidistrik');
            $(".modal-body #lokasidistrik").html(lokasidistrik);

            var pengaduan= $(this).data('pengaduan');
            $(".modal-body #pengaduan").text(pengaduan);

            var kodelap= $(this).data('kodelap');
            $(".modal-body #kodelap").text(kodelap);

            var dokumentasi1 = $(this).data('dokumentasi1');
            var dokumentasi2 = $(this).data('dokumentasi2');
            var dokumentasi3 = $(this).data('dokumentasi3');
             const img1 = document.getElementById("dok1");
             const img2 = document.getElementById("dok2");
             const img3 = document.getElementById("dok3");
            img1.src = "<?php echo base_url('upload/dokumentasi/');?>"+dokumentasi1;
            img2.src = "<?php echo base_url('upload/dokumentasi/');?>"+dokumentasi2;
            img3.src = "<?php echo base_url('upload/dokumentasi/');?>"+dokumentasi3;
        });

        // $("#ATerima a").click(function(e) {
        //     e.preventDefault();
        //     var status = '1';
        //     var idlap = $('#ATerima').attr("data-id");
            // $.ajax({
            //     type: "POST",
            //     url: '<?php //echo site_url() ?>adminkab/proseslaporan/'+idlap,
            //     data: {status:status,idlap:idlap},
            //     success:function(data)
            //     {
            //         alert('SUCCESS!!'+idlap);
            //     },
            //     error:function()
            //     {
            //         alert('FAILED');
            //     }
            // });

        // });
        $(".btnTerima").click(function() {
            var idlap = $(this).val();
            var status = 1;
            var kodelap = $(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: '<?php echo site_url() ?>adminkab/proseslaporan/'+idlap,
                    data: {status:status,idlap:idlap},
                    success:function(data)
                    {
                        alert('Sukses Merubah Status Laporan : '+kodelap);
                        location.reload();
                    },
                    error:function()
                    {
                        alert('FAILED');
                    }
                });


        });
    });
</script>
