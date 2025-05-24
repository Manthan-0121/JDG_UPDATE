<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Content-Type: application/json");

require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$jwt_secret_key = "e1a4279e3cf6430dc2483a1b5dc835e9a7cde144bd618a0dd4b1a1e541c0e5cb";

function createJWT($userId, $email) {
    global $jwt_secret_key;
    $payload = [
        "iss" => "localhost",
        "aud" => "localhost",
        "iat" => time(),
        "exp" => time() + (60 * 60),
        "data" => [
            "id" => $userId,
            "email" => $email
        ]
    ];
    return JWT::encode($payload, $jwt_secret_key, 'HS256');
}

function verifyJWT($jwt) {
    global $jwt_secret_key;
    return JWT::decode($jwt, new Key($jwt_secret_key, 'HS256'));
}

try {
    $conn = new PDO("mysql:host=localhost;dbname=practice_db", "root", "");
} catch (Exception $e) {
    echo json_encode(["status" => 0, "message" => $e->getMessage()]);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"), true);
$action = $_GET['action'] ?? '';

if (!($method === "POST" && $action === "login")) {
    $headers = getallheaders();
    $authHeader = $headers['Authorization'] ?? '';

    if (!preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
        echo json_encode(["status" => 0, "message" => "Token Required"]);
        exit;
    }

    try {
        $decoded = verifyJWT($matches[1]);
    } catch (Exception $e) {
        echo json_encode(["status" => 0, "message" => "Invalid Token", "error" => $e->getMessage()]);
        exit;
    }
}

if ($method == "POST" && $action === "login") {
    $email = $_POST['email'] ?? null;

    $sel_sql = "SELECT * FROM users WHERE email = :email";
    $sel_query = $conn->prepare($sel_sql);
    $sel_query->bindParam(":email", $email, PDO::PARAM_STR);
    $sel_query->execute();
    $user = $sel_query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $token = createJWT($user['id'], $user['email']);
        echo json_encode(["status" => 1, "token" => $token]);
    } else {
        echo json_encode(["status" => 0, "message" => "User not found"]);
    }
    exit;
}

if ($method == "POST") {
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;

    if (!$name || !$email) {
        echo json_encode(["status" => 0, "message" => "Give proper data"]);
        exit;
    }

    $check_sql = "SELECT * FROM users WHERE email = :email";
    $check_query = $conn->prepare($check_sql);
    $check_query->bindParam(":email", $email);
    $check_query->execute();

    if ($check_query->rowCount() > 0) {
        echo json_encode(["status" => 0, "message" => "Email Already Exists"]);
    } else {
        $ins_sql = "INSERT INTO users(name, email) VALUES(:name, :email)";
        $ins_query = $conn->prepare($ins_sql);
        $ins_query->bindParam(":name", $name);
        $ins_query->bindParam(":email", $email);
        $ins_query->execute();

        echo json_encode([
            "status" => $ins_query->rowCount() > 0 ? 1 : 0,
            "message" => $ins_query->rowCount() > 0 ? "Data Inserted" : "Data Not Inserted"
        ]);
    }
} elseif ($method == "GET") {
    $sel_sql = "SELECT * FROM users";
    $sel_query = $conn->prepare($sel_sql);
    $sel_query->execute();
    $sel_result = $sel_query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($sel_result);
} elseif ($method == "PUT") {
    $id = $_GET['id'] ?? null;
    $name = $data['name'] ?? null;
    $email = $data['email'] ?? null;

    if (!$id) {
        echo json_encode(["status" => 0, "message" => "Give proper data"]);
        exit;
    }

    $sel_sql = "SELECT * FROM users WHERE id = :id";
    $sel_query = $conn->prepare($sel_sql);
    $sel_query->bindParam(":id", $id, PDO::PARAM_INT);
    $sel_query->execute();
    $user = $sel_query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $name = $name ?? $user['name'];
        $email = $email ?? $user['email'];

        $up_sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $up_query = $conn->prepare($up_sql);
        $up_query->bindParam(":name", $name);
        $up_query->bindParam(":email", $email);
        $up_query->bindParam(":id", $id, PDO::PARAM_INT);
        $up_query->execute();

        echo json_encode([
            "status" => $up_query->rowCount() > 0 ? 1 : 0,
            "message" => $up_query->rowCount() > 0 ? "Data Updated" : "Data Not Updated"
        ]);
    } else {
        echo json_encode(["status" => 0, "message" => "Data Not Found"]);
    }
} elseif ($method == "DELETE") {
    $id = $data['id'] ?? null;

    if (!$id) {
        echo json_encode(["status" => 0, "message" => "Give proper data"]);
        exit;
    }

    $del_sql = "DELETE FROM users WHERE id = :id";
    $del_query = $conn->prepare($del_sql);
    $del_query->bindParam(":id", $id);
    $del_query->execute();

    echo json_encode([
        "status" => $del_query->rowCount() > 0 ? 1 : 0,
        "message" => $del_query->rowCount() > 0 ? "Data Deleted" : "Data Not Deleted"
    ]);
} else {
    echo json_encode(["status" => 0, "message" => "Invalid Method"]);
}
