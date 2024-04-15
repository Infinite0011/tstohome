<?php
require_once("config.php"); // Include the configuration file
require_once 'library/sendgrid/sendgrid-php.php';

function sendMail($to, $subject, $msg){
    
    // Access the global variable
    $sendgrid_config = $GLOBALS['sendgrid_config'];
    $sg = new \SendGrid($sendgrid_config['api_key']);

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("admin@tstohome.com", "tstohome-notice");
    $email->setSubject($subject);
    $email->addTo($to);
    $email->addContent(
        "text/html", $msg
    );
    $sendgrid = new \SendGrid($sendgrid_config['api_key']);
    try {
        $response = $sendgrid->send($email);
        return true;
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
        return false;
    }

    //print_r($sendgrid_config); return;
    
    //Create an instance; passing `true` enables exceptions
    // $mail = new PHPMailer(true);
    // try {
    //     //Server settings
    //     $mail->isSMTP();
    //     // $mail->SMTPAutoTLS = true;                                            //Send using SMTP
    //     $mail->SMTPDebug  = true;                     //Enable verbose debug output
    //     $mail->Host       = $sendgrid_config['host'];                   //Set the SMTP server to send through
    //     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //     $mail->Username   = $sendgrid_config['username'];               //SMTP username
    //     $mail->Password   = $sendgrid_config['password'];               //SMTP password
    //     $mail->SMTPSecure = $sendgrid_config['secure'];                 //Enable verbose debug output
    //     $mail->Port       = 587;                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //     //Recipients
    //     $mail->setFrom("admin@tstohome.com", "tstohome-notice");
    
    //     //Content
    //     $mail->Subject = $subject;
    //     // sendMail($row['email'], $row['name'], $msg);
    //     $mail->addAddress($to);
    //     $mail->Body    = $msg;
    //     $mail->isHTML(true);                                  //Set email format to HTML
    //     $mail->send();

    //     // Reset pengaturan email untuk penerima berikutnya
    //     $mail->clearAddresses();
    //     sleep(1); // Tambahkan jeda untuk menghindari pembatasan pengiriman email
    //     return true;
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     return false;
    // }
}