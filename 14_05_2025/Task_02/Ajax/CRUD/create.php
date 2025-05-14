<?php
    include "config.php";

    if($token == getallheaders()['Authorization']) {
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);

        $sql = "INSERT INTO tbl_user(name,email) VALUES('$name','$email')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>