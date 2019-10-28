<?php //include_once('../head.php');?>
<body id="kunjungan">
    <div class="wrapper ">
        <?php// include_once('../nav.php');?>
        <div class="panel-header panel-header-sm">
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PH Air</h4>
                            <p class="category"> PH Air per minggu</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post">
                                        <table>
                                        <tr>
                                                <td>
                                                    <div class="form-group">Tahun</div>
                                                </td>
                                                <td class="text-center" width="25%">
                                                    <div class="form-group">:</div>
                                                </td>
                                                <td align="right">
                                                    <div class="form-group">
                                                        <select name="tahun" class="form-control" required>
                                                            <?php
                                                            $tahun = mysqli_query($con, "SELECT DISTINCT YEAR(waktuperiksa) AS tahun FROM rekammedis WHERE YEAR(waktuperiksa) IS NOT NULL ORDER BY tahun") or die (mysqli_error($con));
                                                            if(mysqli_num_rows($tahun) > 0 ){
                                                            while($year = mysqli_fetch_array($tahun)) { ?>
                                                                <option value="<?=$year['tahun']?>"><?=$year['tahun']?></option>
                                                            <?php }
                                                            } else {
                                                                echo "<option> Tidak Ada Data Tahun </option>";
                                                            }
                                                            ?>
                                                            ?>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        <tr>
                                                <td>
                                                    <div class="form-group">Bulan</div>
                                                </td>
                                                <td class="text-center" width="25%">
                                                    <div class="form-group">:</div>
                                                </td>
                                                <td align="right">
                                                    <div class="form-group">
                                                        <select name="tahun" class="form-control" required>
                                                            <option value="1">Januari</option>
                                                            <option value="2">Februari</option>
                                                            <option value="3">Maret</option>
                                                            <option value="4">April</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">Minggu</div>
                                                </td>
                                                <td class="text-center" width="25%">
                                                    <div class="form-group">:</div>
                                                </td>
                                                <td align="right">
                                                    <div class="form-group">
                                                        <select name="tahun" class="form-control" required>
                                                            <option value="1">Minggu Ke-1</option>
                                                            <option value="2">Minggu Ke-2</option>
                                                            <option value="3">Minggu Ke-3</option>
                                                            <option value="4">Minggu Ke-4</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group" style="padding-left: 7%">
                                                        <button class="btn btn-sm btn-default" type="submit" name="filter">Filter
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <!-- proses filter -->
                                <?php
                                use Carbon\Carbon;
                                if(isset($_POST['filter'])){
                                    $thn = trim(mysqli_real_escape_string($con,$_POST['tahun']));?>
                                <?php
                                } else if (!isset($_POST['filter'])){
                                    $thn = Carbon::now()->year;
                                }
                                ?>
                                <!-- End of proses filter -->
                                <div class="col-md-6">
                                    <div class="form-group" align="right">
                                        <iframe src="print_kunjungan.php?thn=<?=$thn?>" style="display:none;" name="frame"></iframe>
                                        <input class="btn btn-success" type="button" onclick="frames['frame'].print()" value="Cetak">
                                    </div>
                                </div>
                            </div>
                            <?php
                            if(isset($_POST['filter'])){ ?>
                            <div class="alert alert-info" style="background-color: #2BAAA1">
                                <center>
                                    <span>
                                        Data PH Air Minggu Ke-<b><?=$thn?></b></span>
                                </center>
                            </div>
                            <?php }?>
                            <div id="grafik_kunjungan"></div>
                            <div class="card-header">
                                <h4 class="card-title"> Data PH Air </h4>
                                <p class="category"> Minggu Ke- <?=$thn?></p>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="tabel_grafik_kunjungan">
                                    <thead class=" text-primary">
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>PH Air</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        $query_kunjungan = "SELECT MONTHNAME(waktuperiksa) as bulan, COUNT(idrekammedis) as jumlah FROM rekammedis where YEAR(waktuperiksa) = '$thn' AND status = 'SDb' GROUP BY MONTHNAME(waktuperiksa) ORDER BY FIELD(bulan,'January','February','March','April','May','June','July','August','September','October','November','December')";
                                        $sql_obat = mysqli_query($con, $query_kunjungan) or die (mysqli_error($con));
                                        if(mysqli_num_rows($sql_obat) > 0 ){
                                            while($data = mysqli_fetch_array($sql_obat)) { ?>
                                                <tr>
                                                    <td><?=$no++?></td>
                                                    <?php
                                                    setlocale(LC_ALL, 'IND');
                                                    $bulan = strftime('%B', strtotime($data['bulan']));
                                                    ?>
                                                    <td><?=$bulan?></td>
                                                    <td><?=$data['jumlah']?></td>
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
        
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Suhu Air</h4>
                            <p class="category"> Suhu Air per Minggu</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post">
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="form-group">Tahun</div>
                                                </td>
                                                <td class="text-center" width="25%">
                                                    <div class="form-group">:</div>
                                                </td>
                                                <td align="right">
                                                    <div class="form-group">
                                                        <select name="tahun" class="form-control" required>
                                                            <?php
                                                            $tahun = mysqli_query($con, "SELECT DISTINCT YEAR(waktuperiksa) AS tahun FROM rekammedis WHERE YEAR(waktuperiksa) IS NOT NULL ORDER BY tahun") or die (mysqli_error($con));
                                                            if(mysqli_num_rows($tahun) > 0 ){
                                                            while($year = mysqli_fetch_array($tahun)) { ?>
                                                                <option value="<?=$year['tahun']?>"><?=$year['tahun']?></option>
                                                            <?php }
                                                            } else {
                                                                echo "<option> Tidak Ada Data Tahun </option>";
                                                            }
                                                            ?>
                                                            ?>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group" style="padding-left: 7%">
                                                        <button class="btn btn-sm btn-default" type="submit" name="filter">Filter
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <!-- proses filter -->
                                <?php
                                if(isset($_POST['filter'])){
                                    $thn = trim(mysqli_real_escape_string($con,$_POST['tahun']));?>
                                <?php
                                } else if (!isset($_POST['filter'])){
                                    $thn = Carbon::now()->year;
                                }
                                ?>
                                <!-- End of proses filter -->
                                <div class="col-md-6">
                                    <div class="form-group" align="right">
                                        <iframe src="print_kunjungan.php?thn=<?=$thn?>" style="display:none;" name="frame"></iframe>
                                        <input class="btn btn-success" type="button" onclick="frames['frame'].print()" value="Cetak">
                                    </div>
                                </div>
                            </div>
                            <?php
                            if(isset($_POST['filter'])){ ?>
                            <div class="alert alert-info" style="background-color: #2BAAA1">
                                <center>
                                    <span>
                                        Data Suhu Air Minggu Ke- <b><?=$thn?></b></span>
                                </center>
                            </div>
                            <?php }?>
                            <div id="grafik_kunjungan1"></div>
                            <div class="card-header">
                                <h4 class="card-title"> Data Suhu Air </h4>
                                <p class="category"> Minggu Ke- <?=$thn?></p>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="tabel_grafik_kunjungan">
                                    <thead class=" text-primary">
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Jumlah Pasien</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        $query_kunjungan = "SELECT MONTHNAME(waktuperiksa) as bulan, COUNT(idrekammedis) as jumlah FROM rekammedis where YEAR(waktuperiksa) = '$thn' AND status = 'SDb' GROUP BY MONTHNAME(waktuperiksa) ORDER BY FIELD(bulan,'January','February','March','April','May','June','July','August','September','October','November','December')";
                                        $sql_obat = mysqli_query($con, $query_kunjungan) or die (mysqli_error($con));
                                        if(mysqli_num_rows($sql_obat) > 0 ){
                                            while($data = mysqli_fetch_array($sql_obat)) { ?>
                                                <tr>
                                                    <td><?=$no++?></td>
                                                    <?php
                                                    setlocale(LC_ALL, 'IND');
                                                    $bulan = strftime('%B', strtotime($data['bulan']));
                                                    ?>
                                                    <td><?=$bulan?></td>
                                                    <td><?=$data['jumlah']?></td>
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
        
            <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tingkat Garam</h4>
                            <p class="category"> Tingkat Garam Per Minggu</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post">
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="form-group">Tahun</div>
                                                </td>
                                                <td class="text-center" width="25%">
                                                    <div class="form-group">:</div>
                                                </td>
                                                <td align="right">
                                                    <div class="form-group">
                                                        <select name="tahun" class="form-control" required>
                                                            <?php
                                                            $tahun = mysqli_query($con, "SELECT DISTINCT YEAR(waktuperiksa) AS tahun FROM rekammedis WHERE YEAR(waktuperiksa) IS NOT NULL ORDER BY tahun") or die (mysqli_error($con));
                                                            if(mysqli_num_rows($tahun) > 0 ){
                                                            while($year = mysqli_fetch_array($tahun)) { ?>
                                                                <option value="<?=$year['tahun']?>"><?=$year['tahun']?></option>
                                                            <?php }
                                                            } else {
                                                                echo "<option> Tidak Ada Data Tahun </option>";
                                                            }
                                                            ?>
                                                            ?>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group" style="padding-left: 7%">
                                                        <button class="btn btn-sm btn-default" type="submit" name="filter">Filter
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <!-- proses filter -->
                                <?php
                                if(isset($_POST['filter'])){
                                    $thn = trim(mysqli_real_escape_string($con,$_POST['tahun']));?>
                                <?php
                                } else if (!isset($_POST['filter'])){
                                    $thn = Carbon::now()->year;
                                }
                                ?>
                                <!-- End of proses filter -->
                                <div class="col-md-6">
                                    <div class="form-group" align="right">
                                        <iframe src="print_kunjungan.php?thn=<?=$thn?>" style="display:none;" name="frame"></iframe>
                                        <input class="btn btn-success" type="button" onclick="frames['frame'].print()" value="Cetak">
                                    </div>
                                </div>
                            </div>
                            <?php
                            if(isset($_POST['filter'])){ ?>
                            <div class="alert alert-info" style="background-color: #2BAAA1">
                                <center>
                                    <span>
                                        Data Tingkat Garam Ke- <b><?=$thn?></b></span>
                                </center>
                            </div>
                            <?php }?>
                            <div id="grafik_kunjungan2"></div>
                            <div class="card-header">
                                <h4 class="card-title"> Data Tingkat Garam </h4>
                                <p class="category"> Minggu Ke- <?=$thn?></p>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="tabel_grafik_kunjungan">
                                    <thead class=" text-primary">
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Tingkat Garam</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        $query_kunjungan = "SELECT MONTHNAME(waktuperiksa) as bulan, COUNT(idrekammedis) as jumlah FROM rekammedis where YEAR(waktuperiksa) = '$thn' AND status = 'SDb' GROUP BY MONTHNAME(waktuperiksa) ORDER BY FIELD(bulan,'January','February','March','April','May','June','July','August','September','October','November','December')";
                                        $sql_obat = mysqli_query($con, $query_kunjungan) or die (mysqli_error($con));
                                        if(mysqli_num_rows($sql_obat) > 0 ){
                                            while($data = mysqli_fetch_array($sql_obat)) { ?>
                                                <tr>
                                                    <td><?=$no++?></td>
                                                    <?php
                                                    setlocale(LC_ALL, 'IND');
                                                    $bulan = strftime('%B', strtotime($data['bulan']));
                                                    ?>
                                                    <td><?=$bulan?></td>
                                                    <td><?=$data['jumlah']?></td>
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
                    <?php
                    $query = "SELECT MONTHNAME(waktuperiksa) as bulan, COUNT(idrekammedis) as jumlah FROM rekammedis where YEAR(waktuperiksa) = '$thn' AND status = 'SDb' GROUP BY MONTHNAME(waktuperiksa) ORDER BY FIELD(bulan,'January','February','March','April','May','June','July','August','September','October','November','December')";

                    $query_nama = "SELECT MONTHNAME(waktuperiksa) as bulan FROM rekammedis";
                    $query_stok = "SELECT COUNT(idrekammedis) as jumlah FROM rekammedis where YEAR(waktuperiksa) = '$thn'";

                    $nama_bulan = mysqli_query($con, $query_nama) or die (mysqli_error($con));
                    $jumlah_kunjungan = mysqli_query($con, $query_stok) or die (mysqli_error($con));
                    $kunjungan = mysqli_query($con, $query) or die (mysqli_error($con));
                    
                    $nama_bulan = array();
                    $jumlah_kunjungan = array();
                        while($data = mysqli_fetch_array($kunjungan)){
                            $nama_bulan[] = strftime('%B', strtotime($data['bulan']));
                            $jumlah_kunjungan[] = intval($data['jumlah']);
                        }
                    ?>
                    <script src="<?=base_url('assets/highcharts/highcharts.js')?>"></script>
                    <script src="<?=base_url('assets/highcharts/data.js')?>"></script>
                    <script type="text/javascript">
                        //Chart kunjungan pasien
                        Highcharts.chart('grafik_kunjungan', {
                            chart: {
                                type: 'areaspline'
                            },
                                title: {
                                    text: 'PH Air'
                                },
                                subtitle: {
                                    text: 'Tahun <?=$thn?>'
                                },
                                legend: {
                                    // layout: 'vertical',
                                    // align: 'left',
                                    // verticalAlign: 'top',
                                    // x: 150,
                                    // y: 100,
                                    // floating: true,
                                    // borderWidth: 1,
                                    // backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                                },
                                xAxis: {
                                    categories: <?=json_encode($nama_bulan);?>,
                                },
                                yAxis: {
                                    title: {
                                        text: 'Jumlah Pasien'
                                    }
                                },
                                tooltip: {
                                    shared: true,
                                    valueSuffix: ' pasien'
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
                                    name: 'Jumlah Pasien',
                                    data: <?=json_encode($jumlah_kunjungan);?>
                                }]
                        });
                        //end of Chart kunjungan pasien 
                    </script>

                    <script type="text/javascript">
                        //Chart kunjungan pasien
                        Highcharts.chart('grafik_kunjungan1', {
                            chart: {
                                type: 'areaspline'
                            },
                                title: {
                                    text: 'Suhu Air'
                                },
                                subtitle: {
                                    text: 'Tahun <?=$thn?>'
                                },
                                legend: {
                                    // layout: 'vertical',
                                    // align: 'left',
                                    // verticalAlign: 'top',
                                    // x: 150,
                                    // y: 100,
                                    // floating: true,
                                    // borderWidth: 1,
                                    // backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                                },
                                xAxis: {
                                    categories: <?=json_encode($nama_bulan);?>,
                                },
                                yAxis: {
                                    title: {
                                        text: 'Jumlah Pasien'
                                    }
                                },
                                tooltip: {
                                    shared: true,
                                    valueSuffix: ' pasien'
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
                                    name: 'Jumlah Pasien',
                                    data: <?=json_encode($jumlah_kunjungan);?>
                                }]
                        });
                        //end of Chart kunjungan pasien 
                    </script>

                    <script type="text/javascript">
                        //Chart kunjungan pasien
                        Highcharts.chart('grafik_kunjungan2', {
                            chart: {
                                type: 'areaspline'
                            },
                                title: {
                                    text: 'Tingkat Garam'
                                },
                                subtitle: {
                                    text: 'Tahun <?=$thn?>'
                                },
                                legend: {
                                    // layout: 'vertical',
                                    // align: 'left',
                                    // verticalAlign: 'top',
                                    // x: 150,
                                    // y: 100,
                                    // floating: true,
                                    // borderWidth: 1,
                                    // backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                                },
                                xAxis: {
                                    categories: <?=json_encode($nama_bulan);?>,
                                },
                                yAxis: {
                                    title: {
                                        text: 'Jumlah Pasien'
                                    }
                                },
                                tooltip: {
                                    shared: true,
                                    valueSuffix: ' pasien'
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
                                    name: 'Jumlah Pasien',
                                    data: <?=json_encode($jumlah_kunjungan);?>
                                }]
                        });
                        //end of Chart kunjungan pasien 
                    </script>

                    <script type="text/javascript">
                        //Chart kunjungan pasien
                        Highcharts.chart('grafik_kunjungan2', {
                            chart: {
                                type: 'areaspline'
                            },
                                title: {
                                    text: 'Tingkat Garam'
                                },
                                subtitle: {
                                    text: 'Tahun <?=$thn?>'
                                },
                                legend: {
                                    // layout: 'vertical',
                                    // align: 'left',
                                    // verticalAlign: 'top',
                                    // x: 150,
                                    // y: 100,
                                    // floating: true,
                                    // borderWidth: 1,
                                    // backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                                },
                                xAxis: {
                                    categories: <?=json_encode($nama_bulan);?>,
                                },
                                yAxis: {
                                    title: {
                                        text: 'Jumlah Pasien'
                                    }
                                },
                                tooltip: {
                                    shared: true,
                                    valueSuffix: ' pasien'
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
                                    name: 'Jumlah Pasien',
                                    data: <?=json_encode($jumlah_kunjungan);?>
                                }]
                        });
                        //end of Chart kunjungan pasien 
                    </script>