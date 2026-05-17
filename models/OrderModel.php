<?php

class OrderModel {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function addOrder($name, $phone, $address, $amount){

        $status = "pending";

        $stmt = $this->conn->prepare("
            INSERT INTO orders (
                customer_name,
                phone,
                address,
                total_amount,
                status
            )
            VALUES (?, ?, ?, ?, ?)
        ");

        
        if(!$stmt){
            die("Prepare Failed: " . $this->conn->error);
        }

        
        $stmt->bind_param(
            "sssss",
            $name,
            $phone,
            $address,
            $amount,
            $status
        );

        // execute check
        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
}

?>