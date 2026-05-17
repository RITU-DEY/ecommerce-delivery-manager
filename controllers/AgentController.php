<?php

require_once __DIR__ . '/../config/db.php';

if(isset($_POST['addAgent'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    
    $address = $_POST['vehicle'];

    $status = "Active";

    $stmt = $conn->prepare("
        INSERT INTO agents
        (name, phone, email, address, status)
        VALUES (?, ?, ?, ?, ?)
    ");

    if(!$stmt){
        die("Prepare Failed: " . $conn->error);
    }

    $stmt->bind_param(
        "sssss",
        $name,
        $phone,
        $email,
        $address,
        $status
    );

    if($stmt->execute()){

        header("Location: ../views/agents/index.php");
        exit();

    }else{

        die("Insert Failed: " . $stmt->error);

    }
}
?>