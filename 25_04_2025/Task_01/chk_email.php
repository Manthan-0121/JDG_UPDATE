<?php
include("config.php");

if (isset($_POST["txt_email"])) {
    $txt_email = mysqli_real_escape_string($conn, $_POST["txt_email"]);

    $query = "SELECT id FROM tbl_user_info WHERE u_email = '$txt_email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo 1;
    } else {
        echo 0;
    }
}
?>
