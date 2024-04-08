<?php
	$hostName = "localhost";
 	$username = "root";
	$password = "";
	$databaseName = "sql_tstohome_com";
	$connection = new mysqli($hostName,$username,$password,$databaseName);

if ($connection -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connection -> connect_error;
  exit();
}

?>