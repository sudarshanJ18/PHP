<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = htmlspecialchars(trim($_POST['userName']));
    $userEmail = htmlspecialchars(trim($_POST['userEmail']));
    $userPhone = htmlspecialchars(trim($_POST['userPhone']));
    $userMsg = htmlspecialchars(trim($_POST['userMsg']));

    if (empty($userName) || empty($userEmail) || empty($userMsg)) {
        echo "All fields are required!";
        exit;
    }

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'jsudarshanreddy2003@gmail.com'; 
        $mail->Password = 'hrka clfw ldlk xwws'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($userEmail, $userName);
        $mail->addAddress('shuttercloud14@gmail.com', 'Recipient Name'); // Add recipient
        $mail->Subject = "New Contact Form Message from " . $userName;
        $mail->Body    = "Name: $userName\nEmail: $userEmail\nPhone: $userPhone\n\nMessage:\n$userMsg";

        $mail->send();

        header("Location: thank-you.php"); 
        exit;
    } catch (Exception $e) {
        echo "There was an error sending your message. Please try again later.";
    }
}
?>
