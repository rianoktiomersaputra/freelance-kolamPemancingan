<?php require_once('../head.php'); ?>

<script type="text/javascript">
    function valid(){
        if(isNaN(tambahpegawai.nopeg.value)){
            swal({text: "Format Nomor Pegawai Salah", icon: "warning"});
            tambahpegawai.nopeg.focus();
            return false;
        }
        if(tambahpegawai.nopeg.value == ""){
            swal({text: "Nomor Pegawai Harus Diisi", icon: "warning"});
            tambahpegawai.nopeg.focus();
            return false;
        }
        if((tambahpegawai.nopeg.value).length < 6){
            swal({text: "Nomor Pegawai Harus Sesuai", icon: "warning"});
            tambahpegawai.nopeg.focus();
            return false;
        }
        if(tambahpegawai.nama.value == ""){
            swal({text: "Nama Pegawai Harus Diisi", icon: "warning"});
            tambahpegawai.nama.focus();
            return false;
        }
        if(tambahpegawai.jeniskelamin.value == ""){
            swal({text: "Jenis Kelamin Pegawai Harus Diisi", icon: "warning"});
            tambahpegawai.jeniskelamin.focus();
            return false;
        }
        if(tambahpegawai.bagian.value == "a"){
            swal({text: "Bagian Pegawai Harus Diisi", icon: "warning"});
            tambahpegawai.bagian.focus();
            return false;
        }
        if(tambahpegawai.alamat.value == ""){
            swal({text: "Alamat Pegawai Harus Diisi", icon: "warning"});
            tambahpegawai.alamat.focus();
            return false;
        }
        if(tambahpegawai.nohp.value == ""){
            swal({text: "Nomor HP Pegawai Harus Diisi", icon: "warning"});
            tambahpegawai.nohp.focus();
            return false;
        }
        if(isNaN(tambahpegawai.nohp.value)){
            swal({text: "Format Nomor HP Pegawai Salah", icon: "warning"});
            tambahpegawai.nohp.focus();
            return false;
        }
        if((tambahpegawai.nohp.value).length < 11){
            swal({text: "Nomor HP Pegawai Harus Sesuai", icon: "warning"});
            tambahpegawai.nohp.focus();
            return false;
        }
        if(tambahpegawai.username.value == ""){
            swal({text: "Username Pegawai Harus Diisi", icon: "warning"});
            tambahpegawai.username.focus();
            return false;
        }
        if(tambahpegawai.password.value == ""){
            swal({text: "Password Pegawai Harus Diisi", icon: "warning"});
            tambahpegawai.password.focus();
            return false;
        }

        return true;
    }
</script>

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