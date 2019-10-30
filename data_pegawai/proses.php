<?php
require_once "../head.php";
require_once "../config/config.php";
require_once "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

?><div class="content"> <?php

if(isset($_POST['tambah'])){
    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    $password = sha1(trim(mysqli_real_escape_string($con, $_POST['password'])));
    
    $sql = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($sql) > 0) {
        echo '<script language="javascript">swal({text: "Username telah digunakan!",icon: "warning", dangerMode: "true"}).then(() => { window.location.href="tambah.php" });</script>';
    }else {
        $query = mysqli_query($con, "INSERT INTO user VALUES ('', '$email' ,'$username', '$password')") or die (mysqli_error($con));
        if($query){
            echo '<script language="javascript">swal({text: "Data Pegawai Berhasil Ditambahkan",icon: "success"}).then(() => { window.location.href="beranda.php" });</script>';
        } else {
            echo '<script language="javascript">swal({text: "Data Pegawai Gagal Ditambakan",icon: "warning", dangerMode: "true"}).then(() => { window.location.href="tambah.php" });</script>';
        }
    } 
} else if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    
    $result =  mysqli_query($con,"SELECT * FROM user WHERE id = '$id'")or die (mysqli_error($con));
    $row=mysqli_fetch_array($result);

    $password = sha1(trim(mysqli_real_escape_string($con, $_POST['password'])));
    $new = sha1(trim(mysqli_real_escape_string($con, $_POST['passwordbaru'])));
    
    if($password == $row["password"]) {
        mysqli_query($con, "UPDATE user SET username='$username', password ='$new' WHERE id = '$id' ") or die (mysqli_error($con));
        echo '<script language="javascript">swal({text: "Data Pegawai Berhasil Diubah",icon: "success"}).then(() => { window.location.href="beranda.php" });</script>';
    } else {
        echo '<script language="javascript">swal({text: "Password Lama anda salah!",icon: "warning", dangerMode: "true"}).then(() => { window.location.href="ubah.php?id='.$nopeg.'" });</script>';
    } 
}
?> </div> <?php
?>