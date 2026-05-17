<?php
require_once '../../config/db.php';

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

ORDER BY d.assigned_at DESC
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Active Orders</title>
    <style>
    body { font-family:Arial; background:#f1f5f9; padding:20px; }
    h2 { text-align:center; color:#1e293b; }
    table { width:100%; border-collapse:collapse; background:white; margin-top:20px; }
    th,td { padding:12px; border:1px solid #ddd; text-align:center; }
    th { background:#1e293b; color:white; }
    tr:hover { background:#f9fafb; }
    .btn { padding:6px 10px; background:#3b82f6; color:white; text-decoration:none; border-radius:5px; }
    .btn:hover { background:#2563eb; }
    .badge { padding:5px 10px; border-radius:5px; color:white; font-size:13px; }
    .assigned   { background:#f59e0b; }
    .in_transit { background:#3b82f6; }
    .delivered  { background:#10b981; }
    </style>
</head>
<body>

<h2> Active Orders</h2>

<table>
<tr>
    <th>ID</th>
    <th>Order ID</th>
    <th>Agent</th>
    <th>Amount</th>
    <th>Zone</th>

    <th>Status</th>
    <th>Assigned At</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['order_id'] ?></td>
    <td><?= $row['agent_name'] ?></td>
    <td><?= $row['total_amount'] ?> TK</td>
      <td><?= $row['delivery_zone'] ?> </td>
    <td>
        <span class="badge <?= $row['status'] ?>">
            <?= ucfirst(str_replace('_', ' ', $row['status'])) ?>
        </span>
    </td>
    <td><?= $row['assigned_at'] ?></td>
    <td>
        <?php if($row['status'] != 'delivered'): ?>
            <a class="btn" href="update_status.php?id=<?= $row['id'] ?>">Update</a>
        <?php else: ?>
            ✅ Done
        <?php endif; ?>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>