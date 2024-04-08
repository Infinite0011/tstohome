<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin"){
	include "index.php";
}else{

	$email = ($_POST["email"]);
	include "include/config.php";
	$password = ($_POST["password"]);
	// $password = password_hash($password, PASSWORD_DEFAULT);
	// $sql = 'SELECT * FROM users WHERE email= @0 AND password=@1';
	$query = "SELECT * FROM users WHERE email='$email'";
	$query = $connection->query($query);
	while($row = mysqli_fetch_array($query)){
		$readEmail = $row['email'];
		$readpass = $row['passwordhash'];
		$id=$row['id'];
	}

	if (isset($readEmail) && $readEmail == $email && password_verify($password, $readpass)){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		// echo password_verify($password, $readpass);
		$_SESSION['status'] = "loggedin";
		$_SESSION['email'] = $readEmail;
		$_SESSION['id'] = $id;
	
		include "index.php";
	}else{
		$_SESSION["logintry"]=2;
		include "login.php";
	}
	
}

?>