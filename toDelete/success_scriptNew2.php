<?php include "include/config.php";

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
if(isset($_SESSION['id']) || isset($_REQUEST['token']))
{
   
   
   $newdata=implode(',',$_POST);
    $query = "insert into check_webhook(data,time_webhook)values($newdata,now())";
$query = $connection->query($query);
   
    if(isset($_REQUEST['item_number'])){
    $userid=$_REQUEST['item_number'];}
    else {$userid=$_SESSION['id'];}
   
    
    $subscr_date = date("Y-m-d H:i:s");
//    $sessionDate = $_SESSION['subscriptionDate'];
//    if (!empty($sessionDate)){$subscr_date = $sessionDate;} else{
//    $subscr_date = date("Y-m-d H:i:s"); }
   
   $subscr_date_valid_to = date("Y-m-d H:i:s", strtotime(" + 1 month", strtotime($subscr_date))); 
   
   $payer_email='';
   $subscr_id='';
   if(isset($_REQUEST['tx'])){$txn_id=$_REQUEST['tx'];}
   else $txn_id='';
  
//    $query = "update users set subscription_id='".$subscr_id."',payer_email='".$payer_email."',transaction_id='".$txn_id."',registrationDate='".$subscr_date."', subscriptionDate='".$subscr_date_valid_to."' where id=$userid";
   $query = "update users set subscription_id='".$subscr_id."',payer_email='".$payer_email."',transaction_id='".$txn_id."',subscriptionDate='".$subscr_date_valid_to."' where id=$userid";
   if (!$connection->query($query)) 
   {
                echo("Error description: " . $connection->error);
   }
 
   header('location:https://www.tstohome.com/success.php');
    
    
}
