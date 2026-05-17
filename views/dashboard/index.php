<?php
require_once '../../config/session.php';
require_once '../../config/db.php';

/* DATA */
$pending = $conn->query("SELECT COUNT(*) as total FROM orders WHERE status='processing'")->fetch_assoc();
$active = $conn->query("SELECT COUNT(*) as total FROM delivery_assignments WHERE status='in_transit'")->fetch_assoc();
$delivered = $conn->query("SELECT COUNT(*) as total FROM delivery_assignments WHERE status='delivered'")->fetch_assoc();

/* NAVBAR INCLUDE */
include '../layouts/navbar.php';
?>

<link rel="stylesheet" href="/ecommerce_delivery_manager/assets/css/style.css">

<div class="main-content">

    <div class="dashboard-container">

        <h1 class="title"> Delivery Dashboard</h1>

        <div class="card-container">

            <div class="card pending">
                <h2> Pending</h2>
                <p><?php echo $pending['total']; ?></p>
            </div>

            <div class="card active">
                <h2> Active</h2>
                <p><?php echo $active['total']; ?></p>
            </div>

            <div class="card delivered">
                <h2> Delivered</h2>
                <p><?php echo $delivered['total']; ?></p>
            </div>

        </div>

    </div>

</div>