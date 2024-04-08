<?php ini_set('display_errors', 1);
require_once("./library/phpmailer/send-mail.php");
include "include/config.php";


if (isset($_POST['submit-email']) && isset($_POST['email'])) {
  $email = $_POST['email'];

  $select = $connection->query("select email,id from users where email='$email'");
  if (mysqli_num_rows($select) >= 1) {
    $row = mysqli_fetch_array($select);

    $email_encoded = base64_encode($row['email']);
    $id = $row['id'];
    $code = uniqid();

    $query = $connection->query("update users set code='$code' where id='$id'");

    $link = "<a href='https://www.tstohome.com/reset.php?email=" . $email_encoded . "&code=$code'>Click To Reset password</a>";

    $to = $email;
    $subject = "Password change request tstohome.com";

    $message = "
	<p>We have recieved your request to reset your password for tstohome.com account, please click the link below or paste it in a browser.<br><br> $link
	</p>";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <noreply@tstohome.com>' . "\r\n";
    //$headers .= 'Cc: myboss@example.com' . "\r\n";

    //if (mail($to, $subject, $message, $headers)) {
    if (sendMail($to, $subject, $message)) {
      $msg = "An email having a link to reset your password is sent on your registered email account with us.<br> Please check email and change your password.";
    }
  }
}
?>
<? include "include/header.php"; ?>
<div class="w3-display-centre flex-container w3-text-white w3-padding-32 w3-hide-small form-auth2">
  <?php if (isset($msg)) {
    echo $msg;
  } else {
  ?>

    <!------ email------->
    <form action="set_password.php" id="reset-pass-email" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
        <input type="submit" name="submit-email" value="Continue" class="btn btn-primary pas12">
      </div>
    </form>
  <?php } ?>
</div>
</div>
<!-- End Page Content -->
</div>
<!-- End Page Content -->
</div>
</div>
<? include "include/footer.php"; ?>