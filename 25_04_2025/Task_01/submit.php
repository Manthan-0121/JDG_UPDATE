<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
    $hobbies = mysqli_real_escape_string($conn, $_POST["hobbies"]);
    $skills = mysqli_real_escape_string($conn, $_POST["skills"]);
    $txt_ddl_other = mysqli_real_escape_string($conn, $_POST["txt_ddl_other"]);

    if($txt_ddl_other == null){
        $final_hobby = $hobbies;
    } else {
        $final_hobby = $txt_ddl_other;
    }
    $ins_sql = "INSERT INTO tbl_user_info (u_first_name, u_last_name, u_email, u_mobile, u_hobby, u_skills) VALUES ('$fname', '$lname', '$email', '$mobile', '$final_hobby', '$skills')";
    $ins_result = mysqli_query($conn, $ins_sql) or die(mysqli_error($conn));
    if ($ins_result) {
        echo "1";
    } else {
        echo "Error inserting data: " . mysqli_error(mysql: $conn);
    }
    
    mysqli_close($conn);
}
