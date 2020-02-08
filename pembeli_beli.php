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
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nomor </th>
                        <th>Nomor Stand</th>
                        <th>Nama Stand</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $querykaryawan = mysqli_query($koneksi, "SELECT * FROM tb_brg where nama_brg like '%" . $cari . "%' and ");
                } else {
                    $querykaryawan = mysqli_query($koneksi, "SELECT * FROM tb_penjual group by no_stand order by no_stand asc");
                }
                ?>
                <tbody>
                    <?php
                    $no = 1;
                    while ($lihat = mysqli_fetch_array($querykaryawan)) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $lihat['no_stand']; ?></td>
                            <td class="text-center"><?php echo $lihat['nama_stand']; ?></td>
                            <td class="text-center">
                                <a href="pembeli_beli_menu_page.php?id=<?php echo $lihat['no_stand'] ?>" class="btn btn-primary fa fa-border fa-reorder" data-toggler="tooltip" title="Lihat Menu Stand"></a>
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