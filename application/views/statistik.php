<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SI-SIKAT - Beranda</title>
        <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>resources/template/assets/favicon.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

        <!-- Tambahan Link Untuk CSS dari Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        
        <!-- Font Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <!-- <link href="<?php echo base_url('resources/datatables/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet"> -->
        <link href="<?php echo base_url();?>resources/template/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>resources/template/css/css-pengaduan.css" rel="stylesheet" />
        <link href="<?php echo base_url('resources/template/css/statistik.css')?>" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <body id="page-top">
        <!-- Navigasi Topbar-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand" href="#">
                <img src="<?php echo base_url();?>resources/template/assets/logo-sisikat.png" width="30" height="30" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url();?>">Tentang SI-SIKAT</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url('statistik');?>">Statistik</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url('laporan');?>">Lihat Laporan</a></li>
                    </ul>
                    <li class="nav-item"><a class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" href="<?php echo base_url('auth/login');?>">Masuk</a></li>
                    <!-- <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#loginpage">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            <span class="small">Masuk</span>
                        </span>
                    </button> -->
                </div>
            </div>
        </nav>
        <!-- Akhir Navigasi Topbar-->

        <div id="reportstat" class="container">
            <div id="reportA" class="px-5">
                <label for="country" class="col-sm-2 control-label">Grafik Jumlah Laporan Per Kabupaten/Kota</label>
                <div id="percase" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>

            <div id="reportB" class="px-5">
                <label for="country" class="col-sm-2 control-label">Grafik Jumlah Laporan Per 2021</label>
                <div id="monthly" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>


        <!-- Footer -->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">SI-SIKAT &copy; 2021. All Rights Reserved.</div>
                    <a href="#!">Privasi</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Istilah</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a>
                </div>
            </div>
        </footer>
        <!-- Akhir Footer -->
        
        <!-- Tambahan JS dari Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- JS Inti-->
        <script src="<?php echo base_url();?>resources/template/js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        <!-- JS untuk statistik -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        <script>
            Highcharts.setOptions({
                lang: {
                thousandsSep: ' '
            }
            })
            Highcharts.chart('percase', {
                chart: {
                    type: 'bar',
                    zoomType: 'y'
                },
                title: {
                    text: 'Jumlah Laporan/Pengaduan Per Kabupaten/Kota'
                },
                subtitle: {
                    text: 'Source: <a href="https://www.statista.com/statistics/611318/population-of-europe-by-country-and-gender/">statista.com</a>'
                },
                xAxis: {
                    categories: [
                        <?php 
                            foreach ($kabupaten AS $kab) { 
                                echo "'".$kab->nama."',";
                            } 
                        ?> 
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumah Laporan'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Jalan',
                color:"#2d0404",
                    data: [
                        <?php 
                            foreach ($grapkabkota AS $gk1) { 
                                echo $gk1->totaljalan.",";
                            } 
                        ?> 
                    ]

                }, {
                    name: 'Drainase',
                color:"#4e2eeb",
                    data: [
                        <?php 
                            foreach ($grapkabkota AS $gk2) { 
                                echo $gk2->totaldrainase.",";
                            } 
                        ?> 
                    ]

                }]
            });
        </script>

        <script>
            Highcharts.setOptions({
                colors: ['#ef9a9a', '#c5e1a5', '#fff59d', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
            });
            Highcharts.chart('monthly', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Jumlah Laporan/Pengaduan Per Bulan'
                },
                subtitle: {
                    text: 'Source: Wikipedia.org'
                },
                xAxis: {
                    categories: [
                    <?php 
                            foreach ($grapbulan AS $bulan) { 
                                echo "'".$bulan->bulan."',";
                            } 
                        ?> 
                    ],
                    tickmarkPlacement: 'on',
                    title: {
                        enabled: false
                    }
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Laporan'
                    },
                    labels: {
                        formatter: function() {
                            return this.value / 1000;
                        }
                    }
                },
                tooltip: {
                    split: true,
                    valueSuffix: ' Laporan'
                },
                plotOptions: {
                    line: {
                        lineWidth: 5,
                        marker: {
                            enabled: false
                        }
                    }
                },
                series: [{
                    name: 'Jalan',
                    color:"#2d0404",
                    data: [
                        <?php 
                            foreach ($grapbulan AS $gk1) { 
                                echo $gk1->totaljalan.",";
                            } 
                        ?> 
                    ]
                }, {
                    name: 'Drainase',
                    color:"#4e2eeb",
                    data: [
                        <?php 
                            foreach ($grapbulan AS $gk2) { 
                                echo $gk2->totaldrainase.",";
                            } 
                        ?> 
                    ]
               
                }]
            });

        </script>
    </body>
</html>