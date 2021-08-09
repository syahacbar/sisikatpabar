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
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($laporan as $lap) { ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $lap['tgl_laporan'];?></td>
                        <td><?php echo $lap['pengaduan'];?></td>
                        <td><?php echo $lap['lokasi_namajalan'];?></td>
                        <td><?php echo $lap['lokasidistrik'];?></td>
                        <td><?php echo $lap['lokasikabkota'];?></td>
                        <td>
                            <a href="" class="btn btn-warning">Menunggu</a>
                            <a href="" class="btn btn-success">Diterima</a>
                            <a href="" class="btn btn-danger">Ditolak</a>
                        </td>

                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
                                <i class="fas fa-external-link-alt"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>