<?php
	if (session_status() == PHP_SESSION_NONE) {
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

if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin"){
        include "currentuser.php";
        if(strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate'])))<strtotime(date('Y-m-d'))){
            header('location:login.php');
            
        }
    
    
    
    
}
         else{
            
            header('location:login.php');
        }
        ?>
        
        
  
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
<link rel="stylesheet" type="text/css" href="./script1.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none} 
</style>
</head>
<body style="background-color:#000000; height:100%;" oncontextmenu="return false">

<!-- Navbar -->
<div class="w3-top" style="height: 46;">
  <div class="w3-bar w3-black w3-card" style="height: 46;display:flex;">
  <a href="index.php" class ="w3-bar-item " style="width:50px;height:20px;"><img src="websiteimages/tstologo.png" alt="Home" style="width:30px;height:30px;"></a>
    <?php
      if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin"){
        ?>
        
        <a href="./destroy.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Log out</a>
    <?php
      }else{
        ?>
        <a href="login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
        <a href="signUp.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Sign Up</a>
        <?php
      }
    
     if (isset($_SESSION['status']) &&  strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate'])))<strtotime(date('Y-m-d'))){
        ?>
    <form action="https://www.paypal.com/cgi-bin/webscr" id="paypal-form1"method="post">
    <!-- Identify your business so that you can collect the payments -->
    <input type="hidden" name="business" value="number2marcin@gmail.com">
    <!-- Specify a subscriptions button. -->
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <!-- Specify details about the subscription that buyers will purchase -->
    <input type="hidden" name="item_name" value="Monthly Subscription">
    <input type="hidden" name="item_number" value="<?php echo $_SESSION['id'];?>">
    <input type="hidden" name="currency_code" value="GBP">
    <input type="hidden" name="a3" id="paypalAmt" value="5">
    <input type="hidden" name="p3" id="paypalValid" value="1">
    <input type="hidden" name="t3" value="M">
      <input type="hidden" name="src" value="1">
    <!-- Custom variable user ID -->
    <input type="hidden" name="custom" value="<?php echo $_SESSION['id'];?>">
    <!-- Specify urls -->
    <input type="hidden" name="cancel_return" value="https://www.tstohome.com/">
    <input type="hidden" name="return" value="https://www.tstohome.com/success_script.php">
    <input type="hidden" name="notify_url" value="https://www.tstohome.com/notify.php">
    <!-- Display the payment button -->
    <input class="buy-btn hover_btna" type="submit" value="Buy Subscription">
</form>

 <?php }?>
    <!--
    <a href="https://www.paypal.me/simpsonstapper/5" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Donate</a>
    -->
    
    
   <div class="icons" style="width:100%">
        <a href="https://twitter.com/tstohome" style="height: 46;" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fab fa-twitter w3-hover-opacity"></i></a>
    <a href="https://www.facebook.com/tstohome" style="height: 46;" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fab fa-facebook w3-hover-opacity"></i></a>
    <a href="https://www.youtube.com/@TSTOHome" style="height: 46;" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fab fa-youtube w3-hover-opacity"></i></a>
 
 <?php
   if (isset($_SESSION['status']) &&  strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate'])))<strtotime(date('Y-m-d'))){
        ?> 
    
   <a href="#" onclick="document.getElementById('paypal-form1').submit();" class="w3-padding-large w3-hover-red w3-hide-small w3-right" style="height: 100%;"><i class="fab fa-paypal w3-hover-opacity"></i></a>
  
  <?php }?>
   
        <a href="https://discord.gg/9sYXqGfyAC" style="height: 46;" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fab fa-discord w3-hover-opacity"></i></a>
   </div> 
    
    
    
   
  </div>
</div>

<!-- Page content -->


<!-- End Page Content -->
<div class="w3-display-container w3-center">
<img src="websiteimages/instructions.png" style="top:20;object-fit: cover;
  padding-top: 25px;width:100%;">

<div class="w3-display-container w3-center instruction-bottom-div">
<a href="https://youtu.be/c4dwbX2lVo4" class="w3-center w3-bar-item w3-button w3-padding-large w3-hide-small">Root BlueStacks 5</a>
<a href="https://youtu.be/iguOWlBcuPQ" class="w3-center w3-bar-item w3-button w3-padding-large w3-hide-small">Install modded TSTO files on your Rooted BlueStacks</a>
</div>
</body>
</html>