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

		if ($_POST['new_psw']==$_POST['new_psw2']) {
			if (strlen($_POST['new_psw'])>=6) {
				$sql = "UPDATE users SET Password='".$_POST['new_psw']."' WHERE Login='".$_POST['u_name']."'";
				$res = mysqli_query($con, $sql);
				header("Location:profile.php?user=".$_POST['u_name']);
			} else {
				echo "Password is too short";
			}
		} else {
			echo "Passwords missmatch";
		}
	}
} else {
echo "could not connect to server";
}



?>