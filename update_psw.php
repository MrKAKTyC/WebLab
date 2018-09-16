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
		$sql = "UPDATE users SET Password='".$_POST['new_psw']."' WHERE Login='".$_POST['u_name']."'";
		echo $sql."<br>";
		$res = mysqli_query($con, $sql);
		  while($result = mysqli_fetch_assoc($res)) {
		  	echo $result['id'];
		  	echo $result['Name'];
		  	echo $result['Surname'];
		  	echo $result['role'];
		  	echo $result['Photo'];
		  }
		header("Location:profile.php?user=".$_POST['u_name'])
	}
	}
} else {

echo "could not connect to server";

}


?>