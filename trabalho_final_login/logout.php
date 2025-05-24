<?php
session_start();
    $_SESSION['idusuario'] = array();
    session_destroy();
    header("location: login.php");
    exit;
?>