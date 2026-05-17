<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecommerce_delivery_manager/config/db.php';
$result = $conn->query("SELECT * FROM orders WHERE status='pending'");
?>
<!DOCTYPE html>
<html>
<head>
<title>Pending Orders</title>
<style>
body { font-family: Arial; background:#f1f5f9; padding:20px; }
h2 { text-align:center; color:#1e293b; }
table { width:100%; border-collapse:collapse; background:white; margin-top:20px; }
th { background:#1e293b; color:white; padding:12px; }
td { padding:10px; text-align:center; border:1px solid #ddd; }
tr:hover { background:#f9fafb; }
.btn { padding:6px 10px; border:none; border-radius:5px; cursor:pointer; color:white; text-decoration:none; display:inline-block; margin:2px; }
.assign { background:#3b82f6; }
.assign:hover { background:#2563eb; }
.view { background:#10b981; }
.view:hover { background:#059669; }
.badge { padding:5px 10px; background:#f59e0b; color:white; border-radius:5px; }
</style>
</head>
<body>

<h2> Pending Orders</h2>

<table>
<tr>
    <th>Order</th>
    <th>Amount</th>
    <th>Status</th>
    <th>Actions</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['total_amount'] ?></td>
    <td><span class="badge"><?= $row['status'] ?></span></td>
    <td>
        <form onsubmit="assignOrder(event, <?= $row['id'] ?>)" style="display:inline;">
            <select id="agent<?= $row['id'] ?>" required>
                <option value="">Select Agent</option>
                <?php
                $agents = $conn->query("SELECT * FROM agents WHERE status='Active'");
                while($a = $agents->fetch_assoc()){
                ?>
                <option value="<?= $a['id'] ?>"><?= $a['name'] ?></option>
                <?php } ?>
            </select>
            <button class="btn assign" type="submit">Assign</button>
        </form>
       
    </td>
</tr>
<?php } ?>

</table>

<script>
function assignOrder(e, id){
    e.preventDefault();

    let agent_id = document.getElementById("agent" + id).value;

    if(agent_id == ""){
        alert("Select agent first");
        return;
    }

    fetch("/ecommerce_delivery_manager/api/assign_order.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "order_id=" + id + "&agent_id=" + agent_id
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        if(data.success){
            location.reload();
        }
    })
    .catch(err => {
        console.log(err);
        alert("Request failed!");
    });
}
</script>

</body>
</html>