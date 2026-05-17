<?php
require_once '../../config/db.php';

$total = $conn->query("SELECT COUNT(*) as t FROM delivery_assignments")->fetch_assoc();
$assigned = $conn->query("SELECT COUNT(*) as t FROM delivery_assignments WHERE LOWER(status)='assigned'")->fetch_assoc();
$active = $conn->query("SELECT COUNT(*) as t FROM delivery_assignments WHERE LOWER(status)='in_transit'")->fetch_assoc();
$delivered = $conn->query("SELECT COUNT(*) as t FROM delivery_assignments WHERE LOWER(status)='delivered'")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Summary Report</title>

<style>
body{font-family:Arial;background:#f1f5f9;padding:20px;}
.card{background:white;padding:20px;margin:10px;border-radius:10px;display:inline-block;width:200px;text-align:center;}
h2{text-align:center;}
</style>

</head>
<body>

<h2>📊 Summary Report</h2>

<div class="card">Total Orders<br><b><?= $total['t'] ?></b></div>
<div class="card">Assigned<br><b><?= $assigned['t'] ?></b></div>
<div class="card">Active<br><b><?= $active['t'] ?></b></div>
<div class="card">Delivered<br><b><?= $delivered['t'] ?></b></div>

</body>
</html>