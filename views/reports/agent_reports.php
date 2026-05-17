<?php
require_once '../../config/db.php';

$result = $conn->query("
    SELECT 
        agent_id,
        COUNT(*) AS total_orders,
        SUM(CASE WHEN LOWER(status) = 'delivered' THEN 1 ELSE 0 END) AS delivered_orders
    FROM delivery_assignments
    GROUP BY agent_id
    ORDER BY total_orders DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Agent Report</title>

<style>
body{font-family:Arial;background:#f1f5f9;padding:20px;}
table{width:100%;border-collapse:collapse;background:white;}
th,td{padding:10px;border:1px solid #ddd;text-align:center;}
th{background:#1e293b;color:white;}
h2{text-align:center;}
</style>

</head>
<body>

<h2> Agent Performance Report</h2>

<table>
<tr>
    <th>Agent ID</th>
    <th>Total Orders</th>
    <th>Delivered</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
    <td><?= $row['agent_id'] ?></td>
    <td><?= $row['total_orders'] ?></td>
    <td><?= $row['delivered_orders'] ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>