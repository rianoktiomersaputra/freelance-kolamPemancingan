<?php require_once('../head.php'); ?>

<body id="data_pegawai">
    
    <div class="wrapper ">
    <?php include_once('../nav.php');?>
        <div class="panel-header panel-header-sm">
        </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Edit Admin</h5>
                                <a href="beranda.php" class="btn btn-success btn-round btn-sm"><i class="now-ui-icons arrows-1_minimal-left"></i>
                                    Kembali
                                </a>
                            </div>
                            
                            <div class="card-body">

                                <?php
                                    $id = @$_GET['id'];
                                    $sql = mysqli_query($con, "SELECT * FROM user WHERE id = '$id'") or die (mysqli_error($con));
                                    $data = mysqli_fetch_array($sql);
                                ?>
                                <form action="proses.php" method="post">     
                                <div class="row">  
                                    <div class="col-md-9 pr-2 mx-auto">
                                        <div class="form-group">
                                            <input type="text" name="id" value="<?=$data['id']?>" hidden>
                                            <label>Username</label><label style="color: red">*</label>                             
                                            <input name="username" type="text" class="form-control" value="<?=$data['username']?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-9 pr-2 mx-auto">
                                        <div class="form-group">
                                            <label>Password Lama</label><label style="color: red">*</label>
                                            <input name="password" type="password" class="form-control" placeholder="Password Lama" required>
                                        </div>
                                    </div>
                                    <div class="col-md-9 pr-2 mx-auto">
                                        <div class="form-group">
                                            <label>Password Baru</label><label style="color: red">*</label>
                                            <input name="passwordbaru" type="password" class="form-control" placeholder="Password Baru" required>
                                        </div>
                                    </div>
                                    <div class="col-md-9 pr-2 mx-auto">
                                        <div class="form-group">
                                            <label>Konfirmasi Password Baru</label><label style="color: red">*</label>
                                            <input name="konfirmasipasswordbaru" type="password" class="form-control" placeholder="Konfirmasi Password Baru" required>
                                        </div>
                                    </div>
                                    <div class="col-md-9 pr-2 mx-auto">
                                        <p style="color: red; font-style:italic; font-size:10px;">* Data Harus Diisi</p>
                                    </div>
                                </div>

                                            
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-round" type="submit" name="ubah" onclick="return valid();">Simpan
                                            <i class="now-ui-icons ui-1_send"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>