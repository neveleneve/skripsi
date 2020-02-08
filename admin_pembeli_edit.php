<?php
session_start();
if ($_SESSION['userrole'] == "admin") {
    $nama = $_SESSION['namauser'];
} else {
    header("location: index.php");
}
$idpmb = $_GET['idpembeli'];
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
    
    $q = "select * from tb_pembeli where id='$idpmb'";
    $exeq = mysqli_query($koneksi, $q);
    $lihat = mysqli_fetch_assoc($exeq);
    ?>
    <br>
    <br>
    <div class="col-md-8 col-md-offset-2 main">
        <h1 class="page-header">Tambah Saldo</h1>
        <form action="admin_pembeli_edit_saldo.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" readonly value="<?php echo $lihat['username'] ?>" name="username" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Nama Pembeli</label>
                <input type="text" readonly value="<?php echo $lihat['nama'] ?>" name="nama" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Tambah Saldo</label>
                <span>
                    <input name="saldo" class="form-control" type="number" min="0">
                </span>
            </div>
            <input type="submit" class="btn btn-primary" value="Input Saldo">
        </form>
    </div>
</body>

</html>