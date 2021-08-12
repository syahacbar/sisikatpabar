<div class="container-fluid px-4">
                        <h2 class="mt-4">Dashboard Admin <?php echo $kabupaten;?></h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>

                        <div class="col-xl-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                <i class="fas fa-bars"></i>
                                    Status Laporan Bulanan
                                </div>
                                <div class="row lapmasuk">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <h1><?php echo $countlapall;?></h1>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">Total Laporan Masuk</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <h1><?php echo $countlapmenunggu;?></h1>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">Laporan Menunggu Verifikasi</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <h1><?php echo $countlapsetuju;?></h1>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">Laporan Disetujui</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-danger text-white mb-4">
                                        <h1><?php echo $countlaptolak;?></h1>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">Laporan Ditolak</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Statistik Laporan Harian
                                    </div>
                                    <div class="card-body"><canvas id="laporanharian" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Statistik Laporan Bulanan
                                    </div>
                                    <div class="card-body"><canvas id="laporanbulanan" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Update Terkini Data Pelaporan SI-SIKAT <?php echo $kabupaten;?>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped tabeldashboardAdmin">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal Dilaporkan</th>
                                            <th>Kode Laporan</th>
                                            <th>Infrastruktur</th>
                                            <th>Pengaduan</th>
                                            <th>Lokasi</th>
                                            <th>Kec./Distrik</th>
                                            <th>Pelapor</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach ($updatelaporan as $res) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $res['tgl_laporan'];?></td>
                                            <td><?php echo $res['kodelap'];?></td>
                                            <td><?php echo $res['infrastruktur'];?></td>
                                            <td><?php echo $res['pengaduan'];?></td>
                                            <td><?php echo $res['lokasi_namajalan'];?></td>
                                            <td><?php echo $res['lokasidistrik'];?></td>
                                            <td><?php echo $res['nama_pelapor']."<br>".$res['nik'];?></td>
                                            <td><?php switch ($res['status']) {  case 0: echo "Menunggu"; break; case 1: echo "Diterima"; break; case 2: echo "Ditolak"; break; } ?></td>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("laporanharian");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [<?php foreach ($lapharian as $lap) { echo "'".$lap->tanggal."',"; }?>],
    datasets: [{
      label: "Jumlah Laporan/Pengaduan",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [<?php foreach ($lapharian as $val) { echo "'".$val->total."',"; }?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?php echo ($maxmingguan->total)<5 ? 5 : $maxmingguan->total;?>,
          maxTicksLimit: 10
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
</script>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("laporanbulanan");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php foreach ($lapbulanan as $lap) { echo "'".$lap->bulan."',"; }?>],
    datasets: [{
      label: "Jumlah Laporan/Pengaduan",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [<?php foreach ($lapbulanan as $val) { echo "'".$val->total."',"; }?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 10
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 10
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

</script>