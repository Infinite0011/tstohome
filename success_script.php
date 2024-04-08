<?php include "include/config.php";
// if ($_SERVER["HTTP_REFERER"]=="https://www.sandbox.paypal.com/") {
if ($_SERVER["HTTP_REFERER"] == "https://www.paypal.com/") {
    echo 'work';
} 

// elseif ($_SERVER["HTTP_REFERER"] == "https://www.sandbox.paypal.com/") {
//     echo 'work';
// } 

else {
    echo "This bug has already been fixed, now you need to buy a subscription.";
    exit;
}

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

if(isset($_SESSION['id']) || isset($_REQUEST['token']))
{
   $newdata=implode(',',$_POST);

    // $query = "insert into check_webhook(data,time_webhook)values($newdata,now())";
    $query = "INSERT INTO check_webhook (data, time_webhook) VALUES ('$newdata', NOW())";
 
$query = $connection->query($query);

    if(isset($_REQUEST['item_number'])){
    $userid=$_REQUEST['item_number'];}
    else {$userid=$_SESSION['id'];}
 
    $registrationDate = date("Y-m-d H:i:s"); 
    if (strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) >= strtotime(date('Y-m-d')))  {$subscr_date = date($_SESSION['subscriptionDate']); } else { $subscr_date = date("Y-m-d H:i:s"); }                
    $subscr_date_valid_to = date("Y-m-d H:i:s", strtotime(" + 1 month", strtotime($subscr_date))); 
    
//    $subscr_date = date("Y-m-d H:i:s");    
//    $subscr_date_valid_to = date("Y-m-d H:i:s", strtotime(" + 1 month", strtotime($subscr_date))); 
   
   $payer_email='';
   $subscr_id='';
   if(isset($_REQUEST['tx'])){$txn_id=$_REQUEST['tx'];}
   else $txn_id='';
  
   $query = "update users set subscription_id='".$subscr_id."',payer_email='".$payer_email."',transaction_id='".$txn_id."',registrationDate='".$registrationDate."', subscriptionDate='".$subscr_date_valid_to."' where id=$userid";
   if (!$connection->query($query)) 
   {
                echo("Error description: " . $connection->error);
   }
   header('location:https://www.tstohome.com/success.php');
    
    
}
