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
    <title>Tambah Menu</title>
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
        <h1 class="page-header">Edit Penjual</h1>
        <?php  ?>
        <form action="penjual_menu_tambah.php" method="post">
            <div class="form-group">
                <label>Menu</label>
                <input type="text" name="menu" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" value="Cari">Rp. </button>
                    </span>
                    <input type="number" name="harga" class="form-control" placeholder="" required>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Tambah Menu">
        </form>
    </div>

</body>

</html>