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

<div id="admin" class="container-fluid px-4">
    <div class="row"><br></div>
    <div class="card mb-4">
        <div class="card-header">
            <h3 >Data Pelaporan SI-SIKAT <?php echo $infrastruktur;?></h3>
        </div>
        <div class="card-body">     
            <div class="table-responsive">
                <div class="panel-heading">
                    <select id="filterStatus" name="filterStatus" aria-controls="filterStatus" class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="">- Semua Status -</option>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Disetujui">Disetujui</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>
                <div class="panel-body">
                    
                </div>
                <table class="table table-striped table-bordered table-hover" id="tableInfrastruktur">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Dilaporkan</th>
                            <th>Kode Laporan</th>
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
            "order": [],
            "ajax": {
                //panggil method ajax list dengan ajax
                "url": '<?php echo site_url('adminkab/infrastruktur_list');?>',
                "type": "POST",
                "data": function(data){
                   data.selectStatus = $('#filterStatus').val();
                }
            },
            
        });

        $('#filterStatus').change(function(){
          tableInfrastruktur.draw();
       });

        $("#tableInfrastruktur").on("click", ".btnTerima", function(){
        //$(".btnTerima").click(function() {
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
                        alert('Gagal Merubah Status Laporan : '+kodelap);
                    }
                });
        });
        
        $("#tableInfrastruktur").on("click", ".btnTolak", function(){
        //$(".btnTolak").click(function() {
            var idlap = $(this).val();
            var status = 2;
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
                        alert('Gagal Merubah Status Laporan : '+kodelap);
                    }
                });
        });
    } );

    
</script>