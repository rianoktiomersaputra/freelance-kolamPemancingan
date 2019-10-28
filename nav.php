<script>
    function logout(){
        swal("Apakah Anda Yakin Logout dari Sistem?", {icon: "warning",
          buttons: {
            cancel: "Tidak",
            Iya: true,
          },
        })
        .then((value) => {
          switch (value) {
         
            case "Iya":
                swal("", "Anda Berhasil Logout!", "success")
                .then(() => { window.location.href="../auth/logout.php" });
                break;
         
            default:
              break;
          }
        });
    }
</script>

<?php
    require_once "head.php";
    $name = $_SESSION['rmeg'];
    ?>

<div class="sidebar" data-color="blue">
    
    <div class="logo"> 
        <a href="<?=base_url('dashboard')?>" class="" style="color: rgb(45,45,45); font-weight: bold">
           MONITORING KOLAM IKAN
        </a>
        
          </div>
            
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="<?=base_url('dashboard')?>">
                   <i style="color: rgb(45,45,45)" class="now-ui-icons design_app"></i>
                   <p style="color: rgb(45,45,45); font-weight: bold">Dashboard </p>
                </a>
           </li>
            <li>
                <a href="<?=base_url('laporan/kunjungan.php')?>">
                    <i style="color: rgb(45,45,45)" class="now-ui-icons media-2_sound-wave"></i>
                    <p style="color: rgb(45,45,45); font-weight: bold">Grafik   </p>
                </a>
            </li>
            <li>
                <a href="<?=base_url('data_pegawai/beranda.php')?>">
                    <i style="color: rgb(45,45,45)" class="now-ui-icons business_badge"></i>
                    <p style="color: rgb(45,45,45); font-weight: bold">Master Data Pegawai</p>
                </a>
            </li>
        </ul>
    </div>
</div>

        <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item" align="">
                            <a class="nav-link" href="#">
                                <p style="color: rgb(45,45,45); font-weight: bold">
                                    Anda Login Sebagai: Admin
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        
                        <li class="nav-item">
                            <a class="nav-link btn" onclick="logout()" style="background-color: rgba(255, 255, 255, 1);">
                                <i class="now-ui-icons media-1_button-power" style="color: rgb(45,45,45); font-weight: bold;"></i>
                                <p style="color: rgb(45,45,45); font-weight: bold;">
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
