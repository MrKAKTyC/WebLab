<?php

public function connect()
{
	$db = false;

	$dbhost="localhost";
	$dbuser = "root"; 
	$dbpass = ""; 
	$dbname = "Base";

	$con = mysqli_connect($dbhost, $dbuser, $dbpass);
	if($con){
		$db = mysqli_select_db($con, $dbname);
	}
	ruturn $db;
}

?>