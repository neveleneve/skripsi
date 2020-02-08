<?php
session_start();
if ($_SESSION['userrole'] == "") {
	foreach ($_SESSION as $key => $val) {
		if ($key !== 'userrole') {

			unset($_SESSION[$key]);
		}
	}
	$_SESSION['userrole'] = 'guest';
	$_SESSION['namauser'] = '';
} else {
	$nama = $_SESSION['namauser'];
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Pasar Mahasiswa STT Indonesia Tanjungpinang</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/dist/js/jquery.js"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>
	<?php
	include 'navbar.php';
	?>
	<h1 class="page-header text-center" style="margin-top: 70px">Pasar Mahasiswa STT Indonesia Tanjungpinang <br>__________________________________________</h1>
	<?php
	// include 'carousel.php';
	?>
	<br><br><br><br>
</body>
<script type="text/javascript">
	$('.carousel').carousel();
</script>
<?php
print_r($_SESSION);
?>

</html>