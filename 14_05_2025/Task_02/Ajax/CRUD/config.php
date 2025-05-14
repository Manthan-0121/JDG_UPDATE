<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practice_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$token = "Bearer 59fd710f678bf5c597a13910a5394913";
?>