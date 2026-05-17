<?php
require_once "../config/db.php";

header('Content-Type: application/json');

if(!isset($_POST['order_id']) || !isset($_POST['agent_id'])){
    echo json_encode([
        "success" => false,
        "message" => "Missing POST data"
    ]);
    exit;
}

$order_id = (int) $_POST['order_id'];
$agent_id = (int) $_POST['agent_id'];

$stmt = $conn->prepare("
    INSERT INTO delivery_assignments (order_id, agent_id, status, assigned_at)
    VALUES (?, ?, 'assigned', NOW())
");
$stmt->bind_param("ii", $order_id, $agent_id);
$insert = $stmt->execute();

if(!$insert){
    echo json_encode([
        "success" => false,
        "message" => "Insert failed: " . $conn->error
    ]);
    exit;
}

$stmt2 = $conn->prepare("
    UPDATE orders 
    SET status='assigned'
    WHERE id=?
");
$stmt2->bind_param("i", $order_id);
$update = $stmt2->execute();

if(!$update){
    echo json_encode([
        "success" => false,
        "message" => "Order update failed: " . $conn->error
    ]);
    exit;
}

echo json_encode([
    "success" => true,
    "message" => "Order assigned successfully"
]);
?>