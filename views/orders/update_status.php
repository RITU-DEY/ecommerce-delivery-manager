<?php
require_once '../../config/db.php';

$id = (int) $_GET['id'];

$res = $conn->query("SELECT status FROM delivery_assignments WHERE id=$id");
$row = $res->fetch_assoc();

if(!$row){
    header("Location: active.php");
    exit();
}

$current = strtolower($row['status']);

if($current == 'assigned'){
    $new = 'in_transit';
} else if($current == 'in_transit'){
    $new = 'delivered';
} else {
    header("Location: active.php");
    exit();
}

$stmt = $conn->prepare("
    UPDATE delivery_assignments 
    SET status=?
    WHERE id=?
");
$stmt->bind_param("si", $new, $id);
$stmt->execute();

header("Location: active.php");
exit();
?>