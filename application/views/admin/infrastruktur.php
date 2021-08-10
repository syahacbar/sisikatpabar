<div class="container-fluid px-4">
    <h2 class="mt-4">Laporan Pengaduan <?php echo $infrastruktur;?></h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Dilaporkan</th>
                        <th>Pengaduan</th>
                        <th>Lokasi</th>
                        <th>Kec./Distrik</th>
                        <th>Kab./Kota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($laporan as $lap) {             
                    ?>
                    
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $lap['tgl_laporan'];?></td>
                        <td><?php echo $lap['pengaduan'];?></td>
                        <td><?php echo $lap['lokasi_namajalan'];?></td>
                        <td><?php echo $lap['lokasidistrik'];?></td>
                        <td><?php echo $lap['lokasikabkota'];?></td>
                        <td>
                            <a
                                id="#modalDetail"
                                data-nik="<?php echo $lap['nik'] ?>"
                                data-ktp="<?php echo $lap['ktp'] ?>"
                                data-nama="<?php echo $lap['nama_pelapor'] ?>"
                                data-alamat="<?php echo $lap['alamat_pelapor']." ".$lap['des_pelapor']." ".$lap['kec_pelapor']." ".$lap['kab_pelapor'] ?>"
                                data-email="<?php echo $lap['email'] ?>"
                                data-nohp="<?php echo $lap['no_hp'] ?>"

                                data-infra="<?php echo $lap['infrastruktur'] ?>"
                                data-latitude="<?php echo "Latitude:" ." " .$lap['latitude'] ?>"
                                data-longitude="<?php echo "Longitude:"." ".$lap['longitude'] ?>"
                                data-ruasjalan="<?php echo $lap['lokasi_namajalan'] ?>"
                                data-lokasi="<?php echo $lap['lokasi_kabkota']." ".$lap['lokasi_distrik'] ?>"
                                data-pengaduan="<?php echo $lap['pengaduan'] ?>"
                                data-dokumentasi1="<?php echo $lap['dokumentasi1'] ?>"
                                data-dokumentasi2="<?php echo $lap['dokumentasi2'] ?>"
                                data-dokumentasi3="<?php echo $lap['dokumentasi3'] ?>"


                                data-bs-target="#modalDetail" data-bs-toggle="modal" class="modalDetail btn btn-info" >
                                <i class="fas fa-external-link-alt"></i>
                            </a>
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
             if(ktp=='')
             {
                img.src = "<?php echo base_url('resources/admintheme/assets/img/noimage.jpg');?>";
             } else {
                img.src = "<?php echo base_url('upload/ktp/');?>"+ktp;
             }
            

            var nama = $(this).data('nama');
            $(".modal-body #namaModal").text( nama );

            var alamat = $(this).data('alamat');
            $(".modal-body #alamatModal").text( alamat );

            var email = $(this).data('email');
            $(".modal-body #emailModal").text( email );

            var hp = $(this).data('nohp');
            $(".modal-body #nohpModal").text( hp );

            // data laporan
            var infra = $(this).data('infra');
            $(".modal-body #infra").text(infra);

            var latitude = $(this).data('latitude');
            var longitude = $(this).data('longitude');
            $(".modal-body #latitude").text(latitude );
            $(".modal-body #longitude").text(longitude );

            var ruasjalan = $(this).data('ruasjalan');
            $(".modal-body #ruasjalan").text(ruasjalan);

            var lokasi = $(this).data('lokasi');
            $(".modal-body #lokasi").text(lokasi);

            var pengaduan= $(this).data('pengaduan');
            $(".modal-body #pengaduan").text(pengaduan);

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

    });
</script>
