<?php
    include ("config.php");
    $id = 39;
    $delsql = "DELETE FROM `tbl_user_info` WHERE id = ?";
    $stmt = $conn->prepare($delsql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo "Record deleted successfully";
?>