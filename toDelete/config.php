<?php
	$hostName = "localhost";
 	$username = "tstohome_sir5678";
	$password = "r4&jeg23-GsB8%!!fdgs324";
	$databaseName = "tstohome_simpsper_tstoDBnew123";
	$connection = new mysqli($hostName,$username,$password,$databaseName);

if ($connection -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connection -> connect_error;
  exit();
}
?>