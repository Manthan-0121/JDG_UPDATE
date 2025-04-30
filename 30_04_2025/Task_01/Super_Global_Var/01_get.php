<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #89f7fe, #66a6ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-wrapper {
            background: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-wrapper h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            color: #333;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #777;
        }

        .input-group input {
            width: 100%;
            padding: 10px 12px 10px 36px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f8f8f8;
            transition: border 0.3s ease;
        }

        .input-group input:focus {
            outline: none;
            border-color: #66a6ff;
            background-color: #fff;
        }

        .form-wrapper input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .form-wrapper input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="form-wrapper">
        <h2>Welcome Back</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" autocomplete="off">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="txt_email" placeholder="Email address" autocomplete="off" required />
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="txt_password" placeholder="Password" autocomplete="new-password" required />
            </div>

            <input type="submit" value="Login" />
        </form>
    </div>
</body>

</html>

<?php
if (isset($_GET['txt_email'])) {
    print_r($_GET);
}
?>