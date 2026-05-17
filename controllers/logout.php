<?php

session_start();

// session clear
$_SESSION = [];

// destroy session
session_destroy();

// redirect to login
header("Location: /ecommerce_delivery_manager/views/auth/login.php");
exit();

?>