<?php
    include "config.php";

    if($token == getallheaders()['Authorization']) {
        $id = $_POST['edtid'];
        $name =$_POST['ename'];
        $email =$_POST['eemail'];

        $sql = "UPDATE tbl_user SET name = '$name', email = '$email' WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }else{
        echo "Invalid token";
    }
?>