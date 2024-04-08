<?php 

$donated=$_SERVER['REMOTE_ADDR'];

error_reporting(0);


     if (isset($_REQUEST['f']))

	{

		$file = substr($_REQUEST['f'], 1);

	} else {

		die();

	}

	$r = explode('/', $file);

	$file_name = array_pop($r);

	header ('Content-Type: application/zip');

	header("Content-Disposition: attachment; filename=\"".$filename."\"");
	
	//THIS IS WHERE YOU WILL ADD THE IP ADDRESS OF THE ONES TO SEND TO THE ELITE VERSION
    if ($donated == '70.24.110.80' ||  	//Looking to have this done automatically and not entered manually. 
	//The member will only be able to get access if there ip address is registered on the website and their subscription is not expired.
		$donated == '86.6.178.140')		

    // THIS IS THE DLC LOCATION FOR THE ELITE VERSION
	{
	    $url = 'http://tstohome.com/files/xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx/' . $file;
	}
	// END
	
	else
    //THIS IS THE DLC LOCATION WHERE ALL OTHER USERS WILL CONNECT
	{
		$url = 'http://oct2018-4-35-0-uam5h44a.tstodlc.eamobile.com/netstorage/gameasset/direct/simpsons/' . $file;
	}
    // END
	readfile($url);
	
	//IP logging
	$v_date = date("l d F H:i:s");
	$fp = fopen("ips.txt", "a");
	fputs($fp, "IP: $donated - DATE: $v_date\n\n");
	fclose($fp);
	
?>