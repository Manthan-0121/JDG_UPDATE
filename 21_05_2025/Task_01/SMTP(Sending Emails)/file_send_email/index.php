<?php
include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Send Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CDN (optional, for styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="alert alert-success d-none" id="feedbackMsg">
            <strong>Success!</strong> Email sent successfully.
        </div>
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Send Email</h4>
            </div>

            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="to" class="form-label">To</label>
                        <input type="email" class="form-control" id="to" name="to" required>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>  

                    <div class="mb-3">
                        <label for="attachment" class="form-label">File Attachment</label>
                        <input type="file" class="form-control" id="attachment" name="attachment">
                    </div>

                    <button type="submit" class="btn btn-success w-100">Send Mail</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST["to"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $attachment = $_FILES["attachment"]["tmp_name"];
    if(move_uploaded_file($attachment,  $_FILES["attachment"]["name"])) {
        $attachment = $_FILES["attachment"]["name"];
    }
    if (send_email($to, $subject, $message, $attachment)) {
        echo "<script>document.getElementById('feedbackMsg').classList.remove('d-none');</script>";
        unlink($attachment);
    } else {
        echo "<script>alert('Failed to send email. Please try again.');</script>";
    }
}
?>