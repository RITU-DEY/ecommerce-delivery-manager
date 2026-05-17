<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../views/auth/login.php");
    exit();
}

if($_SESSION['role'] != 'delivery_manager'){
    echo "Access Denied";
    exit();
}

?>