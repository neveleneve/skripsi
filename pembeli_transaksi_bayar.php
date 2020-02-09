<?php
require 'config.php';
session_start();
$nama = $_SESSION['namauser'];
$idtrans = $_GET['idtrans'];
// echo $idtrans;
$qubah = "update tb_trans set status=1 where id_transaksi=$idtrans";
$exeubah = mysqli_query($koneksi, $qubah);

$qbayarpenjual = "select * from tb_trans where id_transaksi=$idtrans";
$exebayarpenjual = mysqli_query($koneksi, $qbayarpenjual);

if ($exebayarpenjual) {
    while ($lihat = mysqli_fetch_array($exebayarpenjual)) {
        $bayar = $lihat['sub_total'];
        $idpenj = $lihat['no_stand'];
    
        $qbayar = "update tb_penjual set saldo = saldo + $bayar  where no_stand='$idpenj'";
        $exebayar = mysqli_query($koneksi, $qbayar);
    
        $qkurangsaldo = "update tb_pembeli set saldo = saldo - $bayar where username='$nama'";
        $exekurangsaldo = mysqli_query($koneksi, $qkurangsaldo);    
    }
    header('location: pembeli_transaksi.php');
}
?>