<?php
header('Content-type: application/json');
session_start();
$dbhost="localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "Base";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);

$answer = array();

if($con){

	$db = mysqli_select_db($con, $dbname);

	if($db){

	$res = mysqli_query($con, "SELECT * FROM users WHERE login='".$_POST['login']."' AND password='".$_POST['password']."'");

		while($result = mysqli_fetch_assoc($res)) {
		  	$_SESSION['role']=$result['role'];
		  	$_SESSION['login']= $result['Login'];
		  	$answer['login']=$result['Login'];
		  	$answer['role']=$result['role'];
		  	echo json_encode($answer);
		}

	} else {
		echo "Could not connect to database ".mysqli_error($con);	
	}
} else {
	echo "could not connect to server";
}

?>