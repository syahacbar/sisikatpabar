
        <link href="<?php echo base_url('resources/template/css/statistik.css')?>" rel="stylesheet">
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