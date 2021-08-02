<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


					<div class="container-fluid px-4">
                        <h2 class="mt-4">Download Laporan</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-filter me-1"></i>
                                        Filter Data Laporan/Pengaduan Yang Akan Diunduh
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                                  <label class="control-label">Rentang Waktu</label>
                                        	<div class='col'>
                                              <div class="form-group">
                                                  <div class='input-group date' id='datetimepicker1'>
                                                     <input type='text' class="form-control" />
                                                     <span class="input-group-addon">
                                                     <span class="glyphicon glyphicon-calendar"></span>
                                                     </span>
                                                  </div>
                                               </div>
                                           </div>
                                           <div class='col'>
                                              <div class="form-group">
                                                 <div class='input-group date' id='datetimepicker2'>
                                                    <input type='text' class="form-control" />
                                                    <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                 </div>
                                              </div>
                                           </div>
                                       </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-eye me-1"></i>
                                        Pratinjau Laporan
                                    </div>
                                    <div class="card-body"><canvas id="laporanbulanan" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>

<script>
  $(function () {
    $('#datetimepicker1').datetimepicker();

    $('#datetimepicker2').datetimepicker();
 });
</script>