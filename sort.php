<?php
		// header('Content-type: application/json');
		$dbhost="localhost";
		$dbuser = "root"; 
		$dbpass = ""; 
		$dbname = "Base";

		$rows = array();
		$con = mysqli_connect($dbhost, $dbuser, $dbpass);
		$db = mysqli_select_db($con, $dbname);
		$res = mysqli_query($con, "SELECT * FROM users ORDER BY ".$_POST['col']." ".$_POST['dir']);
		while($result = mysqli_fetch_assoc($res)) {
			$rows[] = $result;
		}
		print json_encode($rows);

?>