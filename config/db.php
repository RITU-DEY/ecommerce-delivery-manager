<?php

$conn = new mysqli("localhost", "root", "", "ecommerce_store");

if($conn->connect_error){
    die("Connection Failed");
}

?>