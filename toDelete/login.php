<?php
ini_set('display_errors',1);

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if (isset($_SESSION["status"]) && $_SESSION["status"] == "loggedin"){
		header("Location: index.php");
	}
  if (!isset($_SESSION["logintry"])){
		$_SESSION["logintry"]=1;
	}
	

	?>
<html lang="en">
<head>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
  $(document).ready(function() {
	$("#login").click(function(){
		var email = $("#email").val();
    console.log(1);
		var password = $("#password").val();
		if (email == "" || password == ""){
      console.log(2);
			alert("Please fill the fields!")
		}else{
      console.log(1);
			$.ajax({url: "check-login.php",type: "POST",
				data:{
					email: email,
					password: password
				}, success(response){
					if (response == "success"){
            console.log(4);
						location.href = 'index.html';}
					else if (response == "error"){
            console.log(3);
						alert("Error Password!");}
            else{
              console.log(10);
            }
				}
			});
		}});
    });
</script>
<title>TSTO Home - Log In Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=1024">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./script1.css"/>
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
</head>
<body style="background-color:#000000; height:100%;">

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
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
  <div class="w3-display-centre flex-container w3-text-white w3-padding-32 w3-hide-small form-auth2">

      <?php 
      if ($_SESSION["logintry"]==2){
        ?>
        <div class="alert alert-danger" role="alert">
        Username or password is incorrect
      </div>
        <?php
      }

      ?>
      <form action="check-login.php" class="form-login1" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <input type="submit" value="Log In" class="btn btn-primary">
		<a href="set_password.php" style="padding:0px 20px">Forgot Password?</a>
      </form>
	    <!------ email------->
  
    </div>
  </div>
  
  

<!-- End Page Content -->
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
  <?php }else{
  ?>
  <div class="w3-black" id="tour">
  </br>
  <div class="container" style="background-color: #000000;width:100%;">
    <div class="row">
      <div class="col-sm d-flex justify-content-center">
    <img src="websiteimages/attention.png" class="center" style="display: inline-block;margin: 0 auto;
    float: none;
    display: block;"/>
      </div>
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

</body>
</html>
