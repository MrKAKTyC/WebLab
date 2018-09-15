<?php
	session_start();
	unset($_SESSION['role']);
	unset($_SESSION['login']);
	header("Location: index.php");
?>