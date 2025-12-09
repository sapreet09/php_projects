<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/PHPMailer.php';
require 'vendor/PHPMailer/Exception.php';
require 'vendor/PHPMailer/SMTP.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspeacialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if(empty($name) || empty($email) || empty($message)) {
        header("Location: contact.php?error=1");
        exit;
    }

    $emailBody = "
        <h3>New Contact Form Submission</h3>
        <p><strong>Name: </strong> $name</p>
        <p><strong>Email: </strong> $email</p>
        <p><strong>Message: </strong><br> $message </p>
    ";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sapreetk09@gmail.com';
        $mail->Password = 'sapreetdhanoA@09';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('sapreetk09@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = $emailBody;

        $mail->send;

        header("Location: contact.php?success=1");
        exit;
    } catch(Exception $e) {
        header("Location: contact.php?error=1");
        exit;
    }
}


?>