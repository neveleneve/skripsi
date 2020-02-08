<?php
require 'config.php';
$idpemb = $_GET['idpembeli'];
$qdel = "delete from tb_pembeli where id='$idpemb'";
$exedell = mysqli_query($koneksi, $qdel);
if ($exedell) {
    header('location: admin_pembeli.php');
}

?>