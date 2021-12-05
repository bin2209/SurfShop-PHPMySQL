<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
// require '../vendor/settings.php';
// require '../vendor/autoload.php';

// require_once '../vendor/autoload.php';

function sentmail($File_html_content,$addAddress_email,$Subject_name){
   // SMTP SETTINGS
    $SMTP_host = 'smtp.office365.com';
    $SMTP_port = '587';
    // $SMTP_secure = 'tls';
    $SMTP_secure = 'STARTTLS';
    $SMTP_username = 'lstsurf@outlook.com';
    $SMTP_password = 'truong322';

//Set who the message is to be sent from
    $setFrom_email = 'lstsurf@outlook.com';
    $setFrom_name = 'LST SURF';

//Set who the message is to be sent to
    // $addAddress_email = 'binazure@gmail.com';

//Set the subject line
    // $Subject_name = 'LST SURF SENT MAIL';


//Create a new PHPMailer instance

    $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
    $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
    $mail->SMTPDebug = 0;

//Set the hostname of the mail server
    $mail->Host = $SMTP_host;
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = $SMTP_port;

//Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = $SMTP_secure;

//Whether to use SMTP authentication
    $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = $SMTP_username;

//Password to use for SMTP authentication
    $mail->Password = $SMTP_password;

//Set who the message is to be sent from
    $mail->setFrom($setFrom_email, $setFrom_name);

//Set an alternative reply-to address
    // $mail->addReplyTo($addReplyTo_email, $addReplyTo_name);

//Set who the message is to be sent to
    $mail->addAddress($addAddress_email);

//Set the subject line
    $mail->Subject = $Subject_name;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    // $mail->msgHTML(file_get_contents($File_html_content), __DIR__);
    $mail->msgHTML($File_html_content, __DIR__);
//Replace the plain text body with one created manually
    // $mail->AltBody = 'This is a plain-text message body';

//Attach an image file
    // $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
    if (!$mail->send()) {
        return 0;
        // echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
       return 1;
        // echo "Message sent!";
   }


}

// sentmail($File_html_content);

