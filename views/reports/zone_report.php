<?php
require_once '../../config/db.php';

$result = $conn->query("
    SELECT 
        o.delivery_zone,
        COUNT(*) AS total_orders,
        SUM(CASE WHEN LOWER(d.status)='delivered' THEN 1 ELSE 0 END) AS delivered
    FROM delivery_assignments d
    JOIN orders o ON o.id = d.order_id
    GROUP BY o.delivery_zone
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Zone Report</title>

<style>
body{font-family:Arial;background:#f1f5f9;padding:20px;}
table{width:100%;border-collapse:collapse;background:white;}
th,td{padding:10px;border:1px solid #ddd;text-align:center;}
th{background:#1e293b;color:white;}
h2{text-align:center;}
</style>

</head>
<body>

<h2> Zone Report</h2>

<table>
<tr>
    <th>Zone</th>
    <th>Total Orders</th>
    <th>Delivered</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
    <td><?= $row['delivery_zone'] ?></td>
    <td><?= $row['total_orders'] ?></td>
    <td><?= $row['delivered'] ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>