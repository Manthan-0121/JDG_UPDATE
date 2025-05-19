<?php

header("Access-Control-Allow-Origin: 127.0.0.1");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");

try {
    $conn = new PDO("mysql:host=localhost;dbname=practice_db", "root", "");
} catch (Exception $e) {
    echo $e->getMessage();
}

// get data 
$data = json_decode(file_get_contents("php://input"));
$id = isset($data->id) ? $data->id : null;
$name = isset($data->name) ? $data->name : null;
$email = isset($data->email) ? $data->email : null;

// get method
$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {
    if ($email == null || $name == null) { // checking null
        $response = ["status" => 0, "message" => "Give proper data"];
    } else {
        $sel_ins_sql = "SELECT * FROM users WHERE email = :email";
        $sel_ins_query = $conn->prepare($sel_ins_sql);
        $sel_ins_query->bindParam(":email", $email, PDO::PARAM_STR);
        $sel_ins_query->execute();
        if ($sel_ins_query->rowCount() > 0) { // check email already exists
            $response = ["status" => 0, "message" => "Email Already Exists"];
        } else {
            $ins_sql = "INSERT INTO users(name, email) VALUES(:name, :email)";
            $ins_query = $conn->prepare($ins_sql);
            $ins_query->bindParam(":name", $name, PDO::PARAM_STR);
            $ins_query->bindParam(":email", $email, PDO::PARAM_STR);
            $ins_query->execute();

            if ($ins_query->rowCount() > 0) { // check data inserted
                $response = ["status" => 1, "message" => "Data Inserted"];
            } else {
                $response = ["status" => 0, "message" => "Data Not Inserted"];
            }
        }
    }
    echo json_encode($response);
    exit();

    // get all data
} elseif ($method == "GET") {

    $sel_sql = "SELECT * FROM users";
    $sel_query = $conn->prepare($sel_sql);
    $sel_query->execute();
    $sel_result = $sel_query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($sel_result);

    // update data
} elseif ($method == "PUT") {
    if ($id == null) {
        $response = ["status" => 0, "message" => "Give proper data"];
    } else {
        $sel_sql = "SELECT * FROM users WHERE id = :id";
        $sel_query = $conn->prepare($sel_sql);
        $sel_query->bindParam(":id", $id, PDO::PARAM_INT);
        $sel_query->execute();
        $sel_result = $sel_query->fetchAll(PDO::FETCH_ASSOC);
        if ($sel_query->rowCount() > 0) {
            if ($email == null) {
                $email = $sel_result[0]['email'];
            }
            if ($name == null) {
                $name = $sel_result[0]['name'];
            }
            $up_sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
            $up_query = $conn->prepare($up_sql);
            $up_query->bindParam(":name", $name, PDO::PARAM_STR);
            $up_query->bindParam(":email", $email, PDO::PARAM_STR);
            $up_query->bindParam(":id", $id, PDO::PARAM_INT);
            $up_query->execute();
            if ($up_query->rowCount() > 0) {
                $response = ["status" => 1, "message" => "Data Updated"];
            } else {
                $response = ["status" => 0, "message" => "Data Not Updated"];
            }
        } else {
            $response = ["status" => 0, "message" => "Data Not Found"];
        }
    }
    echo json_encode($response);

    // delete data
} elseif ($method == "DELETE") {
    if ($id == null) {
        $response = ["status" => 0, "message" => "Give proper data"];
    } else {
        $del_sql = "DELETE FROM users WHERE id = :id";
        $del_query = $conn->prepare($del_sql);
        $del_query->bindParam(":id", $id, PDO::PARAM_INT);
        $del_query->execute();
        if ($del_query->rowCount() > 0) {
            $response = ["status" => 1, "message" => "Data Deleted"];
        } else {
            $response = ["status" => 0, "message" => "Data Not Deleted"];
        }
    }
    echo json_encode($response);
} else {
    echo json_encode(["status" => 0, "message" => "Invalid Method"]);
}
