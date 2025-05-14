<?php

include "config.php";

if ($token == getallheaders()['Authorization']) {
    $sql = "SELECT * FROM tbl_user WHERE id = " . $_POST['id'];
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "No records found";
    }
}else {
    echo "Invalid token";
}
?>