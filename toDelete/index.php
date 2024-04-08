<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
function getUserIP()
{
  // Get real visitor IP behind CloudFlare network
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }

  return $ip;
}
if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin") {
  include "currentuser.php";
} else {

  header('location:login.php');
}



?>

<html lang="en">

<head>
  <title>TSTO Home</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=1024">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="webjquery.js"></script>


  <!-- Latest compiled JavaScript -->
  <link rel="stylesheet" type="text/css" href="./script1.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <style>
    body {
      font-family: "Lato", sans-serif
    }

    .mySlides {
      display: none
    }
  </style>
</head>

<body style="background-color:#000000; height:100%;" oncontextmenu="return false">

  <!-- Navbar -->
  <div class="w3-top" style="height: 46;">
    <div class="w3-bar w3-black w3-card" style="height: 46;display:flex;">
      <a href="index.php" class="w3-bar-item " style="width:50px;height:20px;"><img src="websiteimages/tstologo.png" alt="Home" style="width:30px;height:30px;"></a>
      <?php
      if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin") {
      ?>

        <a href="./destroy.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Log out</a>
      <?php
      } else {
      ?>
        <a href="login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
        <a href="signUp.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Sign Up</a>
      <?php
      }

      if (isset($_SESSION['status']) &&  strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) < strtotime(date('Y-m-d'))) {
      ?>
        <form action="https://www.paypal.com/cgi-bin/webscr" id="paypal-form1" method="post">
          <!-- Identify your business so that you can collect the payments -->
          <input type="hidden" name="business" value="number2marcin@gmail.com">
          <!-- Specify a subscriptions button. -->
          <input type="hidden" name="cmd" value="_xclick-subscriptions">
          <!-- Specify details about the subscription that buyers will purchase -->
          <input type="hidden" name="item_name" value="Monthly Subscription">
          <input type="hidden" name="item_number" value="<?php echo $_SESSION['id']; ?>">
          <input type="hidden" name="currency_code" value="GBP">
          <input type="hidden" name="a3" id="paypalAmt" value="5">
          <input type="hidden" name="p3" id="paypalValid" value="1">
          <input type="hidden" name="t3" value="M">
          <input type="hidden" name="src" value="1">
          <!-- Custom variable user ID -->
          <input type="hidden" name="custom" value="<?php echo $_SESSION['id']; ?>">
          <!-- Specify urls -->
          <input type="hidden" name="cancel_return" value="https://www.tstohome.com/">
          <input type="hidden" name="return" value="https://www.tstohome.com/success_script.php">
          <input type="hidden" name="notify_url" value="https://www.tstohome.com/notify.php">
          <!-- Display the payment button -->
          <input class="buy-btn hover_btna" type="submit" value="Buy Subscription">
        </form>

      <?php } else if (isset($_SESSION['status']) &&  strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) >= strtotime(date('Y-m-d'))) {

      ?>
        <a href="mod_installation_instructions.pdf" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Instructions</a>


      <?php } ?>
      <!--
    <a href="https://www.paypal.me/simpsonstapper/5" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Donate</a>
    -->


      <div class="icons" style="width:100%">

        <?php
        include 'include/icons.php';
        ?>

        <?php
        if (isset($_SESSION['status']) &&  strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) < strtotime(date('Y-m-d'))) {
        ?>

          <a href="#" onclick="document.getElementById('paypal-form1').submit();" class="w3-padding-large w3-hover-red w3-hide-small w3-right" style="height: 100%;"><i class="fab fa-paypal w3-hover-opacity"></i></a>

        <?php } ?>

        <!-- <a href="https://discord.gg/9sYXqGfyAC" style="height: 46;" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fab fa-discord w3-hover-opacity"></i></a> -->
      </div>




    </div>
  </div>

  <!-- Page content -->
  <div class="flex-container" style="max-width:2000px;position: relative;">
    <? include 'include/slider.php'; ?>
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin") {


    ?>


      <div class="w3-container w3-text-white w3-padding-32 w3-hide-small form-auth2" style="
    top: 50%;
    left: 20px;
    width: 1123px;">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-1 justify-content-center">
              <img src="websiteimages/logobar.png" style="background: #000; height: 60px; width: auto;">
            </div>
            <div class="col-2 justify-content-center">
              <h3 class="new_h3_welcome" style="font-size:20px; margin:0px;">Welcome <?php echo ($_SESSION["name"]) ?></h3>
            </div>
            <div class="col-2 justify-content-center">
              <div class="row">
                <p style="color:orange; margin-bottom:5px">IP Address</p>
              </div>
              <div class="row">
                <p><?php echo (getUserIP()) ?></p>
              </div>
            </div>
            <div class="col-2 justify-content-center">
              <div class="row">
                <p style="color:orange">Subscription Starts</p>
              </div>
              <div class="row">
                <p style="color:orange"><?php echo strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) >= strtotime(date('Y-m-d')) ?  date('Y-m-d', strtotime('-30 days', strtotime($_SESSION["subscriptionDate"]))) : $_SESSION["registrationDate"]; ?></p>
                <!--<p style=""><?php echo ($_SESSION["registrationDate"]) ?></p>-->
              </div>
            </div>
            <div class="col-2 justify-content-center">
              <div class="row">
                <p style="color:orange">Subscription Ends</p>
              </div>
              <div class="row">
                <p style=""><?php echo ($_SESSION["subscriptionDate"]) ?></p>
              </div>
            </div>

            <div class="col-2 justify-content-center">
              <div class="row">
                <p style="color:orange">Assign IP Address</p>
              </div>
              <div class="row">
                <p style="">
                <?php 
                   $search_string = $_SESSION['ip'];
                   // if ($_SERVER['REMOTE_ADDR'] != $_SESSION['ip']) {
                     $file = dirname(__FILE__) . "/files/.htaccess";
                     $content = file_get_contents($file);

                 if (strpos($content, $_SERVER['REMOTE_ADDR']) == true) { echo "Your IP Address has been assigned"; } else
                 {
                // if ($_SERVER['REMOTE_ADDR'] != $_SESSION['ip']) {
                  echo "<a href='/'><button>Assign IP Address</button></a>";
                 }               
                ?></p>
              </div>
            </div>
            <?
                  if ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']) {
                    $sql = "UPDATE `users` SET `ip` = '{$_SERVER['REMOTE_ADDR']}' WHERE `id` = '{$_SESSION["id"]}'";
                    $result = $connection->query($sql);
                  }                
            
                    if (strpos($content, $_SERVER['REMOTE_ADDR']) == true) { } else
                    {
                    if (strpos($content, $search_string) !== false) {
                      // The string was found in the file
                      //change .htaccess file:
                      $new_ip = $_SERVER['HTTP_CLIENT_IP'];
                      $content = file_get_contents($file);
                      $content = str_replace($_SESSION['ip'], $new_ip, $content);
                      file_put_contents($file, $content);
                    } else {
                      $new_ip = "allow from " . $_SERVER['REMOTE_ADDR'];
                      $content = file_get_contents($file);
                      $content = str_replace("allow from", $new_ip, $content);
                      file_put_contents($file, $content);
                    }
                  }

            ?>


            <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin" && strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) >= strtotime(date('Y-m-d'))) {

            ?>

              <div></div>
            <?php } else { ?>

              <div class="col-2 justify-content-center">
                <div class="row">
                </div>
                <div class="row">

                  <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="business" value="number2marcin@gmail.com">

                    <!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <!-- Identify your business so that you can collect the payments richachaudhary24781@gmail.com -->
                    <input type="hidden" name="business" value="number2marcin@gmail.com"> -->
                    <!-- Specify a subscriptions button. -->
                    <input type="hidden" name="cmd" value="_xclick-subscriptions">
                    <!-- Specify details about the subscription that buyers will purchase -->
                    <input type="hidden" name="item_name" value="Monthly Subscription">
                    <input type="hidden" name="item_number" value="<?php echo $_SESSION['id']; ?>">
                    <input type="hidden" name="currency_code" value="GBP">
                    <input type="hidden" name="a3" id="paypalAmt" value="5">
                    <input type="hidden" name="p3" id="paypalValid" value="1">
                    <input type="hidden" name="t3" value="M">
                    <input type="hidden" name="src" value="1">
                    <!-- Custom variable user ID -->
                    <input type="hidden" name="custom" value="<?php echo $_SESSION['id']; ?>">
                    <!-- Specify urls -->
                    <input type="hidden" name="cancel_return" value="https://www.tstohome.com/">
                    <input type="hidden" name="return" value="https://www.tstohome.com/success_script.php">
                    <input type="hidden" name="notify_url" value="https://www.tstohome.com/notify.php">
                    <!-- Display the payment button -->
                    <input class="buy-btn" type="submit" style="cursor: pointer; margin-top:13px;" value="Buy Subscription">
                  </form>


                </div>
              </div>





            <?php } ?>

          </div>
        </div>
      <?php
    }
      ?>
      </div>
  </div>
  <!-- End Page Content -->
  </div>

  <?php
  if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin" && strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) >= strtotime(date('Y-m-d'))) {
  ?>
    <div class="w3-black" id="tour">
      <!-- </br> -->
      </br>
      <div class="container" style="background-color: #000000;width:100%;">
        <div class="row">
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id='32bit'><img src="websiteimages/32bit.png" style="width:120px;height:120px;"></a>
          </div>
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id='64bit'><img src="websiteimages/64bit.png" style="width:120px;height:120px;"></a>
          </div>
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id='128bit'><img src="websiteimages/128bit.png" style="width:120px;height:120px;"></a>
          </div>
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id="normal-game"><img src="websiteimages/normalgame.png" style="width:120px;height:120px;"></a>
          </div>
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id="root"><img src="websiteimages/rootfiles.png" style="width:120px;height:120px;"></a>
          </div>
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id="bluestacksinstaller"><img src="websiteimages/bluestacks.png" style="width:120px;height:120px;"></a>
          </div>
        </div>
        </br></br>
      </div>
    </div>
  <?php } else {
  ?>
    <div class="w3-black" id="tour">
      </br>
      <div class="container">
        <div class="row d-flex justify-content-center">
          <img src="websiteimages/attention.png" class="center" style="display: inline-block;margin: 0 auto;
    float: none;
    display: block;" />
          </br></br>
        </div>
      </div>
    </div>
  <?php
  } ?>

  </div>

  <script>
    // Automatic Slideshow - change image every 4 seconds
    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {
        myIndex = 1
      }
      x[myIndex - 1].style.display = "block";
      setTimeout(carousel, 4000);
    }

    // Used to toggle the menu on small screens when clicking on the menu button
  </script>
  <script type="text/javascript">
    document.addEventListener("keydown", function(event) {
      if (event.ctrlKey) {
        event.preventDefault();
      }
    });

    function mousehandler(e) {
      var myevent = (isNS) ? e : event;
      var eventbutton = (isNS) ? myevent.which : myevent.button;
      if ((eventbutton == 2) || (eventbutton == 3)) return false;
    }
    document.oncontextmenu = mischandler;
    document.onmousedown = mousehandler;
    document.onmouseup = mousehandler;

    function disableCtrlKeyCombination(e) {
      var forbiddenKeys = new Array("a", "s", "c", "x", "u");
      var key;
      var isCtrl;
      if (window.event) {
        key = window.event.keyCode;
        //IE
        if (window.event.ctrlKey)
          isCtrl = true;
        else
          isCtrl = false;
      } else {
        key = e.which;
        //firefox
        if (e.ctrlKey)
          isCtrl = true;
        else
          isCtrl = false;
      }
      if (isCtrl) {
        for (i = 0; i < forbiddenKeys.length; i++) {
          //case-insensitive comparation
          if (forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase()) {
            return false;
          }
        }
      }
      return true;
    }
  </script>


</body>

</html>