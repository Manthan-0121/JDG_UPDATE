<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=practice_db', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
date_default_timezone_set('Asia/Kolkata');
$BASE_URL = "http://localhost/Manthan/JDG_UPDATE/21_05_2025/Task_01/SMTP(Sending%20Emails)/email_verification/";
?>