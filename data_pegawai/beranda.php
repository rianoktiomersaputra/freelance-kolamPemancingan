<?php include_once('../head.php') ?>

<body id="data_pegawai">
    
    <div class="wrapper">
        
    <?php include_once('../nav.php');
    ?>
            <div class="panel-header panel-header-sm" style="background-image:url('../assets/img/background1.jpg'); opacity: 0.9">
            </div>
            <div class="content" style="background-image: url('../assets/img/background1.jpg'); background-size: 1100px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="opacity: 0.9">
                            <div class="card-header">
                                <h4 class="card-title">Data Admin</h4>
                                <div class="col-sm-2">
                                    <a href="tambah.php" class="btn btn-success btn-round btn-sm"><i class="now-ui-icons ui-1_simple-add"></i> Tambah Data</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="tabel_pegawai">
                                        <thead style="color:#2BAAA1">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">Password</th>
                                            <th class="text-center">Aksi</th>
                                        </thead>
                                        <tbody> 
                                            <?php
                                            $no = 1;
                                            $sql = mysqli_query($con, "SELECT * FROM user") or die (mysqli_error($con));
                                            if(mysqli_num_rows($sql) > 0) { 
                                                while($data = mysqli_fetch_array($sql)) { ?>
                                                <tr>
                                                    <td class="text-center"><?=$no++?></td>
                                                    <td><?=$data['username']?></td>
                                                    <td><?=$data['password']?></td>

                                                    <!--  -->
                                                    
                                                    <td class="text-center">
                                                            <a href="ubah.php?id=<?=$data['id']?>" class="btn btn-warning btn-round btn-icon btn-icon-mini btn-neutral"><i class="now-ui-icons design-2_ruler-pencil"></i></a>
                                                
                                                        <a href="hapus.php?id=<?=$data['id']?>" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" onclick="return confirm('Yakin akan menghapus data?')"><i class="now-ui-icons ui-1_simple-remove"></i></a>
                                                    </td>
                                                </tr>
                                                <?php 
                                                }
                                            } else {
                                                echo "<tr><td colspan=\"9\" align=\"center\">Data Tidak Ditemukan</td></tr>";
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
    <div> </div>