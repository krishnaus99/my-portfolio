<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'krishnaus2499@gmail.com';
        $mail->Password = 'wosj gidg fvmd hxqg';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('krishnaus2499@gmail.com', 'Krishna');
        $mail->addAddress('krishnaus2499@gmail.com', 'Krishna');

        $mail->isHTML(true);
        $mail->Subject = 'New Submission Recived';

        $mail->Body = "Name: $name<br>Email: $email<br>Message: $message";
        $mail->AltBody = "Name: $name\Email: $email\nMessage: $message";
        $mail->send();
        header('Location: ../index.html');
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


?>