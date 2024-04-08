<?php

if (session_status() == PHP_SESSION_NONE) {

	session_start();

}

include "config.php";

if (isset($_SESSION['email'])){

    $query = $connection->query('SELECT * FROM users WHERE email="'.$_SESSION['email'].'" AND 1=1');

    while($row = mysqli_fetch_array($query)){

		$_SESSION['name'] = $row["firstname"];

        $_SESSION['lastName'] = $row["lastName"];

        $_SESSION['discordName'] = $row["discordName"];

        $_SESSION['ip'] = $row["ip"];

        $_SESSION['registrationDate'] = $row["registrationDate"];

        $_SESSION['subscriptionDate'] = $row["subscriptionDate"];

        $_SESSION['id'] = $row["id"];

	}

}else{

    include "login.php";

}

?>