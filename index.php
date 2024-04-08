<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

function forLinkIndexPage()
{
  $link = $_GET['lang'];
  if (!empty($link)) {
    $link = '?lang='.$link;
    return $link;
  } else { return '';}
}

if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin") {
  include "include/currentuser.php";
} else {
  header('location:login.php'.forLinkIndexPage());
}

include "include/header.php";
?>

<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin") {
?>
  <div class="w3-container w3-text-white w3-padding-32 w3-hide-small form-auth2 form-wide-more" style="
    top: 50%;
    left: 20px;
    max-width: 1123px;">
    <div class="flex-container">
      <div class="row justify-content-center">
        <div class="col-1 justify-content-center">
          <img src="websiteimages/logobar.png" style="background: #000; height: 60px; width: auto;">
        </div>
        <div class="col-3 justify-content-center">
          <h3 class="new_h3_welcome" style="font-size:20px; margin:0px;">Welcome <br><?php echo ($_SESSION["name"]) ?></h3>
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
            <p style=""><?php echo strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) >= strtotime(date('Y-m-d')) ?  date('Y-m-d', strtotime('-30 days', strtotime($_SESSION["subscriptionDate"]))) : $_SESSION["registrationDate"]; ?></p>
            <!-- <p style=""><?php echo ($_SESSION["registrationDate"]) ?></p> -->
          </div>
        </div>
        <div class="col-2 justify-content-center">
          <div class="row">
            <p style="color:orange">Subscription Ends</p>
          </div>
          <div class="row">
            <p style=""><?php echo (date("Y-m-d", strtotime($_SESSION["subscriptionDate"]))) ?></p>
          </div>
        </div>

     


        <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin" && strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) >= strtotime(date('Y-m-d'))) {

        ?>

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

              if (strpos($content, $_SERVER['REMOTE_ADDR']) == true) {
                echo "IP Assigned";
              } else {
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
          $ipTableSql = "INSERT INTO ip_tables (userID, loginDate, ip) Values('{$_SESSION["id"]}', '".date('Y-m-d H:i:s')."', '{$_SERVER['REMOTE_ADDR']}')";
          $result2 = $connection->query($ipTableSql);
        }

        if (strpos($content, $_SERVER['REMOTE_ADDR']) == true) {
        } else {
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
                <input type="hidden" name="business" value="number2marcin@gmail.com">
                <!-- Specify a subscriptions button. -->
                <input type="hidden" name="cmd" value="_xclick-subscriptions">
                <!-- Specify details about the subscription that buyers will purchase -->
                <input type="hidden" name="item_name" value="Monthly Subscription">
                <input type="hidden" name="item_number" value="<?php echo $_SESSION['id']; ?>">
                <input type="hidden" name="currency_code" value="GBP">
                <input type="hidden" name="a3" id="paypalAmt" value="6">
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
      <div class="flex-container" style="background-color: #000000;width:100%;">
        <div class="row">
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id='32bit' class="text-center"><img src="websiteimages/32bit.png" style="width:100px;height:100px;"> <br> <span style="font: size 13px;">32-Bit <br> Version</span></a>
          </div>
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id='64bit' class="text-center"><img src="websiteimages/64bit.png" style="width:100px;height:100px;"> <br> <span style="font: size 13px;">64-Bit <br> Version</span></a>
          </div>
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id='128bit' class="text-center"><img src="websiteimages/128bit.png" style="width:100px;height:100px;"> <br> <span style="font: size 13px;">128-Bit <br> Version</span></a>
          </div>
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id="normal-game" class="text-center"><img src="websiteimages/normalgame.png" style="width:100px;height:100px;"> <br> <span style="font: size 13px;">Normal Game</a>
          </div>
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id="root" class="text-center"><img src="websiteimages/rootfiles.png" style="width:100px;height:100px;"> <br> <span style="font: size 13px;">Root Files</a>
          </div>
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id="bluestacksinstaller" class="text-center"><img src="websiteimages/bluestacks.png" style="width:100px;height:100px;"> <br> <span style="font: size 13px;">Bluestacks</a>
          </div>
          <div class="col-sm d-flex justify-content-center">
            <a href="#" id="noxplayer" class="text-center"><img src="websiteimages/noxplayer.png" style="width:100px;height:100px;"> <br> <span style="font: size 13px;">Nox Player</a>
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

  <? include "include/footer.php"; ?>

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