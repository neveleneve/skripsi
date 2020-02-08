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
    <title>Tambah Penjual</title>
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
        <h1 class="page-header">Tambah Penjual</h1>
        <form action="admin_penjual_tambah.php" method="post">
            <div class="form-group">
                <label>Nomor Stand</label>
                <input type="text"  name="nostand" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label> Nama Stand </label>
                <input type="text"  name="namastand" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Nama Penjual </label>
                <input type="text"  name="namapenjual" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="" required>
            
            </div>
            <input type="submit" class="btn btn-primary" value="Tambah">
        </form>
    </div>
</body>
</html>