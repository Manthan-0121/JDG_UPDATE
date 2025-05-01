<?php

include("config.php");

$fname = "Manthan";
$lname = "Mistry";
$email = "manthan@gmail.com";
$inssql = "INSERT INTO tbl_user_info(u_first_name, u_last_name, u_email) VALUES (?,?,?)";
$stmt = $conn->prepare($inssql);
$stmt->bind_param("sss", $fname, $lname, $email);
// $stmt->execute() or die(mysqli_error($conn));
if ($stmt->execute() === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Data insertion failed: " . $conn->error;
}
$stmt->close();
$conn->close();