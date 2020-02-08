<?php
include 'config.php';

$nostand = $_POST['nostand'];
$namastand = $_POST['namastand'];
$namapenjual = $_POST['namapenjual'];
$username = $_POST['username'];
$password = $_POST['password'];

$ceknomorstand = mysqli_query($koneksi, "select no_stand, username from tb_penjual");
$cek = mysqli_fetch_assoc($ceknomorstand);
if ($cek['no_stand'] == $nostand) {
    echo '<script>alert("Nomor Stand Yang Anda Masukkan Sudah Terdaftar! Silahkan Ulangi!");window.location.href="registerpage.php"</script>';
}elseif($cek['username'] == $username) {
    echo '<script>alert("Username Yang Anda Masukkan Sudah Terdaftar! Silahkan Ulangi!");window.location.href="registerpage.php"</script>';
}else {
    mysqli_query($koneksi, "insert into tb_penjual (no_stand,nama_stand,nama_penjual,username,password) values('$nostand', '$namastand', '$namapenjual', '$username', '$password')");
    echo '<script>alert("Anda Sudah Terdaftar! Silahkan Login!");window.location.href="loginpage.php"</script>';
}
?>
