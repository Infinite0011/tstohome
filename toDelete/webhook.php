<?php $data=file_get_contents("php://input");


include('config.php');

if($data==''){$data='no data';}

 $query = "insert into check_webhook(data,time_webhook)values('".addslashes($data)."',now())";
	$query = $connection->query($query);



// Next an example of how you can process and interact with the webhook data on your server:

$data=json_decode($data);
if($data->event_type == 'BILLING.SUBSCRIPTION.ACTIVATED')
{
 
 $subscription_id = $data->resource->id;
 $payeremail = $data->resource->subscriber->email_address;
 $plan_id = $data->resource->plan_id;
 $payerid = $data->resource->subscriber->payer_id;

 // USERID
 $userid = $data->resource->custom_id;
 $next_billing_date_time = $data->resource->billing_info->next_billing_time;
 $next_billing=explode('T',$next_billing_date_time);
 $next_billing_date=$next_billing[0];
 
$query = "update users set subscription_id='".$subscription_id."',payer_id='".$payerid."',plan_id='".$plan_id."',subscriptionDate='".$next_billing_date."' where id=$userid";

	
	if (!$connection->query($query)) 
	{
        echo("Error description: " . $connection->error);
    }
 
 
 // handle the subscription
 // Example: save subscription_id into our database
 
}




?>