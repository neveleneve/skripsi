<?php
require 'config.php';
$id = $_GET['id'];
$qdel = "select status from tb_brg where id_brg='$id'";
$exedell = mysqli_query($koneksi, $qdel);
$state = mysqli_fetch_assoc($exedell);
if ($state['status'] == 0) {
    $qdep = "update tb_brg set status = 1 where id_brg='$id'";
    $exedep = mysqli_query($koneksi, $qdep);
    if ($exedep) {
        header('location: penjual_menu.php');
    }
}elseif ($state['status'] == 1) {
    $qdep = "update tb_brg set status = 0 where id_brg='$id'";
    $exedep = mysqli_query($koneksi, $qdep);
    if ($exedep) {
        header('location: penjual_menu.php');
    }
}
