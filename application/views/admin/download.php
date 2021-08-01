<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


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
<div class="input-group date" data-provide="datepicker">
    <input type="text" class="form-control">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>
                                    	
                                    	<input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />

										<script>
										$(function() {
										  $('input[name="daterange"]').daterangepicker({
										    opens: 'left'
										  }, function(start, end, label) {
										    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
										  });
										});
										</script>

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