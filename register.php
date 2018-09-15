<?php
	session_start();

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
			$res = mysqli_query($con, "INSERT INTO 'users'('Login', 'Password', 'role', 'Name', 'Surname', 'Photo') VALUES ([".$_POST['login']."],[".$_POST['psw']."],[".$_POST['role']."],[".$_POST['name']."],[".$_POST['surname']."],[photo/def.png])");
			while($result = mysqli_fetch_assoc($res)) {
			echo "$result[id]";
			header('Location: index.php');
			}
		}
	} else {

	echo "could not connect to server";

	}

?>