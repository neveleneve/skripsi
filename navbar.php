<?php
function PageName()
{
    return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}
$current_page = PageName();
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Pasar Mahasiswa</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <!-- <li><a href="index.php">Home</a></li> -->
                <?php
                if ($_SESSION['userrole'] == 'superadmin') {
                    ?>
                    <li class="<?php echo $current_page == 'index.php' ? 'active' : NULL ?>"><a href="index.php">Beranda</a></li>
                    <li class="<?php echo $current_page == 'superadmin_admin.php' ? 'active' : null ?>"><a href="superadmin_admin.php">Admin</a></li>
                    <li class="<?php echo $current_page == 'superadmin_penjualan.php' ? 'active' : null ?>"><a href="superadmin_penjualan.php">Penjualan</a></li>
                    <li class="<?php echo $current_page == 'superadmin_pembelian.php' ? 'active' : null ?>"><a href="superadmin_pembelian.php">Pembelian</a></li>
                <?php
                } elseif ($_SESSION['userrole'] == 'admin') {
                    ?>
                    <li class="<?php echo $current_page == 'index.php' ? 'active' : null ?>"><a href="index.php">Beranda</a></li>
                    <li class="<?php echo $current_page == 'admin_penjual.php' || $current_page == 'admin_penjual_edit.php' ? 'active' : null ?>"><a href="admin_penjual.php">Penjual</a></li>
                    <li class="<?php echo $current_page == 'admin_pembeli.php' ? 'active' : null ?>"><a href="admin_pembeli.php">Pembeli</a></li>
                    <li class="<?php echo $current_page == 'superadmin_penjualan.php' ? 'active' : null ?>"><a href="superadmin_penjualan.php">Penjualan</a></li>
                    <li class="<?php echo $current_page == 'superadmin_pembelian.php' ? 'active' : null ?>"><a href="superadmin_pembelian.php">Pembelian</a></li>
                    <li class="<?php echo $current_page == 'admin_laporan.php' ? 'active' : null ?>"><a href="admin_laporan.php">Laporan</a></li>
                <?php
                } elseif ($_SESSION['userrole'] == 'penjual') {
                    ?>
                    <li class="<?php echo $current_page == 'index.php' ? 'active' : null ?>"><a href="index.php">Beranda</a></li>
                    <li class="<?php echo $current_page == 'penjual_menu.php' ? 'active' : null ?>"><a href="penjual_menu.php">Menu</a></li>
                    <li class="<?php echo $current_page == 'penjual_transaksi.php' ? 'active' : null ?>"><a href="penjual_transaksi.php">Transaksi</a></li>
                <?php
                } elseif ($_SESSION['userrole'] == 'pembeli') {
                    ?>
                    <li class="<?php echo $current_page == 'index.php' ? 'active' : null ?>"><a href="index.php">Beranda</a></li>
                    <li class="<?php echo $current_page == 'pembeli_beli.php' ? 'active' : null ?>"><a href="pembeli_beli.php">Beli</a></li>
                    <li class="<?php echo $current_page == 'pembeli_transaksi.php' ? 'active' : null ?>"><a href="pembeli_transaksi.php">Transaksi</a></li>
                <?php
                } else {
                    ?>
                    <li class="<?php echo $current_page == 'index.php' ? 'active' : null ?>"><a href="index.php">Beranda</a></li>
                    <li class="<?php echo $current_page == 'tentang.php' ? 'active' : null ?>"><a href="tentang.php">Tentang Kami</a></li>
                <?php
                }
                ?>
                <!-- <li><a href="tentangkami.php">Tentang Kami</a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                //check userrole untuk tampilan register/login dan logout
                if ($_SESSION['userrole'] == 'guest') {
                    ?>
                    <li><a href="registerpage.php">Register</a></li>
                    <li><a href="loginpage.php">Login</a></li>
                <?php
                } else {
                    ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $nama ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Edit Profil</a></li>
                            <li><a href="logout.php">Log Out</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>