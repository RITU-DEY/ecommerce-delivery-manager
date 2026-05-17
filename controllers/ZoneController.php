<?php

require_once '../config/db.php';

if(isset($_POST['addZone'])){

    $zone = $_POST['zone_name'];
    $fee = $_POST['fee'];
    $days = $_POST['days'];

    $stmt = $conn->prepare(
        "INSERT INTO delivery_zones(
            zone_name,
            delivery_fee,
            estimated_days
        )
        VALUES(?,?,?)"
    );

    $stmt->bind_param(
        "sdi",
        $zone,
        $fee,
        $days
    );

    $stmt->execute();

    echo "Zone Added";
}

?>