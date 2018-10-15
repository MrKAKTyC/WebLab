<?php
include 'header.php';
?>

<link rel = "stylesheet" href = "css/animation_style.css">
<script type="text/javascript" src="js/animation_script.js"></script>

<canvas id="canv">
	
</canvas>
<div class="config">
	<input type="radio" value = "red" onClick="updateColor(this.value)" name="color" checked>Red<br>
	<input type="radio" value = "green" onClick="updateColor(this.value)" name="color">Green<br>
	<input type="radio" value = "circle" onClick="updateShape(this.value)" name="shape" checked>Circle<br>
	<input type="radio" value = "square" onClick="updateShape(this.value)" name="shape">Square<br>
	Speed
	<input type="range" id = "speed" value = "Speed" name="speed" min="1" max="10" step="1" style="direction: rtl" oninput="updateSpeed(this.value)"><br>
	<input type="button" id="start_btn" value = "Start" name="start">
	<input type="button" id="stop_btn" value = "Stop" name="stop">
</div>

<?php
include 'footer.php';
?>