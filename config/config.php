<?php
//setting timezone untuk default jakarta
date_default_timezone_set('Asia/Jakarta');

//start session
session_start();

//membuat koneksi ke database
$con = mysqli_connect('localhost', 'root', '', 'kolamPemancingan');
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

//fungsi untuk membuat base_url
function base_url($url = null){
    $base_url = "http://localhost/kolamPemancingan";
    if($url != null){
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}
?>