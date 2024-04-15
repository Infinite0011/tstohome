<?
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['status']) || $_SESSION['status'] != "loggedin") {
  header("Location: index.php");
}

if ($_POST["email"]) {
  include "include/config.php";
  $fname = ($_POST["fname"]);
  $lname = ($_POST["lname"]);
  $email = ($_POST["email"]);
  $discord = ($_POST["discord"]);
  $userId = $_SESSION['id'];
  $user_ip = $_SERVER['REMOTE_ADDR'];
  $regDate = date('Y-m-d H:i:s');
  $d = mktime(11, 14, 54, 4, 1, 2022);
  $subdate = date('Y-m-d H:i:s', $d);

  $query = "update users set firstname='".$fname."',lastName='".$lname."',email='".$email."',discordName='".$discord."' where id=$userId";
  if ($connection->query($query)) {
    $_SESSION['email'] = $email;
    include "include/currentuser.php";
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

  <form name="edit" action="edit.php" method="post">

    <div class="form-row">

      <div class="form-group col-md-6">

        <label>First Name:</label>
        <input name="fname" type="text" class="form-control" placeholder="First Name" pattern="[A-Za-z]{2,}" title="Name can only be 10 characters and can not contain numbers" required value="<?php echo $_SESSION['name'] ?>">

      </div>

      <div class="form-group col-md-6">

        <label>Last Name:</label>
        <input name="lname" type="text" class="form-control" placeholder="Last Name" pattern="[A-Za-z]{2,}" title="Name can only be 10 characters and can not contain numbers" required value="<?php echo $_SESSION['lastName'] ?>">

      </div>

    </div>

    <div class="form-row">

      <div class="form-group col-md-6">

        <label>Email:</label>
        <input name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email Address" required value="<?php echo $_SESSION['email'] ?>">

      </div>

      <div class="form-group col-md-6">

        <label>Discord Name:</label>
        <input name="discord" type="text" class="form-control" placeholder="Discord Name" title="Enter Nickname if you don't have Discord" required value="<?php echo $_SESSION['discordName'] ?>">

      </div>

    </div>

    <div style="text-align:center">

      <input type="submit" id="submit" name="submit" class="btn btn-success" value="Save">

    </div>

  </form>

</div>

</div>

<!-- End Page Content -->

</div>

<!-- End Page Content -->

</div>

</div>

<? include "include/footer.php"; ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>