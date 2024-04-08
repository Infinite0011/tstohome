<?php
$to = "ilham05saputra@gmail.com";
$subject = "Request a new password";
$message = "<p>Someone (hopefully you) has asked to have your password re-issued.
Please click on the link (Reset Password) to enter your email address
and a new password. If you did not request a new password, please ignore
this message.</p>";

$headers = array(
    "MIME-Version" => "1.0",
    "Content-Type" => "text/html;charset=UTF-8",
    "From" => "support@tstohome.com",
    "Reply-To" => "support@tstohome.com"
);

// Mail it
$mail_sent = mail($to, $subject, $message, $headers);

if ($mail_sent) {
    echo "Email sent successfully";
} else {
    echo "Error sending email";
}
