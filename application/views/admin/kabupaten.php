<!-- <style>
svg.svg-inline--fa.fa-external-link-alt.fa-w-16 {
    color: #fff;
}

.btn-info {
    color: #000;
    background-color: #17a2b8;
    border: 0;
}
</style> -->

<div class="container-fluid px-4">
    <h2 class="mt-4">Laporan Pengaduan <?php echo ucwords(strtolower($kabkota));?></h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="card mb-4">
       
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th width="10">No.</th>
                        <th>Tanggal Dilaporkan</th>
                        <th>Infrastruktur</th>
                        <th>Pengaduan</th>
                        <th>Lokasi</th>
                        <th>Kec./Distrik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($laporan as $lap) { ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $lap['tgl_laporan'];?></td>
                        <td><?php echo $lap['infrastruktur'];?></td>
                        <td><?php echo $lap['pengaduan'];?></td>
                        <td><?php echo $lap['lokasidistrik'];?></td>
                        <td><?php echo $lap['lokasikabkota'];?></td>
                        <td>
                            <a href="" class="btn btn-info">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Dilaporkan</th>
                        <th>Lokasi</th>
                        <th>Kec./Distrik</th>
                        <th>Kab./Kota</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>