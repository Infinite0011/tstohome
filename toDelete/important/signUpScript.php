<?php function getUserIP()
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
}if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin"){
header('location:index.php');
}else{
	include "config.php";
	$fname = ($_POST["fname"]);
	$lname = ($_POST["lname"]);
	$email = ($_POST["email"]);
	$discord = ($_POST["discord"]);
	$password1 = ($_POST["password1"]);
	$user_ip = getUserIP();
	$regDate = date('Y-m-d H:i:s');
	$d=mktime(11, 14, 54, 4, 1, 2022);
	$subdate = date('Y-m-d H:i:s', $d);
	$passwordhash = password_hash($password1, PASSWORD_DEFAULT);
	// $sql = 'SELECT * FROM users WHERE email= @0 AND password=@1';
   $query = "INSERT INTO users (firstname, lastName, email, discordName, ip, registrationDate, subscriptionDate, passwordhash) Values('$fname', '$lname', '$email', '$discord', '$user_ip', '$regDate', '$subdate', '$passwordhash')";

	// $query->bind_param(1, $fname);
	// $query->bind_param(2, $lname);
	// $query->bind_param(3, $email);
	// $query->bind_param(4, $discord);
	// $query->bind_param(5, $user_ip);
	// $query->bind_param(6, $regDate);
	// $query->bind_param(7, $regDate);
	// $query->bind_param(8, $fname, $lname, $email, $discord, $user_ip, $regDate, $regDate, $passwordhash );
	// $stmt->execute();
	if ($connection->query($query)) {
	    
	    	$_SESSION['status'] = "loggedin";
		$_SESSION['email'] = $email;
		echo "<script>alert('Registration Complete! Please buy subscription to view mod files below!');window.location.href='index.php';</script>";
	 } else {
		include "signup.php";
		echo "Error: " . $query . "<br>" . $connection->error;
		echo "<script>alert('Error: " . $query . "<br>" . $connection->error.");</script>";
	  }
	  
}

?>