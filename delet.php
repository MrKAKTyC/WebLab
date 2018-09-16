<?php

$dbhost="localhost"; //replace with your hostname

$dbuser = "root"; //replace with your admin username

$dbpass = ""; //password of your admin

$dbname = "Base";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);

if($con){
	$db = mysqli_select_db($con, $dbname);
	if(!$db){
		echo "Could not connect to database ".mysqli_error($con);
	} else {
		$sql = "DELETE FROM `users` WHERE id=".$_POST['id'];

		echo "$sql";
		$res = mysqli_query($con, $sql);
		if($res){
			echo "deleted";
			header("Location:index.php");
		}
	}
} else {
	echo "could not connect to server";
}

?>