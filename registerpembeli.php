<?php
include 'config.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$username = $_POST['username'];
$password = $_POST['password'];

$ceknama = mysqli_query($koneksi, "select nama, username from tb_pembeli");
$cek = mysqli_fetch_assoc($ceknama);
if ($cek['nohp'] == $nohp) {
    echo '<script>alert("Nomor Handphone Yang Anda Masukkan Sudah Terdaftar! Silahkan Ulangi!");window.location.href="registerpembelipage.php"</script>';
}elseif($cek['username'] == $username) {
    echo '<script>alert("Username Yang Anda Masukkan Sudah Terdaftar! Silahkan Ulangi!");window.location.href="registerpembelipage.php"</script>';
}else {
    mysqli_query($koneksi, "insert into tb_pembeli (nama,alamat,no_hp,username,password) values('$nama', '$alamat', '$nohp', '$username', '$password')");
    echo '<script>alert("Anda Sudah Terdaftar! Silahkan Login!");window.location.href="loginpage.php"</script>';
}
?>
