<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prepared_statementsdb";
// MySQLi Object-Oriented

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
