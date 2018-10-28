<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<link rel = "stylesheet" href = "/css/style.css">
		<link rel = "stylesheet" href = "/css/log_style.css">
		<link rel = "stylesheet" href = "/css/prof_style.css">
		<script type="text/javascript" src="/js/home_script.js"></script>
		<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="/js/profile_script.js"></script>
	</head>
	<body>
    <div class="header">Club hub</div>
    <div class="menu">
    	<a href="/">Home</a>
    	<a href="/media/index">Media</a>
    	<a href="/animation">Animation</a>
    </div>

	<?php 
		include 'app/views/'.$content_view;
	?>

	</body>
	<footer class="header">
				created by Max Nechaev Ks-32
	</footer>
</html>