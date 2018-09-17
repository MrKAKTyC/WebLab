<?php

$dbhost="localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "Base";
$con = mysqli_connect($dbhost, $dbuser, $dbpass);

if($con){

$db = mysqli_select_db($con, $dbname);

if(!$db){

echo "Could not connect to database ".mysqli_error($con);

} else {
		$sql = "UPDATE users SET Name='".$_POST['name']."', Surname='".$_POST['sname']."', role='".$_POST['role']."' WHERE Login='".$_POST['u_name']."'";
		echo $sql."<br>";
		$res = mysqli_query($con, $sql);

		header("Location:profile.php?user=".$_POST['u_name']);
	}
} else {

echo "could not connect to server";

}


?>