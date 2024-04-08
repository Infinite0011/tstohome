<?php
ini_set('display_errors', 1);

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

function attention()
{
	return
"<div class='w3-container w3-hide-small attentino-form'>
	<div class='flex-container translate'>
		<span class='text-green'> Attention:</span> Please sign up and subscribe to see our services and content files. It is a monthly subscription that lasts 30 days and autorenews unless you cancel on your end. By purchasing a subscription you will recieve our services which include media content and files from TSTO Home. Also by purchasing a subscription you agree to the our set  <span class='text-green'>Terms of Service</span>. Happy Tapping!
	</div>
</div>";
}

function attentionDonuts()
{
	return
"<div class='w3-container w3-hide-small attentino-form'>
	<div class='flex-container translate'>
    The mod will not work unless your account is level 15 or higher. Donuts only stick using the root files. You can add 1600 daily donuts on a non-rooted device or use Golden Scratchers to add unlimited donuts that will sync. In order to use the root files, you will need a rooted Android or on a PC you can use Rooted Bluestacks or Nox Player.
	</div>
</div>";
}

function attentionTerms()
{
	return
"<div class='w3-container w3-hide-small attentino-form'>
	<div class='flex-container translate'>
    By not following our Discord Rules and / or our Website Terms of Service will lead either to a warning and / or a ban from TSTO Home website and our Discord server. This will also lead to your subscription being cancelled and not refunded.
	</div>
</div>";
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

if (isset($_GET["destroy"]) && $_GET["destroy"] == "1") {
  session_destroy();
  header("Location: index.php");
  exit;
}

$url = substr($_SERVER['REQUEST_URI'], 1);
$url = str_replace('.php','',$url);


function forLink()
{
  $link = isset($_GET["destroy"]) ? $_GET['lang'] : '';
  if (!empty($link)) {
    $link = '?lang='.$link;
    return $link;
  } else { return '';}
}

$arrayPages = [
  ["login", "TSTO Home"],
  ["signUp", "Sign Up"],
  ["set_password", "Set Password"],
  ["check-login", "TSTO Home"], 
  ["reset", "Reset Password"],
  ["about", "About"],
  ["download", "TSTO Home"],
  ["terms", "Terms of Service"],
  ["users", "Users"],
  ["ipn", "TSTO Home"],
  ["notify", "TSTO Home"],
  ["webhook", "TSTO Home"],
  ["success", "TSTO Home"],
  ["faq", "Frequently Asked Questions"],
  ["android", "Android"],
  ["bluestacks", "BlueStacks"],
  ["noxplayer", "Nox Player"],
  ["updates", "Updates"],
  ["videos", "Videos"],
  ["subscribers", "Subscribers"],
  ["index", "TSTO Home"]
];

foreach ($arrayPages as $pageNames) {
  if ($url == $pageNames[0]) {
    $pageName = $pageNames[1];
  }
}

$nameAbout = "About";
$linkAbout = "/about.php".forLink();

 if ($_SERVER['REQUEST_URI'] == "/about.php".forLink()) {
  $nameAbout = "Files";
  $linkAbout = "/index.php".forLink();
}

$uri = "index.php".forLink();

// if ($uri != "index.php") {
//   if (isset($_SESSION["status"]) && $_SESSION["status"] == "loggedin") {
//     header("Location: index.php");
//   }
// }

if (!isset($_SESSION["logintry"])) {
  $_SESSION["logintry"] = 1;
}


?>
<html lang="en">

<head>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#login").click(function() {
        var email = $("#email").val();
        console.log(1);
        var password = $("#password").val();
        if (email == "" || password == "") {
          console.log(2);
          alert("Please fill the fields!")
        } else {
          console.log(1);
          $.ajax({
            url: "check-login.php",
            type: "POST",
            data: {
              email: email,
              password: password
            },
            success(response) {
              if (response == "success") {
                console.log(4);
                location.href = 'index.html';
              } else if (response == "error") {
                console.log(3);
                alert("Error Password!");
              } else {
                console.log(10);
              }
            }
          });
        }
      });
    });
  </script>
  <title><?= $pageName; ?></title>
  <meta charset="UTF-8">
  <!-- <meta name="viewport" content="width=1024"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="./include/scripts/webjquery.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./include/scripts/script1.css" />
  <style>
    body {
      font-family: "Lato", sans-serif
    }

    .mySlides {
      display: none
    }
    
    .menu {
      position: relative;
      display: inline-block;
    }
    
    .dropdown-button {
      background-color: #000000;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }
    
    .menu:hover .dropdown-content {
      display: block;
    }
    
    .dropdown-content a {
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      color: #333;
    }
    
    .dropdown-content a:hover {
      background-color: #ddd;
    }
  </style>
</head>

<body style="background-color:#000000; height:100%;">

  <!-- Navbar -->
  <div class="w3-top row" style="height: 46;">
    <div class="w3-bar w3-black w3-card col-md-12 col-lg-8" style="height: 46;display:flex;overflow:unset !important">
    <div id="translate" class="translate-button-margin"></div>
    <a href="index.php<?=forLink();?>" class="w3-bar-item w3-button w3-padding-large">Home</a>
      <!-- <a href="index.php<?=forLink();?>" class="w3-bar-item " style="width:50px;height:20px;"><img src="websiteimages/tstologo.png" alt="Home" style="width:30px;height:30px;"></a> -->
      <?php
      if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin") {
      ?>

        <a href="?destroy=1" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Log out</a>
      <?php
      } else {
      ?>
        <a href="login.php<?=forLink();?>" class="w3-bar-item w3-button w3-padding-large">Login</a>
        <a href="signUp.php<?=forLink();?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Sign Up</a>
        <a href="<?=$linkAbout;?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small about-link"><?= $nameAbout; ?></a>
        <?php
      }

      //if ($uri = "/index.php") {

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
            <!-- <a href="updates.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Updates</a>  -->
            <div class="menu">
              <button class="dropdown-button" style="padding-top: 12px;">Media</button>
              <div class="dropdown-content">
                <a href="updates.php">Updates</a>
                <a href="videos.php">Videos</a>
              </div>
            </div>
            <div class="menu">
              <button class="dropdown-button" style="padding-top: 12px;">Information</button>
              <div class="dropdown-content">
                <a href="android.php">Android</a>
                <a href="bluestacks.php">BlueStacks</a>
                <a href="noxplayer.php">Nox Player</a>
                <a href="faq.php<?=forLink();?>">FAQ</a>
                <a href="<?=$linkAbout;?>"><?= $nameAbout; ?></a>
              </div>
            </div>
          <!--<a href="<?=$linkAbout;?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small about-link"><?= $nameAbout; ?></a>-->

        <?php } else if (isset($_SESSION['status']) &&  strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) >= strtotime(date('Y-m-d'))) {

        ?>
        <?php if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin") {?>
          <!-- <a href="updates.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Updates</a>  -->
          <div class="menu">
            <button class="dropdown-button" style="padding-top: 12px;">Media</button>
            <div class="dropdown-content">
              <a href="updates.php">Updates</a>
              <a href="videos.php">Videos</a>
            </div>
          </div>
          <div class="menu">
            <button class="dropdown-button" style="padding-top: 12px;">Information</button>
            <div class="dropdown-content">
              <a href="android.php">Android</a>
              <a href="bluestacks.php">BlueStacks</a>
              <a href="noxplayer.php">Nox Player</a>
              <a href="faq.php<?=forLink();?>">FAQ</a>
              <a href="<?=$linkAbout;?>"><?= $nameAbout; ?></a>
              <a href="terms.php">Terms of Service</a>
            </div>
          </div>
        <?php } else { ?>
          
        <?php } ?>

          <!-- <a href="manual.php<?=forLink();?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Android</a> -->
          

          <!-- <a href="faq.php<?=forLink();?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small">FAQ</a> 
          <a href="<?=$linkAbout;?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small about-link"><?= $nameAbout; ?></a> -->
          <?php
        if (($_SESSION['id']==='46') || ($_SESSION['id']==='895') || ($_SESSION['id']==='2490') ) {?>
        <? if ($_GET['Lang']) {} ?>
          <div class="menu">
            <button class="dropdown-button" style="padding-top: 12px;">Admin</button>
            <div class="dropdown-content">
              <a href="users.php<?=forLink();?>">Users</a>
              <a href="subscribers.php<?=forLink();?>">Subscribers</a>
            </div>
          </div>
        <!--<a href="show-users-with-ip.php<?=forLink();?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Users</a> -->
        <!--<a href="show-current-subscribers.php<?=forLink();?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Subscribers</a>        -->
        <?php
         }?>


      <?php }
     // } 
      ?>
      </div>
      <div style="position:absolute;right:0px;color:white">
      <!--<div class="icons col-md-12 col-lg-4 text-white mt-1" style="width:100%;position:absolute;right:0px">-->
        <?php
        include 'include/icons.php';
        ?>
        <?php
        if ($uri = "/index.php") {
          if (isset($_SESSION['status']) && isset($_SESSION['subscriptionDate']) &&  strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) < strtotime(date('Y-m-d'))) {
        ?>
        <a href="#" onclick="document.getElementById('paypal-form1').submit();" style="height: 46; padding-top:16px; margin-right:16px" class="w3-hover-red w3-hide-small w3-right"><i class="fab fa-paypal w3-hover-opacity"></i></a>

            <!--<a href="#" onclick="document.getElementById('paypal-form1').submit();" class="w3-padding-large w3-hover-red w3-hide-small w3-right" style="height: 100%;margin-top:5px"><i class="fab fa-paypal w3-hover-opacity"></i></a>-->

        <?php }
        } ?>
      </div>

    </div>
   
  </div>

  <!-- Page content -->
  <div class="flex-container" style="max-width:2000px;position: relative;">
    <?php
    include 'include/slider.php';
    ?>