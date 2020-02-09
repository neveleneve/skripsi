<?php
function PageName()
{
    return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}
$current_page = PageName();
?>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <?php
    if ($_SESSION['userrole'] == 'superadmin') {
    ?>
        <a class="<?php echo $current_page == 'index.php' ? 'active' : NULL ?>" href="index.php">Beranda</a></li>
        <a class="<?php echo $current_page == 'superadmin_admin.php' ? 'active' : null ?>" href="superadmin_admin.php">Admin</a></li>
        <a class="<?php echo $current_page == 'superadmin_penjualan.php' ? 'active' : null ?>" href="superadmin_penjualan.php">Penjualan</a>
        <a class="<?php echo $current_page == 'superadmin_pembelian.php' ? 'active' : null ?>" href="superadmin_pembelian.php">Pembelian</a>
    <?php
    } elseif ($_SESSION['userrole'] == 'admin') {
    ?>
        <a class="" href=""></a>
        <a class="" href=""></a>
        <a class="" href=""></a>
        <a class="" href=""></a>
        <a class="" href=""></a>
        <a class="" href=""></a>
    <?php
    } elseif ($_SESSION['userrole'] == 'penjual') {
    ?>

    <?php
    } elseif ($_SESSION['userrole'] == 'pembeli') {
    ?>
        <a class="" href=""></a>
        <a class="" href=""></a>
        <a class="" href=""></a>
    <?php
    } else {
    ?>
        <a class="" href=""></a>
        <a class="" href=""></a>
    <?php
    }
    ?>
</div>
<nav class="navbar navbar-default navbar-fixed-top">
    <div id="mainnav" class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li onclick="openNav()"><a class="navbar-brand fa fa-list"></a></li>
                <li> <a class="navbar-brand" href=""> Pasar Mahasiswa</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if ($_SESSION['userrole'] == 'guest') {
                ?>
                    <li><a href="registerpage.php">Register</a></li>
                    <li><a href="loginpage.php">Login</a></li>
                <?php
                } else {
                ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Masuk Sebagai : <?php echo $nama ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" style="width: 100%">
                            <li><a href="#">Edit Profil</a></li>
                            <li><a href="logout.php">Log Out</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
            </ul>

        </div>
    </div>
</nav>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "200px";
        document.getElementById("mainnav").style.marginLeft = "200px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("mainnav").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
    }
</script>