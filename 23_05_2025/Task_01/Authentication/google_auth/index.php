<?php
require_once 'config.php';
session_start();

$auth_url = "https://accounts.google.com/o/oauth2/v2/auth?" . http_build_query([
    'client_id'     => GOOGLE_CLIENT_ID,
    'redirect_uri'  => GOOGLE_REDIRECT_URI,
    'response_type' => 'code',
    'scope'         => 'email profile',
    'access_type'   => 'offline',
    'prompt'        => 'select_account'
]);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Google Login</title>
</head>

<body>

    <?php if (!isset($_SESSION['user'])): ?>
        <h2>Login with Google</h2>
        <a href="<?= htmlspecialchars($auth_url) ?>">
            <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" alt="Sign in with Google">
        </a>
    <?php else: ?>
        <h2>Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?></h2>
        <img src="<?= htmlspecialchars($_SESSION['user']['picture']) ?>" alt="Profile Picture" width="100"><br>
        <p>Email: <?= htmlspecialchars($_SESSION['user']['email']) ?></p>
        <p><a href="logout.php">Logout</a></p>
    <?php endif; ?>

</body>

</html>