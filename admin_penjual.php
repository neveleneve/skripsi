<?php
session_start();
if ($_SESSION['userrole'] == "admin") {
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
    <title>Admin Penjual</title>
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
        <h1 class="page-header">Data Penjual</h1>
        <div class="row">
            <div class="col-md-12">
                <h3>Tabel Data Penjual</h3>
                <form class="input-group" action="admin_penjual.php" method="get">
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
                            <th class="text-center">Nomor Stand</th>
                            <th class="text-center">Nama Stand</th>
                            <th class="text-center">Nama Penjual</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Saldo</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $querykaryawan = mysqli_query($koneksi, "SELECT * FROM tb_penjual where id_penjual like '%" . $cari . "%' or no_stand like '%" . $cari . "%' or nama_penjual like '%" . $cari . "%'");
                    } else {
                        $querykaryawan = mysqli_query($koneksi, "SELECT * FROM tb_penjual");
                    }
                    ?>
                    <tbody>
                        <?php
                        while ($lihat = mysqli_fetch_array($querykaryawan)) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $lihat['no_stand'];; ?></td>
                                <td class="text-center"><?php echo $lihat['nama_stand']; ?></td>
                                <td class="text-center"><?php echo $lihat['nama_penjual']; ?></td>
                                <td class="text-center"><?php echo $lihat['username']; ?></td>
                                <td class="text-center"><?php echo $lihat['saldo']; ?></td>
                                <td class="text-center">
                                    <a href="admin_penjual_edit_page.php?idpenjual=<?php echo $lihat['id_penjual']?>" class="btn btn-warning fa fa-border fa-pencil" data-toggler="tooltip" title="Edit Data Penjual"></a>
                                    <a onClick="javascript: return confirm('Yakin Akan Menghapus Data?');" href="" class="btn btn-danger fa fa-border fa-trash-o" data-toggler="tooltip" title="Hapus Data Penjual"></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="col-md-4">
                    <a href="admin_penjual_tambah_page.php" class="btn btn-primary fa fa-stack-1x fa-user-plus" data-toggler="tooltip" title="Tambah Data Karyawan"></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>