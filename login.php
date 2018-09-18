<?php
 session_start();

$dbhost="localhost"; //replace with your hostname

$dbuser = "root"; //replace with your admin username

$dbpass = ""; //password of your admin

$dbname = "Base";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);

if($con){

	$db = mysqli_select_db($con, $dbname);

	if($db){

	$res = mysqli_query($con, "SELECT * FROM users WHERE login='".$_POST['login']."' AND password='".$_POST['password']."'");

		while($result = mysqli_fetch_assoc($res)) {
		  	echo "$result[id]";
		  	$_SESSION['role']=$result['role'];
		  	$_SESSION['login']= $result['Login'];
		  	// header('Location: index.php');
		}

	} else {
		echo "Could not connect to database ".mysqli_error($con);	
	}
} else {
	echo "could not connect to server";
}

?>
<a href="/">Home</a>