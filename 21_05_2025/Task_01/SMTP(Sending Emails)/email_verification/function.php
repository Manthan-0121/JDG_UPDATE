<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'vendor/autoload.php';

function send_email($to, $subject, $body) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'manthan.jdg@gmail.com';
    $mail->Password = 'hsdnmgitkcsfcwcw';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->setFrom('manthan.jdg@gmail.com', 'Manthan Mistry');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $body;

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}
