<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecommerce_delivery_manager/config/db.php';

$result = $conn->query("
   SELECT 
    d.id,
    d.order_id,
    d.agent_id,
    d.status,
    d.assigned_at,
    o.total_amount,
    o.delivery_zone,        
    a.name AS agent_name
FROM delivery_assignments d
JOIN orders o ON o.id = d.order_id
JOIN agents a ON a.id = d.agent_id
WHERE d.status = 'assigned'
ORDER BY d.assigned_at DESC
")
?>
<!DOCTYPE html>
<html>
<head>
<title>Ready Orders</title>
<style>
body { font-family: Arial; background:#f1f5f9; padding:20px; }
h2 { text-align:center; color:#1e293b; }
table { width:100%; border-collapse:collapse; background:white; margin-top:20px; }
th { background:#1e293b; color:white; padding:12px; }
td { padding:10px; text-align:center; border:1px solid #ddd; }
tr:hover { background:#f9fafb; }
.badge { padding:5px 10px; background:#3b82f6; color:white; border-radius:5px; font-size:13px; }
</style>
</head>
<body>

<h2> Ready Orders</h2>

<table>
<tr>
    <th>Order ID</th>
    <th>Agent Name</th>
    <th>Amount</th>
    <th>Zone</th>
    <th>Status</th>
    <th>Assigned At</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
    <td><?= $row['order_id'] ?></td>
    <td><?= $row['agent_name'] ?></td>
    <td><?= $row['total_amount'] ?> TK</td>
     <td><?= $row['delivery_zone'] ?> </td>
    <td><span class="badge"><?= $row['status'] ?></span></td>
    <td><?= $row['assigned_at'] ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>