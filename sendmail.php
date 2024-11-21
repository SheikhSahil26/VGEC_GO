<?php
// Include the PHPMailer classes
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Create an instance of PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
    // Set up the SMTP connection
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Set the SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'sahilsheikh47359@gmail.com';  // Your Gmail address
    $mail->Password = 'fuiy djqi abmm euwu';    // App password (if using 2FA)
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Set the email sender and recipient
    $mail->setFrom('sahilsheikh47359@gmail.com', 'sahil sheikh');
    $mail->addAddress('jaidevs2107@gmail.com');  // Recipient email address

    //html content 

    $htmlContent = "
    <html>
        <head>
            <title>HTML Email</title>
        </head>
        <body>
            <h1 style='color: blue;'>Hello, this is a test email with HTML content!</h1>
            <p>This is an example of an <strong>HTML</strong> email body.</p>
            <p><a href='https://www.example.com' target='_blank'>Click here to visit Example.com</a></p>
        </body>
    </html>
    ";



    // Set the email subject and body
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body = $htmlContent;

    // Send the email
    if ($mail->send()) {
        echo 'Email sent successfully.';
    } else {
        echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
?>
