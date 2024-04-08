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
  <div class="w3-bar w3-black w3-card" style="height: 46;">
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
    ?>
    
    <a href="https://bit.ly/subscribetapper" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Subscribe</a>
    
    
    
<?php
  include 'include/icons.php';
?>
  </div>
</div>

<!-- Page content -->
<div class="flex-container" style="max-width:2000px;position: relative;">
<?php
include 'include/slider.php';
?>
    <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin"){
          include "currentuser.php"
      ?>
    <div class="w3-container w3-text-white w3-padding-32 w3-hide-small" style="border-radius: 25px;
    position:absolute;top: 250px;
    left: 20px;
    background: #000000;
    padding: 20px;
    width: 800px;
    height: max-content;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-1 justify-content-center">
          <img src="websiteimages/logobar.png" style="background: #000; height: 60px; width: auto;">
          </div>
          <div class="col-3 justify-content-center">
          <h3 style="">Welcome <?php echo($_SESSION["name"]) ?></h3>
          </div>
          <div class="col-2 justify-content-center">
            <div class="row">
            <p style="color:orange">IP Address</p>
            </div>
            <div class="row">
            <p><?php echo(getUserIP()) ?></p>
            </div>
          </div>
          <div class="col-3 justify-content-center">
            <div class="row">
            <p style="color:orange">Subscription Starts</p>
            </div>
            <div class="row">
            <p style=""><?php echo strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) >= strtotime(date('Y-m-d')) ?  date('Y-m-d', strtotime('-30 days', strtotime($_SESSION["subscriptionDate"]))) : $_SESSION["registrationDate"]; ?></p>
            <!--<p style=""><?php echo($_SESSION["registrationDate"]) ?></p>-->
            </div>
          </div>
          <div class="col-3 justify-content-center">
            <div class="row">
            <p style="color:orange">Subscription Ends</p>
            </div>
            <div class="row">
            <p style=""><?php echo($_SESSION["subscriptionDate"]) ?></p>
            </div>
          </div>
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
      if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin" && strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate'])))>=strtotime(date('Y-m-d'))){
        ?>
<div class="w3-black" id="tour">
      </br></br>
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
      <div class="col-sm d-flex justify-content-center">
       <a href="#" id="noxplayer"><img src="websiteimages/noxplayer.png" style="width:120px;height:120px;"></a>
      </div>
    </div>
    </br></br>
  </div>
</div>
  <?php }else{
  ?>
  <div class="w3-black" id="tour">
  </br>
  <div class="container">
    <div class="row d-flex justify-content-center">
    <img src="websiteimages/attention.png" class="center" style="display: inline-block;margin: 0 auto;
    float: none;
    display: block;"/>
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
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button

</script>
<script type="text/javascript">
document.addEventListener("keydown", function (event) {
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
        var forbiddenKeys = new Array("a", "s", "c", "x","u");
        var key;
        var isCtrl;
        if (window.event) {
            key = window.event.keyCode;
            //IE
            if (window.event.ctrlKey)
                isCtrl = true;
            else
                isCtrl = false;
        }
        else {
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