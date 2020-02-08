<?php
    session_start();
    session_start();
    if ($_SESSION['userrole'] == "admin") {
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
    <title>Laporan</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/dist/js/jquery.js"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
</body>
</html>