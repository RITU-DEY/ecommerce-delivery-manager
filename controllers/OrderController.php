<?php

require_once '../config/db.php';
require_once '../models/OrderModel.php';

$model = new OrderModel($conn);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $result = $model->addOrder(
        $_POST['customer_name'],
        $_POST['phone'],
        $_POST['address'],
        $_POST['total_amount']
    );

    if($result){
        echo json_encode([
            "success" => true,
            "message" => "Order Added Successfully"
        ]);
    }else{
        echo json_encode([
            "success" => false,
            "message" => "Failed"
        ]);
    }
}

?>