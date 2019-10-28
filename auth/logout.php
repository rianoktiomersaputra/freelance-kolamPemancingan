<?php
require_once "../config/config.php";

unset($_SESSION['rmeg']);

echo "<script>window.location='".base_url('auth/login.php')."';</script>";

?>