<?php
session_start();
if ($_SESSION['userrole'] == "admin") {
    $nama = $_SESSION['namauser'];
} else {
    header("location: index.php");
}
$idpen = $_GET['idpenjual'];
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

</head>

<body>
    <?php
    include 'navbar.php';
    require 'config.php';

    $q = "select * from tb_penjual where id_penjual='$idpen'";
    $exeq = mysqli_query($koneksi, $q);
    $lihat = mysqli_fetch_assoc($exeq);
    ?>
    <div class="col-md-8 col-md-offset-2 main">
        <h1 class="page-header">Edit Penjual</h1>
        <?php  ?>
        <form action="admin_penjual_edit.php" method="post">
            <div class="form-group">
                <label>ID</label>
                <input readonly type="text" value="<?php echo $idpen ?>" name="id" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Nomor Stand</label>
                <input type="text" value="<?php echo $lihat['no_stand'] ?>" name="nomorstand" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Nama Stand</label>
                <input type="text" value="<?php echo $lihat['nama_stand'] ?>" name="namastand" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Nama Penjual</label>
                <input type="text" value="<?php echo $lihat['nama_penjual'] ?>" name="namapenjual" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" value="<?php echo $lihat['username'] ?>" name="username" class="form-control" placeholder="" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Input Saldo">
        </form>
    </div>
</body>