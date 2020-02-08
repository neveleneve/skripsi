<?php
session_start();
if ($_SESSION['userrole'] == "pembeli") {
    $nama = $_SESSION['namauser'];
} else {
    header("location: index.php");
}
$idpenj = $_GET['id']

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            <h3>Tabel Menu Stand <?php echo $idpenj ?></h3>
            <br>
            <form action="pembeli_beli_menu.php?idpenj=<?php echo $idpenj ?>" method="post">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nomor </th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Total Beli</th>
                        </tr>
                    </thead>
                    <?php
                    $querykaryawan = mysqli_query($koneksi, "SELECT * FROM tb_brg where no_stand='$idpenj' and status = 1");

                    ?>
                    <tbody>
                        <?php
                        // echo $idpenj;
                        $no = 1;
                        while ($lihat = mysqli_fetch_array($querykaryawan)) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td class="text-center"><?php echo $lihat['nama_brg']; ?></td>
                                <td class="text-center"><?php echo 'Rp. ' . str_replace(',', '.', number_format($lihat['harga'])) . ',00' ?></td>
                                <td class="text-center">
                                    <input type="number" class="form-control" min="0" placeholder="Jumlah Pesanan <?php echo $lihat['nama_brg'] ?>" name="<?php echo $lihat['id_brg'] ?>">
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div>
                    <a href="pembeli_beli.php" class="btn btn-danger">kembali</a>
                    <input type="submit" class="btn btn-primary" value="beli!!">
                </div>
            </form>
        </div>
    </div>
</body>

</html>