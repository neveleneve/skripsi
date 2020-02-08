<?php
require 'config.php';
$id = $_GET['id'];
$qdel = "delete from tb_brg where id_brg='$id'";
$exedell = mysqli_query($koneksi, $qdel);
if ($exedell) {
    header('location: penjual_menu.php');
}

?>