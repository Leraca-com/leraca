<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

include 'class.php';
include 'functionality.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

    
        

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '1d79da1511a7ff';                     // SMTP username
    $mail->Password   = '531084878f1bfe';                               // SMTP password
    $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 2525;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    // email of user booking hotel
    $mail->setFrom('from@example.com', 'Mailer');
    // ends here 
    $mail->addAddress('Leraca03@gmail.com', 'Leraca Hotel');     // Add a recipient
    

   
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'LERACA';
    $mail->Body    = "$hotel";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>