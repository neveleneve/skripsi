<?php
session_start();
$_SESSION['userrole'] = "guest";
header("location: index.php");
?>
