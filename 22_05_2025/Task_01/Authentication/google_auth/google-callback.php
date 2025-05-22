<?php
// Get the ID token sent via POST from Google's script
$id_token = $_POST['credential'];
$client_id = '189005845558-1u1gnmi77nl8f45oqn8f6rs012v0vh4v.apps.googleusercontent.com';

// Verify token with Google
$verify_url = "https://oauth2.googleapis.com/tokeninfo?id_token=" . $id_token;
$response = file_get_contents($verify_url);
$data = json_decode($response, true);

// Validate token audience
if ($data['aud'] == $client_id) {
    // Token is valid, retrieve user info
    $email = $data['email'];
    $name = $data['name'];
    $google_id = $data['sub'];

    // Here you can check if the user already exists in your database
    // If not, you can create a new user record

    // print_r($data);

    session_start();
    $_SESSION['user_email'] = $email;
    $_SESSION['user_name'] = $name;

    // header("Location: dashboard.php"); // Or your homepage
    // exit;
} else {
    echo "Invalid Token";
}
