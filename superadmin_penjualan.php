<?php
session_start();
if ($_SESSION['userrole'] == "superadmin" || $_SESSION['userrole'] == "admin") {
    $nama = $_SESSION['namauser'];
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
    <title>Penjualan</title>
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
        <h1 class="page-header">Data Penjualan</h1>
        <div class="row">
            <div class="col-md-12">
                <h3>Tabel Data Penjualan</h3>
                <form class="input-group" action="superadmin_penjualan.php" method="get">
                    <input type="text" class="form-control" placeholder="Pencarian" name="cari">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" value="Cari"><i class="fa fa-search"></i></button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</body>
</html>