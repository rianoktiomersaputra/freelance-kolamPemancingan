<?php
require_once "../config/config.php";
require_once "../head.php";
?> <div> <?php

    mysqli_query($con, "DELETE FROM user WHERE id = '$_GET[id]' ") or die (mysqli_error($con));
    echo '<script language="javascript">swal({text: "Data Pegawai Berhasil Dihapus",icon: "success"}).then(() => { window.location.href="beranda.php" });</script>';

?></div>