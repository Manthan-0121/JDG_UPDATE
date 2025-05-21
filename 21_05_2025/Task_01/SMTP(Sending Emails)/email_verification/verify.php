<?php
include 'config.php';

if (isset($_GET['tocken'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Verification Successful</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: 'Segoe UI', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .success-container {
                background: #fff;
                padding: 40px;
                border-radius: 10px;
                text-align: center;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                width: 90%;
            }

            .unsuccess-text {
                color: red;
            }

            .success-container .success-text {
                color: #4CAF50;
                font-size: 28px;
                margin-bottom: 20px;
            }

            .success-container p {
                font-size: 16px;
                color: #555;
                margin-bottom: 30px;
            }

            .success-container a {
                display: inline-block;
                padding: 12px 24px;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                border-radius: 6px;
                font-weight: bold;
                transition: background-color 0.3s ease;
            }

            .success-container a:hover {
                background-color: #43a047;
            }
        </style>
    </head>

    <body>

        <?php
        $tocken = $_GET['tocken'];

        $sql = "SELECT * FROM tbl_tocken WHERE verification_tocken = :tocken";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tocken', $tocken, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $verification_time = $row['verification_time'];
            $email = $row['verdification_email'];
            $verification_status = $row['verification_status'];
            $current_time = date('Y-m-d H:i:s');

            if ($verification_status == 1) {
                echo '<div class="success-container">
                        <h1 class="success-text">✅ Email Verified</h1>
                        <p>Your email has already been verified. Thank you for confirming your address.</p>
                        <a href="#">Go to Login</a>
                    </div>';
            } else {
                if ($verification_time > $current_time) {

                    $sql = "UPDATE tbl_tocken SET verification_status = 1 WHERE verdification_email = :email";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->execute();

        ?>
                    <div class="success-container">
                        <h1 class="success-text">✅ Email Verified</h1>
                        <p>Your email has been successfully verified. Thank you for confirming your address.</p>
                        <a href="#">Go to Login</a>
                    </div>
                <?php
                } else {
                ?>
                    <div class="success-container">
                        <h1 class="unsuccess-text">❌ Email Verification Failed</h1>
                        <p>The verification link has expired. Please request a new verification email.</p>
                        <a href="#">Go to Login</a>
                    </div>
            <?php
                }
            }
        } else {
            ?>
            <div class="success-container">
                <h1 class="unsuccess-text">❌ Email Verification Failed</h1>
                <p>The verification link is invalid. Please request a new verification email.</p>
                <a href="#">Go to Login</a>
            </div>
        <?php
        }
        ?>

    </body>

    </html>
<?php
}
