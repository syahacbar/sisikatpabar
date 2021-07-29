        <!-- Halaman Laporan Pengaduan -->
        <link href="<?php echo base_url('resources/datatables/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('resources/template/css/laporan.css')?>" rel="stylesheet">

        

        <!-- TABEL LAPORAN -->
        <div class="laporan">
        <h2 class="display-4 text-center lh-1 mb-4 ">Laporan Pengaduan</h2>
        </div>

        <!-- Email dan Nomor HP-->
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <label for="country" class="col-sm-2 control-label">Jenis Infrastruktur</label>
                    <div class="col-sm-12">
                        <?php echo $form_infrastruktur; ?>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <label for="country" class="col-sm-2 control-label">Kabupaten/Kota</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="lokasi_kabkota" id="lokasi_kabkota">
                            <option value="0">- Semua Kabupaten/Kota -</option>
                            <?php 
                                foreach($form_kab as $kab)
                                {
                                    echo '<option value="'.$kab->kode.'">'.$kab->nama.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <label for="country" class="col-sm-2 control-label">Kecamatan/Distrik</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="lokasi_distrik" id="lokasi_distrik">
                            <option value="0">- Semua Kecamatan/Distrik -</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <label for="LastName" class="filter col-sm-2 control-label">Pilih</label>
                    <div class="col-sm-12">
                        <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Email -->

        <div class="table-responsive" >
            <div class="container">
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width:2%">No.</th>
                        <th style="width:35%">Dokumentasi</th>
                        <th style="width:33%">Isi Laporan/Pengaduan</th>
                        <th style="width:15%">Lokasi<br>Kec/Distrik<br>Kab/Kota</th>
                        <th style="width:10%">Tanggal Dilaporkan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        </div>

        
         
       <script type="text/javascript">
 
            var table;
             
            $(document).ready(function() {
             
                //datatables
                table = $('#table').DataTable({ 
             
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.
             
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": "<?php echo site_url('laporan/ajax_list')?>",
                        "type": "POST",
                        "data": function ( data ) {
                            data.infrastruktur = $('#infrastruktur').val();
                            data.lokasi_kabkota = $('#lokasi_kabkota').val();
                            data.lokasi_distrik = $('#lokasi_distrik').val();
                        }
                    },
             
                    //Set column definition initialisation properties.
                    "columnDefs": [
                    { 
                        "width": 10,
                        "targets": [ 0 ], //first column / numbering column
                        "orderable": false, //set not orderable
                    },
                    {   "targets": [ 1 ], //first column / numbering column
                        "orderable": false, //set not orderable
                    },
                    ],
                    fixedColumns: true,
             
                });
             
                $('#btn-filter').click(function(){ //button filter event click
                    table.ajax.reload();  //just reload table
                });

                $("#lokasi_kabkota").change(function (){
                    var url = "<?php echo site_url('laporan/add_ajax_kec');?>/"+$(this).val();
                    $('#lokasi_distrik').load(url);
                    return false;
                });

                
             
            });
             
            </script>