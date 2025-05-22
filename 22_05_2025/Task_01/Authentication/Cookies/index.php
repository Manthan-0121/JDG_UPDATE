<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["email"] == "demo@gmail.com" && $_POST["password"] == "123456") {
            $_COOKIE['email'] = base64_encode($_POST['email']);
            $_COOKIE['password'] = base64_encode($_POST['password']);
            setcookie('email', $_COOKIE['email'], time() + (60 * 30), "/");
            setcookie('password', $_COOKIE['password'], time() + (60 * 30), "/");
            echo "<script>alert('Login successful');</script>";
            echo "<script>window.location.href='welcome.php';</script>";
        }else {
            echo "<script>alert('Invalid email or password');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responsive Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <h3 class="text-center mb-4">Login</h3>
            <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="Enter your email"
                        name="email"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        placeholder="Enter your password"
                        name="password"
                        required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

</body>

</html>


