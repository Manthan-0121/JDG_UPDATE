<?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=business_digital_card_db","root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    date_default_timezone_set("Asia/Kolkata");
?>