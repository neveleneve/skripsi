<?php
session_start();
$idkry = $_SESSION['namauser'];
include "config.php";
$iduserq = mysqli_query($koneksi, "SELECT id FROM tb_pembeli where username='$idkry'");
$idpembeli = mysqli_fetch_assoc($iduserq);
$idpemb = $idpembeli['id'];
$idpenj = $_GET['idpenj'];

$maxquery = mysqli_query($koneksi, "SELECT max(id_transaksi) as maxid FROM tb_trans");
$exemax = mysqli_fetch_assoc($maxquery);

$number = $exemax['maxid'] + 1;

$checkquery = mysqli_query($koneksi, "SELECT * FROM tb_brg where no_stand='$idpenj' and status=1");
$tot = 0;
while ($data = mysqli_fetch_assoc($checkquery)) {
    $jumlah = $_POST[$data['id_brg']];
    $idbrg = $data['id_brg'];
    if ($jumlah == 0) { } else {
        $harga = $data['harga'];
        $subtot = $harga * $jumlah;
        $addquery = mysqli_query($koneksi, "INSERT INTO tb_trans (id_transaksi, id, no_stand, id_brg, jumlah_brg, sub_total, status) values ($number, $idpemb, '$idpenj', $idbrg, $jumlah, $subtot, 0)");
        $updatestock = mysqli_query($koneksi, "UPDATE barang SET stok_brg = stok_brg - $jumlah WHERE id_brg = $idbrg");
        $tot += $subtot;
    }
}
$subtot = str_replace(',', '.', number_format($tot));
echo "<script>alert('Total pembelian Anda = Rp. " . $subtot . " !');window.location.href = 'pembeli_transaksi.php';</script>";
