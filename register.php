<?php
	session_start();

	$dbhost="localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "Base";
	$con = mysqli_connect($dbhost, $dbuser, $dbpass);

	$return = array();

	header('Content-type: application/json');

	if($con){
		$db = mysqli_select_db($con, $dbname);
		if(!$db){
			$return['status'] = "Could not connect to database";
			http_response_code(500);
			die(json_encode($return));
		} else {
			$sql = "INSERT INTO `users`(`Login`, `Password`, `role`, `Name`,`Surname`, `Photo`) VALUES ('".$_POST['login']."','".$_POST['psw']."','".$_POST['role']."','".$_POST['name']."','".$_POST['surname']."','photo/def.png')";
			$res = mysqli_query($con, $sql);
			if($res){
				$return['status'] = "Succes";
				http_response_code(200);
				die(json_encode($return));
			}
		}
	} else {
		$return['status'] = "Could not connect to server";
		http_response_code(500);
		die(json_encode($return));
	}

?>