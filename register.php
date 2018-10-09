<?php
	session_start();

	$dbhost="localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "Base";
	$con = mysqli_connect($dbhost, $dbuser, $dbpass);

	$return = array();

	// header('Content-type: application/json');

	if($con){
		$db = mysqli_select_db($con, $dbname);
		if(!$db){
			$return['status'] = "Could not connect to database";
			http_response_code(500);
			// die(json_encode($return));
		} else {
			$sql = "INSERT INTO `users`(`Login`, `Password`, `role`, `Name`,`Surname`, `Photo`) VALUES ('".$_POST['login']."','".$_POST['psw']."','".$_POST['role']."','".$_POST['name']."','".$_POST['surname']."','photo/def.png')";
			$res = mysqli_query($con, $sql);
			if($res){
				$sql = "SELECT * FROM users WHERE Login = '".$_POST['login']."'";
				$res = mysqli_query($con, $sql);
				$result = mysqli_fetch_assoc($res);
				echo "<td>".$result['id']."</td><td><a href='profile.php?user=".$_POST['login']."'>".$_POST['login']."</td><td>".$_POST['name']."</td><td>".$_POST['surname']."</td><td>".$_POST['role']."</td><td><img src=".$result['Photo']." height='128' width='128'></td><td><button onclick=delet_user(".$result['id'].")>X</button></td>";
				$return['status'] = "Succes";
				http_response_code(200);
				// die(json_encode($return));
			}
		}
	} else {
		$return['status'] = "Could not connect to server";
		http_response_code(500);
		// die(json_encode($return));
	}

?>