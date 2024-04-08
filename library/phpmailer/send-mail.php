<?php
require_once("includes/config.php"); // Include the configuration file
require_once("library/PHPMailer/src/Exception.php"); // Include the configuration file
require_once("library/PHPMailer/src/PHPMailer.php"); // Include the configuration file
require_once("library/PHPMailer/src/SMTP.php"); // Include the configuration file
// require './library/PHPMailer/src/Exception.php';
// require './library/PHPMailer/src/PHPMailer.php';
// require './library/PHPMailer/src/SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($to, $subject, $msg){
    
    // Access the global variable
    $smtp_config = $GLOBALS['smtp_config'];
    
    //print_r($smtp_config); return;
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(false);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->SMTPAutoTLS = false;                                            //Send using SMTP
        $mail->SMTPDebug  = false;                     //Enable verbose debug output
        $mail->Host       = $smtp_config['host'];                   //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $smtp_config['username'];               //SMTP username
        $mail->Password   = $smtp_config['password'];               //SMTP password
        $mail->SMTPSecure = $smtp_config['secure'];                 //Enable verbose debug output
        $mail->Port       = 25;                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom("admin@tstohome.com", "tstohome-notice");
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        // sendMail($row['email'], $row['name'], $msg);
        $mail->AddAddress($to, '');
        $mail->Body    = $msg;
        $mail->Send();
    
        // Reset pengaturan email untuk penerima berikutnya
        $mail->clearAddresses();
        sleep(1); // Tambahkan jeda untuk menghindari pembatasan pengiriman email
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}