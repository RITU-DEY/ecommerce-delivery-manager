<?php
require_once '../../config/db.php';

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $conn->query("DELETE FROM agents WHERE id=$id");

    header("Location: index.php");
}
?>
