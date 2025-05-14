<?php

include 'config.php';
$headers = getallheaders();

if (isset($_SESSION['token']) && isset($headers['Authorization'])) {
    if ("Bearer ".$_SESSION['token'] != $headers['Authorization']) {
        echo "Invalid Token";
    } else {
        $city_like = $_POST['name'];

        $sel_queary = "SELECT * FROM customers WHERE City LIKE '%" . $city_like . "%'";
        $sel_result = $conn->query($sel_queary);
        if ($sel_result->num_rows > 0) {
            while ($row = $sel_result->fetch_assoc()) {
                echo "Customer Name is : " . $row['CustomerName'] . " - City is : " . $row['City'] . "<br>";
            }
        } else {
            echo "No result found";
        }
    }
}else{
    echo "Invalid Token";
}
