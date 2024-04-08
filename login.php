<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin") {
  include "include/currentuser.php";
    header("Location: index.php");
}
include "include/header.php"; ?>
<div class="w3-display-centre flex-container w3-text-white w3-padding-32 w3-hide-small form-auth2">

  <?php
  if ($_SESSION["logintry"] == 2) {
  ?>
    <div class="alert alert-danger" role="alert">
      Email or password is incorrect
    </div>
  <?php
  }
  ?>
  <!-- <form action="check-login.php" class="form-login1" method="post"> -->
  <form action="check-login.php<?=forLink();?>" class="form-login1" method="post">
    <div class="form-group">
      <label for="exampleInputEmail1">Email Address</label>
      <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      <small id="emailHelp" class="form-text text-muted">Case sensitive - no capital letter in the beginning of your email address.</small>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
    </div>
    <input type="submit" value="Log In" class="btn btn-primary">
    <a href="set_password.php" style="padding:0px 20px">Forgot the Password?</a>
  </form>
  <!------ email------->

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
    <div class="container" style="background-color: #000000;width:100%;">
      <div class="row">
        <div class="col-sm d-flex justify-content-center">
          <img src="websiteimages/attention.png" class="center" style="display: inline-block;margin: 0 auto;
    float: none;
    display: block;" />
        </div>
        </br></br>
      </div>
    </div> -->
  </div>
<?php
} ?>

</div>
<? include "include/footer.php"; ?>