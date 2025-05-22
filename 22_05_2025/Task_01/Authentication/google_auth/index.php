<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Button</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>

    <!-- Load Google Identity Services -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    
    <!-- Auto login configuration -->
    <div id="g_id_onload"
        data-client_id="189005845558-1u1gnmi77nl8f45oqn8f6rs012v0vh4v.apps.googleusercontent.com"
        data-login_uri="http://localhost/Manthan/JDG_UPDATE/22_05_2025/Task_01/Authentication/google_auth/google-callback.php"
        data-auto_prompt="false">
    </div>
    <!-- Sign in button -->
    <div class="g_id_signin"
        data-type="standard"
        data-size="large"
        data-theme="outline"
        data-text="sign_in_with"
        data-shape="rectangular"
        data-logo_alignment="left">
    </div>

</body>

</html>
