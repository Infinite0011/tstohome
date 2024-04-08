<?php
require_once("send-mail.php");

    $subject = "Password change request tstohome.com";

    $message = "
	<p>We have recieved your request to reset your password for tstohome.com account, please click the link below or paste it in a browser.<br><br> $link
	</p>";
sendMail('admin@tstohome.com', $subject, $message);
