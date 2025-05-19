<?php
include "./includes/config.php";
session_start();
if ($_GET['id']) {
    $id = $_GET['id'];

    $sel_sql = "SELECT * FROM tbl_business_category WHERE id = :id";
    $stmt = $conn->prepare($sel_sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row_res = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row_res['id'] == $id) {
        $del_sql = "DELETE FROM tbl_business_category WHERE id = :id";
        $stmt = $conn->prepare($del_sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $_SESSION['success'] = "Business Category deleted successfully!";
            echo "<script>window.location.href = 'show_business_category.php';</script>";
        } else {
            echo "<script>alert('Failed to delete Business Category!')</script>";
        }
    }
} else {
    echo "<script>window.location.href = 'show_business_category.php';</script>";
}