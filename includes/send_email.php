<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Load Composer's autoloader
require 'Mailer/PHPMailer.php';
require 'Mailer/Exception.php';
require 'Mailer/SMTP.php';

function sendEmail($email, $type)
{




    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    //$mail->AddEmbeddedImage(__DIR__ . "/../$sPropertyImg", 'Property'); //embed an image in the email
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = '';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '';                     // SMTP username
        $mail->Password   = '';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('php.auto.sender.email@gmail.com', 'Dont-Reply');
        $mail->addAddress("$email", '');     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        if ($type = "customer") {
            $mail->Subject = 'A driver has been assigned.';
            $mail->Body    = "Hello, a driver has been informed to pick up your shipment later today.";
        } else if ($type = "driver") {
            $mail->Subject = 'A pickup assignment.';
            $mail->Body    = "Hello, you have been assigned to pick up a shipment.";
        }

        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
