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
	$sql = "UPDATE users SET Photo='photo/"."2.png"."' WHERE Login='"."Max"."'";
	echo $sql."<br>";
	$res = mysqli_query($con, $sql);
		  while($result = mysqli_fetch_assoc($res)) {
		  	echo $result['id'];
		  	echo $result['Name'];
		  	echo $result['Surname'];
		  	echo $result['role'];
		  	echo $result['Photo'];
		  }
	}
} else {

echo "could not connect to server";

}

?>