<?php
session_start();

require_once 'config.php';

if (!isset($_GET['code'])) {
    echo "No code found in URL.";
    exit;
}

$code = $_GET['code'];
$token_url = 'https://oauth2.googleapis.com/token';
$token_data = [
    'code'          => $code,
    'client_id'     => GOOGLE_CLIENT_ID,
    'client_secret' => GOOGLE_CLIENT_SECRET,
    'redirect_uri'  => GOOGLE_REDIRECT_URI,
    'grant_type'    => 'authorization_code'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$token_response = json_decode($response, true);

if (!isset($token_response['access_token'])) {
    echo "Error fetching access token.";
    print_r($token_response);
    exit;
}
// Fetch user info
$user_info_url = 'https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token=' . $token_response['access_token'];
$user_info = json_decode(file_get_contents($user_info_url), true);

// Store in session
$_SESSION['user'] = $user_info;

// Redirect to homepage
header('Location: index.php');
exit;
