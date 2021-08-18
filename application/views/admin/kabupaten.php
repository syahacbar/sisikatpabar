<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Fontawesome 5.15.3-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<!-- Custom CSS -->
<link href="<?php echo base_url();?>resources/admintheme/css/file-tabel.css" rel="stylesheet" />

<div id="admin" class="container-fluid px-4">
    <div class="row"><br></div>
    <div class="card mb-4">
        <div class="card-header">
            <h3 >Data Pelaporan SI-SIKAT <?php echo ucwords(strtolower($kabkota));?></h3>
        </div>
        <div class="card-body">     
            <div class="table-responsive">
                <div class="row">
                    <div class="col-md-2">
                        <div class="panel-heading">
                            <select id="filterStatus" name="filterStatus" aria-controls="filterStatus" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="">- Semua Status -</option>
                                <option value="Menunggu">Menunggu</option>
                                <option value="Diterima">Diterima</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                </div>
                <table class="table table-striped table-bordered table-hover tabelinfraAdmin" id="tableInfrastruktur">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Dilaporkan</th>
                            <th>Kode Laporan</th>
                            <th>Infrastruktur</th>
                            <th>Pengaduan</th>
                            <th>Lokasi</th>
                            <th>Kec./Distrik</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>  
        </div>
    </div>  
</div>  




<script>
    $(document).ready(function() {
       var tableInfrastruktur = $('#tableInfrastruktur').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
        },
        "processing": true,
        "serverSide": true,
        "stateSave": true,
        "order": [],
        "ajax": {
                //panggil method ajax list dengan ajax
                "url": '<?php echo site_url('admin/infrastrukturkab_list');?>',
                "type": "POST",
                "data": function(data){
                 data.selectStatus = $('#filterStatus').val();
                 data.selectKab = '<?php echo $kodekab;?>';
             }
         },

     });

       $('#filterStatus').change(function(){
          tableInfrastruktur.draw();
       });


       $("#tableInfrastruktur").on("click", ".btnTerima", function(){
            var idlap = $(this).val();
            var status = 'Diterima';
            var kodelap = $(this).attr('id');
            
            //kodelap.classList.add("disabled");
            $.ajax({
                type: "POST",
                url: '<?php echo site_url() ?>admin/proseslaporan/'+idlap,
                data: {status:status,idlap:idlap},
                success:function(data)
                {
                    alert('Anda Menerima Laporan : '+kodelap);
                    tableInfrastruktur.draw(false);
                },
                error:function()
                {
                    alert('Gagal Merubah Status Laporan : '+kodelap);
                }
            });
        });

       $("#tableInfrastruktur").on("click", ".btnTolak", function(){
            var idlap = $(this).val();
            var status = 'Ditolak';
            var kodelap = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: '<?php echo site_url() ?>admin/proseslaporan/'+idlap,
                data: {status:status,idlap:idlap},
                success:function(data)
                {
                    alert('Anda Menolak Laporan : '+kodelap);
                    tableInfrastruktur.draw(false);
                },
                error:function()
                {
                    alert('Gagal Merubah Status Laporan : '+kodelap);
                }
            });
        });

       $("#tableInfrastruktur").on("click", ".view_lapdetail", function(){
            var idlap = $(this).data('idlap');
            $.ajax({
                  url : "<?php echo base_url(); ?>admin/detail_laporan",
                  data:{idlap : idlap},
                  method:'GET',
                  dataType:'json',
                  success:function(response) {
                    $(".modal-content #idlap").text(response.kodelap); 
                    $(".modal-content #nikModal").text(response.nik);
                    $(".modal-content #namaModal").text(response.nama_pelapor);
                    $(".modal-content #alamatModal").html(response.alamat_pelapor+"<br>"+response.despelapor+"<br>"+response.kecpelapor+"<br>"+response.kabpelapor);
                    $(".modal-content #nohpModal").text(response.no_hp);
                    $(".modal-content #emailModal").text(response.email);
                    $(".modal-content #imgktp").attr("src","<?php echo base_url('upload/ktp/');?>"+response.ktp);
                    $(".modal-content #dok1").attr("src","<?php echo base_url('upload/dokumentasi/');?>"+response.dokumentasi1);
                    $(".modal-content #dok2").attr("src","<?php echo base_url('upload/dokumentasi/');?>"+response.dokumentasi2);
                    $(".modal-content #dok3").attr("src","<?php echo base_url('upload/dokumentasi/');?>"+response.dokumentasi3);
                    $(".modal-content #infra").text(response.infrastruktur);
                    $(".modal-content #koordinat").html(response.latitude+", "+response.longitude);
                    $(".modal-content #ruasjalan").text(response.lokasi_namajalan);
                    $(".modal-content #lokasikabkota").html(response.lokasinamakab);
                    $(".modal-content #lokasidistrik").html(response.lokasinamadistrik);
                    $(".modal-content #pengaduan").text(response.pengaduan);
                    $(".modal-footer .btnTerima").attr("id",response.kodelap);
                    $(".modal-footer .btnTerima").attr("value",idlap);
                    $(".modal-footer .btnTolak").attr("id",response.kodelap);
                    $(".modal-footer .btnTolak").attr("value",idlap);


                    $("#modal_lapdetail").modal({backdrop: 'static', keyboard: true, show: true});
                }
            });      
        });
       $("#modal_lapdetail").on("click", ".btn-closemodal", function(){
            $('#modal_lapdetail').modal('hide');
        });
});
    
</script>