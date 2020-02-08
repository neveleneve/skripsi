<?php
require 'config.php';
session_start();
$nostand = $_SESSION['nostand'];

$menu = $_POST['menu'];
$harga = $_POST['harga'];


// echo $menu;
// echo $harga;

$qtam = "insert into tb_brg (nama_brg, harga, no_stand) values ('$menu','$harga','$nostand')";
$exetambah = mysqli_query($koneksi,$qtam);
if ($exetambah) {
    header ('location: penjual_menu.php');
}

?>