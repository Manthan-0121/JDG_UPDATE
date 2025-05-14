<?php
    include "config.php";

    $query = "DELETE FROM tbl_user WHERE id = " . $_POST['id'];
    if ($conn->query($query) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
?>