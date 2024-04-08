<?php
ini_set('display_errors',1);
include("config.php");

if(isset($_REQUEST['password']) && isset($_REQUEST['confirm_password']))
{
    $password=$_REQUEST['password'];
    	$passwordhash = password_hash($password, PASSWORD_DEFAULT);
    $id=$_REQUEST['id'];
    
    $query=$connection->query("update users set passwordhash='$passwordhash' where id='$id'");
    
          $reset=0;
          $msg="Your password has been reset successfully. <a href='login.php'>Click here</a> to login";
          
          
    
  

}else if(isset($_REQUEST['email']) && isset($_REQUEST['code']))
{
    $email=base64_decode($_REQUEST['email']);
    $code=$_REQUEST['code'];
 
 
    $query=$connection->query("select * from users where email ='$email' and code='$code'");
    if(mysqli_num_rows($query)>=1)
    {
        $row=mysqli_fetch_array($query);
        $id=$row['id'];
        $reset=1;
        
    }
    else
    {
          $reset=0;
          $msg="Something went wrong please try to reset your password again.";
    }
  

}
else{
    
     $reset=0;
     $msg="Something went wrong please try to reset your password again. <a href='login.php'>Click here</a> to reset agian";
    
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

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="websiteimages/banner.png" style="width:100%;top:0;object-fit: cover;
  height: 415px;">
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="websiteimages/banner10.png" style="width:100%;top:0;object-fit: cover;
  height: 415px;">
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="websiteimages/banner9.png" style="width:100%;top:0;object-fit: cover;
  height: 415px;">
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="websiteimages/banner8.png" style="width:100%;top:0;object-fit: cover;
  height: 415px;">
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="websiteimages/banner7.png" style="width:100%;top:0;object-fit: cover;
  height: 415px;">
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="websiteimages/banner6.png" style="width:100%;top:0;object-fit: cover;
  height: 415px;">
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="websiteimages/banner5.png" style="width:100%;top:0;object-fit: cover;
  height: 415px;">
  </div>
    <div class="w3-display-centre flex-container w3-text-white w3-padding-32 w3-hide-small" style="border-radius: 25px;
    background: #000000;
    position:absolute;
    padding: 20px;
    width: max-content;
    height: min-content;
    top: 100px">
<?php if($reset==0){ echo $msg;}
else{
?>
     
	    <!------ email------->
  <form action="reset.php" id="reset-pass" method="post">
        <div class="form-group">
          <!----<input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
		  <input type="submit" name="submit-email" value="Continue" class="btn btn-primary pas12">-->
		  
		  <label for="exampleInputpassword">New password</label><br>
		  <input name="password" type="password" class="form-control" id="password"  placeholder="New password" required><br>
		  <label for="exampleInputpassword">Confirm Password</label><br>
		  <input name="confirm_password" type="password" class="form-control" id="confirm-password" aria-describedby="emailHelp" placeholder="Confirm password" required>
		  <?php if(isset($id)){?>
		  
		      <input type='hidden' name='id' value='<?php echo $id;?>'>
		 <?php  
		 }?>
	  <input type=submit name=submit class="btn btn-primary">
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
