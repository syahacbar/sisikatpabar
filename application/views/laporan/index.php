<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Laporan Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('laporan/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Infrastruktur</th>
						<th>Tgl Laporan</th>
						<th>Nama Pelapor</th>
						<th>No Ktp</th>
						<th>Foto Ktp</th>
						<th>Lokasi Namajalan</th>
						<th>Lokasi Kabkota</th>
						<th>Lokasi Distrik</th>
						<th>Lokasi Koordinat</th>
						<th>Dokumentasi</th>
						<th>Alamat</th>
						<th>Pengaduan</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($laporan as $l){ ?>
                    <tr>
						<td><?php echo $l['id']; ?></td>
						<td><?php echo $l['infrastruktur']; ?></td>
						<td><?php echo $l['tgl_laporan']; ?></td>
						<td><?php echo $l['nama_pelapor']; ?></td>
						<td><?php echo $l['no_ktp']; ?></td>
						<td><?php echo $l['foto_ktp']; ?></td>
						<td><?php echo $l['lokasi_namajalan']; ?></td>
						<td><?php echo $l['lokasi_kabkota']; ?></td>
						<td><?php echo $l['lokasi_distrik']; ?></td>
						<td><?php echo $l['lokasi_koordinat']; ?></td>
						<td><?php echo $l['dokumentasi']; ?></td>
						<td><?php echo $l['alamat']; ?></td>
						<td><?php echo $l['pengaduan']; ?></td>
						<td>
                            <a href="<?php echo site_url('laporan/edit/'.$l['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('laporan/remove/'.$l['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
