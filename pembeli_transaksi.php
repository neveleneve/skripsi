<?php
session_start();
if ($_SESSION['userrole'] == "pembeli") {
    $nama = $_SESSION['namauser'];
} else {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>transaksi</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="bootstrap/dist/js/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <?php
    include 'navbar.php';
    require 'config.php';
    ?>
    <br>
    <br>
    <div class="col-md-8 col-md-offset-2 main">
        <h1 class="page-header">Transaksi</h1>
        <div class="col-md-12">
            <h3>Tabel transaksi </h3>
            <br>
            <form action="pembeli_beli_menu.php?idpenj=<?php echo $idpenj ?>" method="post">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-danger">
                        <tr>
                            <th></th>
                            <th class="text-center">Nomor Transaksi</th>
                            <th class="text-center">Nomor Stand</th>
                            <th class="text-center">Total Item</th>
                            <th class="text-center">Total Belanja</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <?php
                    $qiduser = mysqli_query($koneksi, "select id from tb_pembeli where username='$nama'");
                    $exequser = mysqli_fetch_assoc($qiduser);
                    $id = $exequser['id'];
                    $querykaryawan = mysqli_query($koneksi, "SELECT id_transaksi, no_stand, sum(jumlah_brg) as jumlah_brg, sum(sub_total) as sub_total, status FROM tb_trans where id ='$id' group by id_transaksi");
                    ?>
                    <tbody class="bg-info">
                        <?php
                        while ($lihat = mysqli_fetch_array($querykaryawan)) {
                            $idtrans = $lihat['id_transaksi'];
                            ?>
                            <tr>
                                <td class="text-center"><a class="btn fa fa-plus" data-toggle="collapse" data-target="#read<?php echo $lihat['id_transaksi']?>"></a></td>
                                <td class="text-center"><?php echo $lihat['id_transaksi']; ?></td>
                                <td class="text-center"><?php echo $lihat['no_stand']; ?></td>
                                <td class="text-center"><?php echo $lihat['jumlah_brg']; ?></td>
                                <td class="text-right"><?php echo 'Rp. ' . str_replace(',', '.', number_format($lihat['sub_total'])) . ',00' ?></td>
                                <td class="text-center">
                                    <!-- <a href="pembeli_beli.php" " data-toggle="tooltip" title="<?php echo $lihat['status'] == 1 ? 'Sudah Dibayar!' : 'Belum Dibayar! Klik Untuk Bayar.' ?>" <?php echo $lihat['status'] == 1 ? 'disabled' : '' ?>></a> -->
                                    <a href="#" class="no-collapsable btn btn-<?php echo $lihat['status'] == 1 ? 'success' : 'danger' ?> fa fa-<?php echo $lihat['status'] == 1 ? 'check' : 'remove' ?>" data-toggle="tooltip" title="<?php echo $lihat['status'] == 1 ? 'Sudah Dibayar!' : 'Belum Dibayar! Klik Untuk Bayar.' ?>" <?php echo $lihat['status'] == 1 ? 'disabled' : '' ?>>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <div id="read<?php echo $lihat['id_transaksi']; ?>" class="collapse">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <th class="text-center">Nomor</th>
                                                <th class="text-center">Pesanan</th>
                                                <th class="text-center">Harga Satuan</th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-right">Total</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $nox = 1;
                                                    $qbrg = mysqli_query($koneksi, "select nama_brg, harga, jumlah_brg, sub_total from tb_trans join tb_brg on tb_trans.id_brg=tb_brg.id_brg where id_transaksi=$idtrans");
                                                    while ($show = mysqli_fetch_array($qbrg)) { ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $nox++ ?></td>
                                                        <td class="text-center"><?php echo $show['nama_brg'] ?></td>
                                                        <td class="text-center"><?php echo 'Rp. ' . str_replace(',', '.', number_format($show['harga'])) . ',00' ?></td>
                                                        <td class="text-center"><?php echo $show['jumlah_brg'] ?></td>
                                                        <td class="text-right"><?php echo 'Rp. ' . str_replace(',', '.', number_format($show['sub_total'])) . ',00' ?></td>
                                                    </tr>
                                                <?php }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot class="bg-danger">
                        <tr>
                            <th></th>
                            <th class="text-center">Nomor Transaksi</th>
                            <th class="text-center">Nomor Stand</th>
                            <th class="text-center">Total Item</th>
                            <th class="text-center">Total Belanja</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
</body>

</html>