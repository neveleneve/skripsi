<?php
require 'config.php';
 
$nostand = $_POST['nostand'];
$namastand = $_POST['namastand'];
$namapenjual = $_POST['namapenjual'];
$username = $_POST['username'];
$passw = '1234';

// echo $nama;

$qtam = "insert into tb_penjual (no_stand, nama_stand, nama_penjual, username, password) values ('$nostand','$namastand','$namapenjual','$username','$passw')";
$exetambah = mysqli_query($koneksi,$qtam);
if ($exetambah) {
    header ('location: admin_penjual.php');
}