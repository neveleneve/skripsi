<?php
    session_start();
    if ($_SESSION['userrole'] == "penjual") {
		$nama = $_SESSION['namauser'];
        $nostand = $_SESSION['nostand'];
	}else {
        header("location: index.php");
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penjual Transaksi</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/dist/js/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
</head>
<body>
    <?php
        include 'navbar.php';
        require 'config.php';
    ?>
    <div class="col-md-8 col-md-offset-2 main">
        <h1 class="page-header">Transaksi</h1>
        <div class="col-md-12">
            <h3>Tabel Transaksi</h3>
            <form action="" method="get">
                <input type="text" class="form-control" placeholder="Pencarian" name="cari">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" value="Cari"><i class="fa fa-search"></i></button>
                </span>
            </form>
            <?php
            if (isset($_GET['cari'])) {
               $cari = $_GET['cari'];
            }
            ?>
            <br>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>NOMOR</th>
                    <th>ID Transaksi</th>
                    <th>NAMA PEMBELI</th>
                    <th>NAMA BARANG</th>
                    <th>HARGA SATUAN</th>
                    <th>TOTAL BELI</th>
                    <th>TOTAL HARGA</th>
                    <th>STATUS</th>
                </thead>
                <?php
                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $querykaryawan = mysqli_query($koneksi, "SELECT * FROM tb_trans where nama_brg like '%" . $cari . "%' and ");
                } else {
                    $querykaryawan = mysqli_query($koneksi, "SELECT tb_trans.id_transaksi, tb_pembeli.nama, tb_brg.nama_brg, tb_brg.harga, tb_trans.jumlah_brg, tb_trans.sub_total, tb_trans.status 
                    FROM tb_trans join tb_pembeli on tb_trans.id=tb_pembeli.id join tb_brg on tb_trans.id_brg=tb_brg.id_brg where tb_trans.no_stand='$nostand'");
                }
                ?>
                <tbody>
                    <?php
                    $no = 1;
                    while ($lihat = mysqli_fetch_array($querykaryawan)) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $lihat['id_transaksi']; ?></td>
                            <td class="text-center"><?php echo $lihat['nama']; ?></td>
                            <td class="text-center"><?php echo $lihat['nama_brg']; ?></td>
                            <td class="text-center"><?php echo $lihat['harga']; ?></td>
                            <td class="text-center"><?php echo $lihat['jumlah_brg']; ?></td>
                            <td class="text-center"><?php echo $lihat['sub_total']; ?></td>
                            <td class="text-center">
                                <a readonly class="btn btn-<?php echo $lihat['status'] == 1 ? 'success' : 'danger'; ?> fa fa-border fa-<?php echo $lihat['status'] == 1 ? 'check' : 'remove'; ?>" data-toggler="tooltip" title="<?php echo $lihat['status'] == 1 ? 'Sudah Dibayar' : 'Belum Dibayar'; ?>"></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>

    </div>
    
</body>
</html>