<link rel = "stylesheet" href = "/assets/css/animation_style.css">
<script type="text/javascript" src="/assets/js/animation_script.js"></script>

<canvas id="canv">
	
</canvas>
<div class="config">
	<input type="color" onchange="updateColor(this.value)" name="color">Color<br>
	<input type="radio" value = "circle" onClick="updateShape(this.value)" name="shape" checked>Circle
	<input type="radio" value = "square" onClick="updateShape(this.value)" name="shape">Square<br>
	Speed
	<input type="range" id = "speed" value = "Speed" name="speed" min="1" max="10" step="1" style="direction: rtl" oninput="updateSpeed(this.value)"><br>
	<input type="button" id="start_btn" value = "Start" name="start">
	<input type="button" id="stop_btn" value = "Stop" name="stop">
</div>
