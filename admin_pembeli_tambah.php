<?php
require 'config.php';
 
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$username = $_POST['username'];
$saldo = $_POST['saldo'];
$passw = '1234';

// echo $nama;

$qtam = "insert into tb_pembeli (nama, alamat, no_hp, username, password, saldo) values ('$nama','$alamat','$nohp','$username','$passw','$saldo')";
$exetambah = mysqli_query($koneksi,$qtam);
if ($exetambah) {
    header ('location: admin_pembeli.php');
}