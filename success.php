<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

include "include/header.php"; ?>
    <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin"){
          include "currentuser.php"
      ?>
	  
	  
    <div class="w3-container w3-text-white w3-padding-32 w3-hide-small form-auth2">
     	 <div class="container">
        <div class="row justify-content-center">
		<div class="success-text1" style="padding-bottom: 20px!important;
	font-size: 25px!important;text-align:center;color:#fff;">
		<p> Congratulation your transaction is successful.</p>
		</div>
		
          
		  
		  
		  <!---- <div class="col-1 justify-content-center">
          <img src="websiteimages/logobar.png" style="background: #000; height: 60px; width: auto;">
          </div>
          <div class="col-2 justify-content-center">
          <h3 class="new_h3_welcome" style="font-size:20px; margin:0px;">Welcome <?php //echo($_SESSION["name"]) ?></h3>
          </div>
          <div class="col-2 justify-content-center">
            <div class="row">
            <p style="color:orange; margin-bottom:5px">IP Address</p>
            </div>
            <div class="row">
            <p><?php //echo(getUserIP()) ?></p>
            </div>
          </div>
          <div class="col-2 justify-content-center">
            <div class="row">
            <p style="color:orange">Subscription Starts</p>
            </div>
            <div class="row">
            <p style=""><?php //echo($_SESSION["registrationDate"]) ?></p>
            </div>
          </div>
          <div class="col-2 justify-content-center">
            <div class="row">
            <p style="color:orange">Subscription Ends</p>
            </div>
            <div class="row">
            <p style=""><?php //echo($_SESSION["subscriptionDate"]) ?></p>
            </div>
          </div>
		  
		  <?php
      //if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin" && strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate'])))>=strtotime(date('Y-m-d'))){
          
        ?>
        
		<div></div>
		<?php //}else{?>--->


<!--- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <!-- Identify your business so that you can collect the payments 
    <input type="hidden" name="business" value="richachaudhary2478@gmail.com">
     Specify a subscriptions button. -->
    <!---<input type="hidden" name="cmd" value="_xclick-subscriptions"> --->
    <!-- Specify details about the subscription that buyers will purchase -->
    <!--<input type="hidden" name="item_name" value="Monthly Subscription"> --->
    <!---<input type="hidden" name="item_number" value="<?php //echo $_SESSION['id'];?>">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="a3" id="paypalAmt" value="5">
    <input type="hidden" name="p3" id="paypalValid" value="1">
    <input type="hidden" name="t3" value="M">
    <!-- Custom variable user ID -->
    <!--<input type="hidden" name="custom" value="<?php //echo $_SESSION['id'];?>">
    <!-- Specify urls -->
    <!---<input type="hidden" name="cancel_return" value="https://tstohome.com/cancel.php">
    <input type="hidden" name="return" value="https://tstohome.com/success.php">
    <input type="hidden" name="notify_url" value="https://tstohome.com/notify1.php">
    <!-- Display the payment button -->
    <!---<input class="buy-btn" type="submit" value="Buy Subscription">
</form>



		
		  
		  
		  
	<?php //} ?>	---->  
		 
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
       <a href="#" id="bluestacksinstaller" ><img src="websiteimages/bluestacks.png" style="width:120px;height:120px;"></a>
      </div>
      <div class="col-sm d-flex justify-content-center">
       <a href="#" id="noxplayer" ><img src="websiteimages/noxplayer.png" style="width:120px;height:120px;"></a>
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
setTimeout(function(){
	window.location.href = 'https://www.tstohome.com/index.php'; 
},5000);// for 5 second redirection
</script>
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