<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">
<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label><span class="text-danger">*</span>
                                        <input id="first_name" type="text" class="form-control" name="first_name" required autofocus>
                                        <div class="invalid-feedback">Please enter your first name</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input id="middle_name" type="text" class="form-control" name="middle_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">Last Name</label><span class="text-danger">*</span>
                                        <input id="last_name" type="text" class="form-control" name="last_name" required>
                                        <div class="invalid-feedback">Please enter your last name</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label><span class="text-danger">*</span>
                                        <input id="email" type="email" class="form-control" name="email" required>
                                        <div class="invalid-feedback">Please enter a valid email</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input id="mobile" type="text" class="form-control" name="mobile">
                                        <div class="invalid-feedback">Please enter your mobile number</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group">
                                            <input id="password" type="password" class="form-control" name="password" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary toggle-password" type="button" onclick="togglePassword('password')">
                                                    Show
                                                </button>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">Please enter a password</div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Already have an account? <a href="login.php">Login Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>

    <script>
        function togglePassword(fieldId) {
            const input = document.getElementById(fieldId);
            const button = input.nextElementSibling.querySelector('button, .toggle-password');
            if (input.type === 'password') {
                input.type = 'text';
                button.textContent = 'Hide';
            } else {
                input.type = 'password';
                button.textContent = 'Show';
            }
        }
    </script>

</body>

</html>

<?php
include "./includes/config.php";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO tbl_user (first_name, middle_name, last_name, email, mobile, password) VALUES (:fname, :mname, :lname, :email, :mobile, :pwd)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":fname", $first_name);
    $stmt->bindParam(":mname", $middle_name);
    $stmt->bindParam(":lname", $last_name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":mobile", $mobile);
    $stmt->bindParam(":pwd", $password);
    $stmt->execute();
    $ls_id = $conn->lastInsertId();
    $token = bin2hex(random_bytes(15));

    //add date 
    $now = new DateTime();
    $now->add(new DateInterval('PT10M'));
    $timePlus10 = $now->format('Y-m-d H:i:s');

    //insert tbl_verification 
    $ins_verify_link = "INSERT INTO tbl_verification (user_id, verification_time, token) VALUES (:uid, :vtime, :token)";
    $stmt = $conn->prepare($ins_verify_link);
    $stmt->bindParam(":uid", $ls_id);
    $stmt->bindParam(":vtime", $timePlus10);
    $stmt->bindParam(":token", $token);
    $stmt->execute();

    // send verification mail
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'manthan.jdg@gmail.com';
        $mail->Password   = 'hsdnmgitkcsfcwcw';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('manthan.jdg@gmail.com', 'Manthan Mistry');
        $mail->addAddress("2almire@chefalicious.com", "$first_name $last_name");
        $verify_link = "http://localhost/manthan/JDG_UPDATE/12_05_2025/Task_02/verify.php?token=$token";;
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification Required';
        $mail->Body    = "
            <html>
    <head>
      <style>
        .btn {
          background-color: #007bff;
          color: white;
          padding: 10px 20px;
          text-decoration: none;
          border-radius: 4px;
        }
      </style>
    </head>
    <body>
      <h2>Hello, $first_name $last_name</h2>
      <p>Thank you for registering. To complete your registration, please verify your email address by clicking the button below:</p>
      <p><a href='$verify_link' class='btn'>Verify Email</a></p>
      <p>If the button doesn\’t work, copy and paste this URL into your browser:</p>
      <p><a href='$verify_link'>$verify_link</a></p>
      <hr>
      <p>If you did not request this, please ignore this email.</p>
    </body>
  </html>
        ";
        $mail->AltBody = "Hello $user_name,\nPlease verify your email using this link: $verify_link\nIf you did not request this, ignore this email.";

        $mail->send();
        echo 'Email has been sent successfully!';
    } catch (Exception $e) {
        echo "Email could not be sent. Error: {$mail->ErrorInfo}";
    }
?>
    <script>
        // window.location.href = "login.php";
    </script>
<?php
}
?>