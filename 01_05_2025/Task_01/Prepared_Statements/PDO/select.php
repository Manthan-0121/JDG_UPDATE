<?php
include("config.php");

$selsql = "SELECT * FROM tbl_user_info WHERE id = ?";

$res = $conn->prepare($selsql);
$res->bindValue(1, 41, PDO::PARAM_INT);
$res->execute();

while ($row1 = $res->fetch(PDO::FETCH_OBJ)) {
    echo "<pre>";
    echo $row1->id . " - " . $row1->u_first_name . " - " . $row1->u_last_name . "<br>";
    echo "</pre>";
}


// while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
//     echo "<pre>";
//     print_r($row);
//     echo "</pre>";
// }
