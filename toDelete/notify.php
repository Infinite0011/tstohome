<?php include('config.php');

$query = "insert into check_webhook(data,time_webhook)values('newtest2',now())";
$query = $connection->query($query);



mail('tstohome@tstohome.com','IPN Initiated','IPN Initiated');


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




 $ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
// $ch = curl_init('https://www.paypal.com/cgi-bin/webscr'); 
if ($ch == FALSE) { 
    return FALSE; 
} 
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $req); 
curl_setopt($ch, CURLOPT_SSLVERSION, 6); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1); 
 
// Set TCP timeout to 30 seconds 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name')); 
$res = curl_exec($ch); 
 
  
$tokens = explode("\r\n\r\n", trim($res)); 
$res = trim(end($tokens)); 

 mail('tstohome@tstohome.com','all data2',$req);
if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) { 
      
     
      
      
      
      
        if(isset($_POST['subscr_id']))
        {
      
            $paypalInfo = $_POST;
            
            $subscr_id = $paypalInfo['subscr_id']; 
            $payer_email = $paypalInfo['payer_email']; 
            $item_name = $paypalInfo['item_name']; 
            $item_number = $paypalInfo['item_number']; 
            $userid = $paypalInfo['custom']; 
            $subscr_period=$paypalInfo['period3'];
            $subscr_date = date("Y-m-d H:i:s"); 
            $subscr_date_valid_to = date("Y-m-d H:i:s", strtotime(" + 1 month", strtotime($subscr_date))); 
   
            $txn_id=$paypalInfo['txn_id']; 
            
             $query = "update users set subscription_id='".$subscr_id."',payer_email='".$payer_email."',transaction_id='".$txn_id."',subscriptionDate='".$subscr_date_valid_to."' where id=$userid";
             
             
	
        	if (!$connection->query($query)) 
        	{
                echo("Error description: " . $connection->error);
            }
            $query=addslashes($query);
             mail('tstohome@tstohome.com','all data2',$req);
           
	
            
            
        }
  

            
            
          
     
}
header("HTTP/1.1 200 OK");
?> 