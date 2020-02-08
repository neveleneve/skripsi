<?php
session_start();
if ($_SESSION['userrole'] == "penjual") {
    $nama = $_SESSION['namauser'];
    $nostand = $_SESSION['nostand'];
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
    <title>Menu</title>
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
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $querykaryawan = mysqli_query($koneksi, "SELECT * FROM tb_brg where nama_brg like '%" . $cari . "%' and ");
                } else {
                    $querykaryawan = mysqli_query($koneksi, "SELECT * FROM tb_brg where no_stand='$nostand'");
                }
                ?>
                <tbody>
                    <?php
                    $no = 1;
                    while ($lihat = mysqli_fetch_array($querykaryawan)) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $lihat['nama_brg']; ?></td>
                            <td class="text-center"><?php echo $lihat['harga']; ?></td>
                            <td class="text-center">
                                <a href="penjual_menu_status.php?id=<?php echo $lihat['id_brg'] ?>" class="btn btn-<?php echo $lihat['status'] == 0 ? 'warning' : 'success' ?> fa fa-border fa-<?php echo $lihat['status'] == 0 ? 'remove' : 'check' ?>" data-toggler="tooltip" title="<?php echo $lihat['status'] == 0 ? 'Menu Tak Tersedia' : 'Menu Tersedia' ?>"></a>
                                <a onClick="javascript: return confirm('Yakin Akan Menghapus Data?');" href="penjual_menu_hapus.php?id=<?php echo $lihat['id_brg'] ?>" class="btn btn-danger fa fa-border fa-trash-o" data-toggler="tooltip" title="Hapus Menu"></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="col-md-4">
                    <a href="penjual_menu_tambah_page.php" class="btn btn-primary fa fa-stack-1x fa-user-plus" data-toggler="tooltip" title="Tambah Data Karyawan"></a>
                </div>
        </div>
    </div>
</body>

</html>