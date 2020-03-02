<?php 
include_once('../head.php');
$result = mysqli_query($con, "SELECT * FROM record WHERE waktu BETWEEN ADDDATE(CURDATE(), INTERVAL -14 DAY) AND CURDATE() ORDER BY waktu ASC LIMIT 14");
$waktu = array();
$ph = array();
$suhuAir = array();
$garam = array();
while($data = mysqli_fetch_assoc($result)){
    $waktu[] = substr($data['waktu'],8,2) . "-" . substr($data['waktu'],5,2) . "-" . substr($data['waktu'],0,4);
    $ph[] = floatval($data['ph']);
    $suhuAir[] = floatval($data['suhu']);
    $garam[] = floatval($data['tingkatgaram']);
}
?>

<body id="kunjunganpasien">
    <div class="wrapper ">
        <?php include_once('../nav.php');?>
        <div class="panel-header panel-header-sm">
        </div>
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Grafik</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3-md" id = "ph" style = "width: 550px; height: 400px; margin: 0 auto"></div>
                                <div class="col-3-md" id = "suhuAir" style = "width: 550px; height: 400px; margin: 0 auto"></div>
                                <div class="col-3-md" id = "garam" style = "width: 550px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="tabel_grafik_kunjungan99">
                                    <thead class=" text-primary">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">PH Air</th>
                                        <th class="text-center">Suhu Air</th>
                                        <th class="text-center">Kadar Garam Air</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($con, "SELECT * FROM record ORDER BY waktu");
                                        if(mysqli_num_rows($query) > 0 ){
                                            while($data = mysqli_fetch_array($query)) { ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $data['waktu'] ?></td>
                                                <td class="text-center"><?= $data['ph'] ?></td>
                                                <td class="text-center"><?= $data['suhu'] ?></td>
                                                <td class="text-center"><?= $data['tingkatgaram'] ?></td>
                                            </tr>
                                            <?php }
                                        } else {
                                            echo "<tr><td colspan=\"3\" align=\"center\">Data Tidak Ditemukan</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $('#tabel_grafik_kunjungan99').DataTable({
        });
    </script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src = "https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
                        //Chart kunjungan pasien
        Highcharts.chart('ph', {
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'Rata-Rata pH'
            },
            subtitle: {
                text: 'Tahun 2019'
            },
            xAxis: {
                categories: <?=json_encode($waktu);?>,
            },
            yAxis: {
                title: {
                    text: 'pH'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' '
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'pH',
                data: <?= json_encode($ph) ?>
            }]
        });
                        //end of Chart kunjungan pasien 
    </script>

<script type="text/javascript">
                        //Chart kunjungan pasien
        Highcharts.chart('suhuAir', {
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'Rata-Rata Suhu Air'
            },
            subtitle: {
                text: 'Tahun 2019'
            },
            xAxis: {
                categories: <?=json_encode($waktu);?>,
            },
            yAxis: {
                title: {
                    text: 'Suhu Air (\xB0C)'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' \xB0C'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'Suhu Air',
                data: <?= json_encode($suhuAir) ?>
            }]
        });
                        //end of Chart kunjungan pasien 
    </script>

<script type="text/javascript">
                        //Chart kunjungan pasien
        Highcharts.chart('garam', {
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'Rata-Rata Tingkat Garam'
            },
            subtitle: {
                text: 'Tahun 2019'
            },
            xAxis: {
                categories: <?=json_encode($waktu);?>,
            },
            yAxis: {
                title: {
                    text: 'Tingkat Garam'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' '
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'Tingkat Garam',
                data: <?= json_encode($garam) ?>
            }]
        });
                        //end of Chart kunjungan pasien 
    </script>
</body>                