<?php ini_set('display_errors',1);
include "config.php";

if(isset($_POST['submit-email']) && isset($_POST['email']))
{
   $email=$_POST['email'];
    
  $select = $connection->query("select email,id from users where email='$email'");
  if(mysqli_num_rows($select)>=1)
  {
    $row=mysqli_fetch_array($select);
    
      $email_encoded=base64_encode($row['email']);
	  $id=$row['id'];
      $code=uniqid();
      
      $query = $connection->query("update users set code='$code' where id='$id'");
     
    $link="<a href='https://www.tstohome.com/reset.php?email=".$email_encoded."&code=$code'>Click To Reset password</a>";

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

	if(mail($to,$subject,$message,$headers))
	{
	    $msg="An email having a link to reset your password is sent on your registered email account with us.<br> Please check email and change your password.";
	    
	    
	}
   
  }	
}
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
    
    <!----<a href="https://bit.ly/subscribetapper" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Subscribe</a> --->
    <a href="https://twitter.com/tstohome" style="height: 46;" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fab fa-twitter w3-hover-opacity"></i></a>
    <a href="https://www.facebook.com/tstohome" style="height: 46;" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fab fa-facebook w3-hover-opacity"></i></a>
    <a href="https://www.youtube.com/@TSTOHome" style="height: 46;" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fab fa-youtube w3-hover-opacity"></i></a>
    <!----<a href="https://www.paypal.me/simpsonstapper/5" style="height: 46;" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fab fa-paypal w3-hover-opacity"></i></a> --->
<a href="https://discord.gg/9sYXqGfyAC" style="height: 46;" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fab fa-discord w3-hover-opacity"></i></a>
  </div>
</div>

<!-- Page content -->
<div class="flex-container" style="max-width:2000px;position: relative;">

<?php
  include 'include/slider.php';
?>
    <div class="w3-display-centre flex-container w3-text-white w3-padding-32 w3-hide-small form-auth2">
<?php if(isset($msg)){ echo $msg;}
else{
?>
     
	    <!------ email------->
  <form action="set_password.php" id="reset-pass-email" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
		  <input type="submit" name="submit-email" value="Continue" class="btn btn-primary pas12">
        </div>
      </form>
    <?php }?>
    
    
    </div>
  </div>
  
  

<!-- End Page Content -->
</div>
<!-- End Page Content -->
</div>


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
