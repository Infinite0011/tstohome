<?
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if ($_POST["email"]) {
  include "include/config.php";
  $fname = ($_POST["fname"]);
  $lname = ($_POST["lname"]);
  $email = ($_POST["email"]);
  $discord = ($_POST["discord"]);
  $password1 = ($_POST["password1"]);
  $user_ip = $_SERVER['REMOTE_ADDR'];
  $regDate = date('Y-m-d H:i:s');
  $d = mktime(11, 14, 54, 4, 1, 2022);
  $subdate = date('Y-m-d H:i:s', $d);
  $passwordhash = password_hash($password1, PASSWORD_DEFAULT);
  // $sql = 'SELECT * FROM users WHERE email= @0 AND password=@1';
  $query = "INSERT INTO users (firstname, lastName, email, discordName, ip, registrationDate, subscriptionDate, passwordhash) Values('$fname', '$lname', '$email', '$discord', '$user_ip', '$regDate', '$subdate', '$passwordhash')";

  if ($connection->query($query)) {
    echo "Query";
    $_SESSION['status'] = "loggedin";
    $_SESSION['email'] = $email;
    echo "<script>alert('Registration Complete! Please buy subscription to view mod files below!');window.location.href='index.php';</script>";
  } else {
    // echo "error";
    // exit;
    // include "signup.php";
    echo "Error: " . $query . "<br>" . $connection->error;
    echo "<script>alert('Error: " . $query . "<br>" . $connection->error . ");</script>";
  }
}

include "include/header.php"; ?>
<div class="w3-display-centre flex-container w3-text-white w3-padding-32 w3-hide-small form-auth2">

  <form name="signUp" action="signUp.php" method="post">

    <div class="form-row">

      <div class="form-group col-md-4">

        <input name="fname" type="text" class="form-control" placeholder="First Name" pattern="[A-Za-z]{2,}" title="Name can only be 10 characters and can not contain numbers" required>

      </div>

      <div class="form-group col-md-4">

        <input name="lname" type="text" class="form-control" placeholder="Last Name" pattern="[A-Za-z]{2,}" title="Name can only be 10 characters and can not contain numbers" required>

      </div>

      <div class="form-group col-md-4">

        <input name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email Address" required>

      </div>

    </div>

    <div class="form-row">

      <div class="form-group col-md-4">

        <input name="discord" type="text" class="form-control" placeholder="Discord Name" title="Enter Nickname if you don't have Discord" required>

      </div>

      <div class="form-group col-md-4">

        <input id="password1" name="password1" type="password" class="form-control" placeholder="Password" pattern=".{6,}" title="Six or more characters" required>

      </div>

      <div class="form-group col-md-4">

        <input id="password2" type="password" class="form-control" placeholder="Confirm Password" required>

        <div id="msg"></div>

      </div>

    </div>

    <div style="text-align:center">

      <input type="submit" id="submit" name="submit" class="btn btn-success" value="Sign Up">

    </div>

  </form>

</div>

</div>

<!-- End Page Content -->

</div>

<!-- End Page Content -->

</div>

<?php

if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin" && strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) >= strtotime(date('Y-m-d'))) {

?>

  <div class="w3-black" id="tour">

    </br></br>

    <div class="container" style="background-color: #000000;width:100%;">

      <div class="row">

        <div class="col-sm d-flex justify-content-center">

          <img src="websiteimages/32bit.png" style="width:120px;height:120px;">

        </div>

        <div class="col-sm d-flex justify-content-center">

          <img src="websiteimages/64bit.png" style="width:120px;height:120px;">

        </div>

        <div class="col-sm d-flex justify-content-center">

          <img src="websiteimages/128bit.png" style="width:120px;height:120px;">

        </div>

        <div class="col-sm d-flex justify-content-center">

          <img src="websiteimages/normalgame.png" style="width:120px;height:120px;">

        </div>

        <div class="col-sm d-flex justify-content-center">

          <img src="websiteimages/rootfiles.png" style="width:120px;height:120px;">

        </div>

        <div class="col-sm d-flex justify-content-center">

          <img src="websiteimages/bluestacks.png" style="width:120px;height:120px;">

        </div>
        
        <div class="col-sm d-flex justify-content-center">

          <img src="websiteimages/noxplayer.png" style="width:120px;height:120px;">

        </div>

      </div>

      </br></br>

    </div>

  </div>

<?php } else {

?>

  <div class="w3-black" id="tour">
  <?=attention(); ?>
    <!-- </br>

    <div class="container" style="background-color: #000000;width:100%;text-align:center">

      <div class="row">

        <div class="row d-flex justify-content-center">

          <img src="websiteimages/attention.png" />

        </div>

        </br></br>

      </div>

    </div> -->

  </div>

<?php

} ?>

</div>

<? include "include/footer.php"; ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
  $('#password1, #password2').on('keyup', function() {

    if ($('#password1').val() == $('#password2').val()) {

      $('#msg').html('Passwords Match!').css('color', 'green');

      $("#submit").prop('disabled', false);

      return true;

    } else

      $('#msg').html('Passwords do not match!').css('color', 'red');

    $("#submit").prop('disabled', true);

    return false;

  });
</script>