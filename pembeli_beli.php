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
    <title>Beli</title>
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
    <br>
    <br>
    <div class="col-md-8 col-md-offset-2 main">
        <h1 class="page-header">Menu</h1>
        <div class="col-md-12">
            <h3>Tabel Menu</h3>
            <form class="input-group" action="" method="get">
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
            <form action="" method="post">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-danger">
                        <tr>
                            <th></th>
                            <th class="text-center">NOMOR </th>
                            <th class="text-center">NOMOR STAND</th>
                            <th class="text-center">NAMA STAND</th>
                        </tr>
                    </thead>
                    <?php
                    $querykaryawan = mysqli_query($koneksi, "SELECT * FROM tb_penjual group by no_stand order by no_stand asc");
                    ?>
                    <tbody class="bg-info">
                        <tr>
                            <td colspan="4">
                            </td>
                        </tr>
                        <?php
                        $no = 1;
                        while ($lihat = mysqli_fetch_array($querykaryawan)) {
                            $nostand = $lihat['no_stand'];
                        ?>
                            <tr>
                                <td class="text-center"><a class="btn btn-primary fa fa-plus fa-border" data-toggle="collapse" data-target="#read<?php echo $lihat['no_stand'] ?>"></a></td>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td class="text-center"><?php echo $lihat['no_stand']; ?></td>
                                <td class="text-center"><?php echo $lihat['nama_stand']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div id="read<?php echo $lihat['no_stand'] ?>" class="collapse">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead class="bg-danger">
                                                <th class="text-center">NOMOR</th>
                                                <th class="text-center">NAMA BARANG</th>
                                                <th class="text-center">HARGA</th>
                                                <th class="text-center">JUMLAH BELI</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $nox = 1;
                                                $qbrg = mysqli_query($koneksi, "select * from tb_brg where no_stand='$nostand' and status = 1");
                                                while ($show = mysqli_fetch_array($qbrg)) { ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $nox++ ?></td>
                                                        <td class="text-center"><?php echo $show['nama_brg'] ?></td>
                                                        <td class="text-center"><?php echo 'Rp. ' . str_replace(',', '.', number_format($show['harga'])) . ',00' ?></td>
                                                        <td class="text-center">
                                                            <input class="form-control" type="number" name="<?php echo $show['id_brg'] ?>" id="<?php echo $show['id_brg'] ?>" min="0">
                                                        </td>
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
                            <th class="text-center">NOMOR </th>
                            <th class="text-center">NOMOR STAND</th>
                            <th class="text-center">NAMA STAND</th>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>

</body>

</html>