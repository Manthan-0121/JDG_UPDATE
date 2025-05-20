<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Content-Type: application/json");

try {
    $conn = new PDO("mysql:host=localhost;dbname=practice_db", "root", "");
} catch (Exception $e) {
    echo json_encode(["status" => 0, "message" => $e->getMessage()]);
    exit;
}

// get data from JSON input
$data = json_decode(file_get_contents("php://input"), true);

$id =  null;
$name = null;
$email = null;

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {
    // POST data from form data ($_POST)
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;

    if ($email == null || $name == null) {
        $response = ["status" => 0, "message" => "Give proper data"];
    } else {
        $sel_ins_sql = "SELECT * FROM users WHERE email = :email";
        $sel_ins_query = $conn->prepare($sel_ins_sql);
        $sel_ins_query->bindParam(":email", $email, PDO::PARAM_STR);
        $sel_ins_query->execute();

        if ($sel_ins_query->rowCount() > 0) {
            $response = ["status" => 0, "message" => "Email Already Exists"];
        } else {
            $ins_sql = "INSERT INTO users(name, email) VALUES(:name, :email)";
            $ins_query = $conn->prepare($ins_sql);
            $ins_query->bindParam(":name", $name, PDO::PARAM_STR);
            $ins_query->bindParam(":email", $email, PDO::PARAM_STR);
            $ins_query->execute();

            if ($ins_query->rowCount() > 0) {
                $response = ["status" => 1, "message" => "Data Inserted"];
            } else {
                $response = ["status" => 0, "message" => "Data Not Inserted"];
            }
        }
    }
    echo json_encode($response);
    exit();
} elseif ($method == "GET") {
    // Fetch users (no filters currently)
    $sel_sql = "SELECT * FROM users";
    $sel_query = $conn->prepare($sel_sql);
    $sel_query->execute();
    $sel_result = $sel_query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($sel_result);
} elseif ($method == "PUT") {
    // PUT expects ID in URL query params, name/email in JSON body
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $name = isset($data['name']) ? $data['name'] : null;
    $email = isset($data['email']) ? $data['email'] : null;

    if ($id == null) {
        $response = ["status" => 0, "message" => "Give proper data"];
    } else {
        $sel_sql = "SELECT * FROM users WHERE id = :id";
        $sel_query = $conn->prepare($sel_sql);
        $sel_query->bindParam(":id", $id, PDO::PARAM_INT);
        $sel_query->execute();
        $sel_result = $sel_query->fetch(PDO::FETCH_ASSOC);

        if ($sel_query->rowCount() > 0) {
            if ($email == null) {
                $email = $sel_result['email'];
            }
            if ($name == null) {
                $name = $sel_result['name'];
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
} elseif ($method == "DELETE") {
    $id = isset($data['id']) ? $data['id'] : null;

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
