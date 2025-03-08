<?php
// Include PHPMailer files
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true); // Create a new PHPMailer instance

try {
    //Server settings
    $mail->isSMTP();                                     // Set mailer to use SMTP
    $mail->Host       = 'smtp.porkbun.com';              // SMTP server for Porkbun
    $mail->SMTPAuth   = true;                            // Enable SMTP authentication
    $mail->Username   = 'info@michiprop.com';        // SMTP username (your Porkbun email)
    $mail->Password   = 'Michiprop123.,';           // SMTP password (your Porkbun email password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
    $mail->Port       = 50587;                             // TCP port to connect to

    //Recipients
    $mail->setFrom('info@michiprop.com', 'Michiprop');         // Sender's email address and name
    $mail->addAddress('info@michiprop.com', 'Recipient'); // Recipient's email and name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Email from Porkbun SMTP';
    $mail->Body    = 'This is a test email sent using <b>smtp.porkbun.com</b> on Porkbun hosting.';
    $mail->AltBody = 'This is a test email sent using smtp.porkbun.com on Porkbun hosting.'; // Plain text for non-HTML clients

    $mail->SMTPDebug = 2;

    // Send the email
    $mail->send();
    echo 'Message has been sent successfully';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
