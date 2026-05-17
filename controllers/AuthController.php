<?php

session_start();
require_once '../config/db.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE email=?"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password_hash'])){

            $_SESSION['user'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['user_id'] = $user['id'];

            header("Location: ../views/dashboard/index.php");
             }else{
            echo "Wrong Password";
        }

    }else{
        echo "User Not Found";
    }
}

?>