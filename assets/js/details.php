<?php
include "../../_config/config.php";
  $query_obat = "SELECT * FROM obat WHERE stok_obat > 0";
  $result_obat = mysqli_query($con,$query_obat);
   
   while($data_obat = mysqli_fetch_array($result_obat)){
    $obat[] = array("id"=>$data_obat['id_obat'],"label"=>$data_obat['nama_obat']);
   }

  echo json_encode($obat);
?>