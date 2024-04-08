<?php
ini_set('display_errors', 1);
include "include/config.php";
include "include/header.php";
if (isset($_REQUEST['password']) && isset($_REQUEST['confirm_password'])) {
  $password = $_REQUEST['password'];
  $passwordhash = password_hash($password, PASSWORD_DEFAULT);
  $id = $_REQUEST['id'];

  $query = $connection->query("update users set passwordhash='$passwordhash' where id='$id'");

  $reset = 0;
  $msg = "Your password has been reset successfully. <a href='login.php'>Click here</a> to login";
} else if (isset($_REQUEST['email']) && isset($_REQUEST['code'])) {
  $email = base64_decode($_REQUEST['email']);
  $code = $_REQUEST['code'];


  $query = $connection->query("select * from users where email ='$email' and code='$code'");
  if (mysqli_num_rows($query) >= 1) {
    $row = mysqli_fetch_array($query);
    $id = $row['id'];
    $reset = 1;
  } else {
    $reset = 0;
    $msg = "Something went wrong please try to reset your password again.";
  }
} else {

  $reset = 0;
  $msg = "Something went wrong please try to reset your password again. <a href='login.php'>Click here</a> to reset agian";
}

?>
<div class="w3-display-centre flex-container w3-text-white w3-padding-32 w3-hide-small" style="border-radius: 25px;
    background: #000000;
    position:absolute;
    padding: 20px;
    width: max-content;
    height: min-content;
    top: 100px">
  <?php if ($reset == 0) {
    echo $msg;
  } else {
  ?>

    <!------ email------->
    <form action="reset.php" id="reset-pass" method="post">
      <div class="form-group">
        <!----<input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
		  <input type="submit" name="submit-email" value="Continue" class="btn btn-primary pas12">-->

        <label for="exampleInputpassword">New password</label><br>
        <input name="password" type="password" class="form-control" id="password" placeholder="New password" required><br>
        <label for="exampleInputpassword">Confirm Password</label><br>
        <input name="confirm_password" type="password" class="form-control" id="confirm-password" aria-describedby="emailHelp" placeholder="Confirm password" required>
        <?php if (isset($id)) { ?>

          <input type='hidden' name='id' value='<?php echo $id; ?>'>
        <?php
        } ?>
        <input type=submit name=submit class="btn btn-primary">
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