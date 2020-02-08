<?php
require 'config.php';
$uname = $_POST['username'];
$nama = $_POST['nama'];
$saldo = $_POST['saldo'];
echo $uname;
echo $nama;
echo $saldo;
$qsaldo = "update tb_pembeli set saldo=saldo+'$saldo' where username='$uname'";
$exeqsaldo = mysqli_query($koneksi, $qsaldo);
if ($exeqsaldo) {
    header('location: admin_pembeli.php');
}
?>