<?php
require 'config.php';
$id = $_POST['id'];
$nostand = $_POST['nomorstand'];
$namastand = $_POST['namastand'];
$namapenjual = $_POST['namapenjual'];
$username = $_POST['username'];

$qsaldo = "update tb_penjual set no_stand='$nostand', nama_stand='$namastand', nama_penjual='$namapenjual', username='$username' where id_penjual='$id'";
$exeqsaldo = mysqli_query($koneksi, $qsaldo);
if ($exeqsaldo) {
    header('location: admin_penjual.php');
}
?>