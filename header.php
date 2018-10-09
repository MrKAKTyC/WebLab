<!DOCTYPE html>
<html>
	<head>
		<?php
			session_start();
			if(!array_key_exists('role', $_SESSION)) {
				$_SESSION['role']="guest";
			};
		?>

		<meta charset="UTF-8">
		<link rel = "stylesheet" href = "css/style.css">
		<link rel = "stylesheet" href = "css/log_style.css">
		<link rel = "stylesheet" href = "css/prof_style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/home_script.js"></script>
		<script type="text/javascript" src="js/profile_script.js"></script>
	</head>
	<body>
    <div class="header">Club hub</div>
    <div class="menu">
    	<a href="index.php">Home</a>
    	<a href="media.php">Media</a>
    	<a href="animation.php">Animation</a>
    </div>
	<div class="main">
		<p id="Greeting" style="float: left; margin-left: 10px;"> Welcome, 
			<?php
			if($_SESSION['role']=='guest'){
				echo "guest";
			} else {
				echo "$_SESSION[login]";
			}
			?>

		 </p>
		<p id="ac_action" style="float: right;"> 
			<?php
			if ($_SESSION['role']=='guest') {
				echo '<button onclick="$(\'#id01\').show()" style="width:auto;">Login</button>';
			} else {
				echo '<button id = "l_out" onclick="log_out()" style="width:auto;" >Logoff</button>';
			}
			?>
		</p>
		<div style="clear: both;"></div>	
	</div>