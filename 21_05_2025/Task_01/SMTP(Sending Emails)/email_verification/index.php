<?php

include 'config.php';
include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Send Verification Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background-color: #fff;
            padding: 30px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 20px 15px;
            }

            input[type="email"],
            button {
                font-size: 14px;
                padding: 10px;
            }
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
    </style>
</head>

<body>

    <form class="form-container" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Send Verification Mail</h2>
        <div id="alert-box" class="alert" style="display: none;"></div>
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send Mail</button>
    </form>

    <script>
        // Function to show alerts
        function showAlert(type, message) {
            const alertBox = document.getElementById('alert-box');
            alertBox.className = 'alert alert-' + type;
            alertBox.textContent = message;
            alertBox.style.display = 'block';

            setTimeout(() => {
                alertBox.style.display = 'none';
            }, 4000);
        }
    </script>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tocken = bin2hex(random_bytes(16));
    $verification_time = date('Y-m-d H:i:s', strtotime('+10 Minutes'));
    $email = $_POST['email'];

    $ins_sql = "INSERT INTO tbl_tocken(verification_tocken,verification_time,verdification_email) VALUES(:tocken,:verification_time,:email)";
    $stmt = $conn->prepare($ins_sql);
    $stmt->bindParam(':tocken', $tocken, PDO::PARAM_STR);
    $stmt->bindParam(':verification_time', $verification_time, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $to = $email;
        $subject = "Email Verification Link";
        $VERIFICATION_LINK = $BASE_URL . "verify.php?tocken=" . urlencode($tocken);
        $message = "
            <!DOCTYPE html>
<html>

<head>
    <meta charset=\"UTF-8\">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f6;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .email-header {
            background-color: #4CAF50;
            padding: 20px;
            text-align: center;
            color: white;
        }

        .email-body {
            padding: 30px;
            color: #333333;
            line-height: 1.6;
        }

        .verify-button {
            display: inline-block;
            margin: 20px 0;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .email-footer {
            padding: 20px;
            text-align: center;
            background-color: #f1f1f1;
            font-size: 13px;
            color: #888;
        }
    </style>
</head>

<body>

    <div class=\"email-container\">
        <div class=\"email-header\">
            <h1>Verify Your Email</h1>
        </div>
        <div class=\"email-body\">
            <p>Hi there,</p>
            <p>Thank you for registering with us! Please confirm your email address by clicking the button below:</p>

            <p style=\"text-align: center;\">
                <a href=\"{$VERIFICATION_LINK}\" style=\"text-decoration: none; color: white;\" class=\"verify-button\">Verify Email</a>
            </p>

            <p>If you didn’t create an account, you can safely ignore this email.</p>
            <p>Thanks,<br>Manthan Mistry</p>
        </div>
        <div class=\"email-footer\">
            &copy; 2025 Manthan Mistry. All rights reserved.
        </div>
    </div>

</body>

</html>
        ";
        if(send_email($to, $subject, $message)){
            echo '<script>showAlert("success", "Email sent successfully");</script>';
        }else{
            echo '<script>showAlert("error", "Failed to send email");</script>';
        }
        
    } else {
        echo '<script>showAlert("error", "Failed to send email");</script>';
    }
}
?>