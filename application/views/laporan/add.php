<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Laporan Add</h3>
            </div>
            <?php echo form_open_multipart('laporan/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="infrastruktur" class="control-label"><span class="text-danger">*</span>Infrastruktur</label>
						<div class="form-group">
							<select name="infrastruktur" class="form-control">
								<option value="">select</option>
								<?php 
								$infrastruktur_values = array(
									'Jalan'=>'Jalan',
									'Drainase'=>'Drainase',
								);

								foreach($infrastruktur_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('infrastruktur')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('infrastruktur');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tgl_laporan" class="control-label">Tgl Laporan</label>
						<div class="form-group">
							<input type="text" name="tgl_laporan" value="<?php echo $this->input->post('tgl_laporan'); ?>" class="has-datepicker form-control" id="tgl_laporan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nama_pelapor" class="control-label"><span class="text-danger">*</span>Nama Pelapor</label>
						<div class="form-group">
							<input type="text" name="nama_pelapor" value="<?php echo $this->input->post('nama_pelapor'); ?>" class="form-control" id="nama_pelapor" />
							<span class="text-danger"><?php echo form_error('nama_pelapor');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="no_ktp" class="control-label"><span class="text-danger">*</span>No Ktp</label>
						<div class="form-group">
							<input type="text" name="no_ktp" value="<?php echo $this->input->post('no_ktp'); ?>" class="form-control" id="no_ktp" />
							<span class="text-danger"><?php echo form_error('no_ktp');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="foto_ktp" class="control-label"><span class="text-danger">*</span>Foto Ktp</label>
						<div class="form-group">
							<input type="text" name="foto_ktp" value="<?php echo $this->input->post('foto_ktp'); ?>" class="form-control" id="foto_ktp" />
							<span class="text-danger"><?php echo form_error('foto_ktp');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="lokasi_namajalan" class="control-label"><span class="text-danger">*</span>Lokasi Namajalan</label>
						<div class="form-group">
							<input type="text" name="lokasi_namajalan" value="<?php echo $this->input->post('lokasi_namajalan'); ?>" class="form-control" id="lokasi_namajalan" />
							<span class="text-danger"><?php echo form_error('lokasi_namajalan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="lokasi_kabkota" class="control-label"><span class="text-danger">*</span>Lokasi Kabkota</label>
						<div class="form-group">
							<input type="text" name="lokasi_kabkota" value="<?php echo $this->input->post('lokasi_kabkota'); ?>" class="form-control" id="lokasi_kabkota" />
							<span class="text-danger"><?php echo form_error('lokasi_kabkota');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="lokasi_distrik" class="control-label"><span class="text-danger">*</span>Lokasi Distrik</label>
						<div class="form-group">
							<input type="text" name="lokasi_distrik" value="<?php echo $this->input->post('lokasi_distrik'); ?>" class="form-control" id="lokasi_distrik" />
							<span class="text-danger"><?php echo form_error('lokasi_distrik');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="lokasi_koordinat" class="control-label"><span class="text-danger">*</span>Lokasi Koordinat</label>
						<div class="form-group">
							<input type="text" name="lokasi_koordinat" value="<?php echo $this->input->post('lokasi_koordinat'); ?>" class="form-control" id="lokasi_koordinat" />
							<span class="text-danger"><?php echo form_error('lokasi_koordinat');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dokumentasi" class="control-label"><span class="text-danger">*</span>Dokumentasi</label>
						<div class="form-group">
							<input type="text" name="dokumentasi" value="<?php echo $this->input->post('dokumentasi'); ?>" class="form-control" id="dokumentasi" />
							<span class="text-danger"><?php echo form_error('dokumentasi');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="alamat" class="control-label"><span class="text-danger">*</span>Alamat</label>
						<div class="form-group">
							<textarea name="alamat" class="form-control" id="alamat"><?php echo $this->input->post('alamat'); ?></textarea>
							<span class="text-danger"><?php echo form_error('alamat');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="pengaduan" class="control-label"><span class="text-danger">*</span>Pengaduan</label>
						<div class="form-group">
							<textarea name="pengaduan" class="form-control" id="pengaduan"><?php echo $this->input->post('pengaduan'); ?></textarea>
							<span class="text-danger"><?php echo form_error('pengaduan');?></span>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>