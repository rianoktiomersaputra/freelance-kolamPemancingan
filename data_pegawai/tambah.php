<?php require_once('../head.php'); ?>

<body id="data_pegawai">
    
    <div class="wrapper ">
    <?php include_once('../nav.php');?>
        <div class="panel-header panel-header-sm">
        </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Tambah Admin</h5>
                                <a href="beranda.php" class="btn btn-success btn-round btn-sm"><i class="now-ui-icons arrows-1_minimal-left"></i>
                                    Kembali
                                </a>
                            </div>
                            
                            <div class="card-body">
                                <form name="tambahpegawai" action="proses.php" method="post">       
                                <div class="row" style="margin-left: 150px;">
                                        
                                    <div class="col-md-3 pr-2">
                                        <div class="form-group">
                                            <label>Email </label><label style="color: red">*</label>
                                            <input name="email" type="text" class="form-control" placeholder=" ... " required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 pr-2">
                                        <div class="form-group">
                                            <label>Username </label><label style="color: red">*</label>
                                            <input name="username" type="text" class="form-control" placeholder=" ... " required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 pr-2">
                                        <div class="form-group">
                                            <label>Password </label><label style="color: red">*</label>
                                            <input name="password" type="text" class="form-control" placeholder=" ... " required>
                                        </div>
                                    </div>
                                   
                                   
                                </div>
                                            
                             
                    
                               

                                <div class="row" style="margin-left: 170px;">
                                    <p style="color: red">* Data Harus Diisi</p>
                                </div>
                                            
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-round" type="submit" name="tambah" onclick="return valid();">Simpan
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