<?php
// mengaktifkan session pada php
include 'config.php';
session_start();
if ($_SESSION['userrole'] == 'admin' || $_SESSION['userrole'] == 'superadmin' || $_SESSION['userrole'] == 'penjual') {
	header('location:index.php');
}
// menghubungkan php dengan koneksi database

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

if ($level == 'admin') {
	$querylogin = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
	$cek = mysqli_num_rows($querylogin);
	if ($cek > 0) {
		$executequery = mysqli_fetch_assoc($querylogin);
		if ($executequery['level'] == 'admin') {
			$_SESSION['userrole'] = "admin";
			$_SESSION['namauser'] = "Admin";
			header("location: index.php");
		} elseif ($executequery['level'] == 'superadmin') {
			$_SESSION['userrole'] = "superadmin";
			$_SESSION['namauser'] = "Superadmin";
			header("location: index.php");
		}
	} else {
		echo '<script>alert("Username/Password Salah");</script>';
	}
	// echo 'Makan';
} elseif ($level == 'peserta') {
	$querylogin = mysqli_query($koneksi, "select * from tb_penjual where username='$username' and password='$password'");
	$cek = mysqli_num_rows($querylogin);
	if ($cek > 0) {
		$executequery = mysqli_fetch_assoc($querylogin);
		if ($executequery) {
			$_SESSION['userrole'] = 'penjual';
			$_SESSION['namauser'] = $executequery['nama_penjual'];
			$_SESSION['nostand'] = $executequery['no_stand'];
			header("location: index.php");
		}
	} else {
		echo '<script>alert("Username/Password Salah");window.location.href="loginpage.php"</script>';
	}
} elseif ($level == 'pembeli') {
	$querylogin = mysqli_query($koneksi, "select * from tb_pembeli where (no_hp='$username' or username='$username') and password='$password'");
	$cek = mysqli_num_rows($querylogin);
	if ($cek > 0) {
		$executequery = mysqli_fetch_assoc($querylogin);
		if ($executequery) {
			$_SESSION['userrole'] = 'pembeli';
			$_SESSION['namauser'] = $executequery['username'];
			header("location: index.php");
		} else {
			echo '<script>alert("Username/Password Salah");window.location.href="loginpage.php"</script>';
		}
	}
}
