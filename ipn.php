<?php include "include/config.php";
 $query = "INSERT INTO check_webhook (data, time_webhook) VALUES ('newtest2', NOW())";
// $query = "insert into check_webhook(data,time_webhook)values('newtest2',now())";
$query = $connection->query($query);



mail('tstohome@tstohome.com','IPN Initiated','IPN Initiated');
//mail('test@mail.ru','IPN File Send','IPN Initiated');


// read the post from paypal and add 'cmd'
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc'))
{
  $get_magic_quotes_exits = true;
}

// handle escape characters, which depends on setting of magic quotes
foreach ($_REQUEST as $key => $value)
{
  if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1)
  {
    $value = urlencode(stripslashes($value));
  }
  else
  {
    $value = urlencode($value);
  }
  $req .= "&$key=$value";
}

//STEP 1: IPN

$ipn_post_data = $_POST;

 
// STEP 2: Post IPN data back to paypal to validate
 
$ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
 
// In wamp like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path 
// of the certificate as shown below.
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
if( !($res = curl_exec($ch)) ) {
     error_log("Got " . curl_error($ch) . " when processing IPN data");
    curl_close($ch);
    exit;
}
curl_close($ch);
 
 
// STEP 3: Inspect IPN validation result and act accordingly
 
if (strcmp ($res, "VERIFIED") == 0) {
	$post_string='';
	foreach ($_REQUEST as $field => $value) {
$post_string .= $field . '=' . urlencode(stripslashes($value)) . '&';
}
    // check whether the payment_status is Completed
    // check that txn_id has not been previously processed
    // check that receiver_email is your Primary PayPal email
    // check that payment_amount/payment_currency are correct
    // process payment
 mail('tstohome@tstohome.com','IPN Success',$post_string);
    // assign posted variables to local variables
  /*  $item_name = $_POST['item_name'];
    $item_number = $_POST['item_number'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $payer_email = $_POST['payer_email'];
*/
    // <---- HERE you can do your INSERT to the database

} else if (strcmp ($res, "INVALID") == 1) {
	
	echo"test";
    // log for manual investigation
}
?>