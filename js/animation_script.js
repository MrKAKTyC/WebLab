var speed = 1, id;
var shape = "circle", color = "red";

window.onload = function() {

	var canvas = document.querySelector('canvas');
	var ctx = canvas.getContext('2d');

	var width = canvas.width = window.innerWidth;
	var height = canvas.height = window.innerHeight;

	function random(min,max) {
	  var num = Math.floor(Math.random()*(max-min)) + min;
	  return num;
	}

	function Figure() {
	  this.x = random(0, width);
	  this.y = random(0, height);
	  this.velX = random(-10, 10);
	  this.velY = random(-10, 10);
	  this.size = random(10, 20);
	}
	Figure.prototype.draw = function() {
	  ctx.beginPath();
	  ctx.fillStyle = color;
	  if(shape == "circle")
	  {
	  	ctx.arc(this.x, this.y, this.size, 0, 2 * Math.PI);
	  } else {
	  	ctx.rect(this.x, this.y, this.size, this.size);
	  }
	  ctx.fill();
	}

	Figure.prototype.update = function() {
	  if ((this.x + this.size) >= width) {
		this.velX = -(this.velX);
	  }

	  if ((this.x - this.size) <= 0) {
		this.velX = -(this.velX);
	  }

	  if ((this.y + this.size) >= height) {
		this.velY = -(this.velY);
	  }

	  if ((this.y - this.size) <= 0) {
		this.velY = -(this.velY);
	  }

	  this.x += this.velX;
	  this.y += this.velY;
	}
	let start = document.getElementById('start_btn');
	let stop = document.getElementById('stop_btn');
	let speed_btn = document.getElementById('speed');
	var ball = new Figure();

	start.onclick = function() {
		if(id == 0)
			id = requestAnimationFrame(loop);
	}
	stop.onclick = function() {
		cancelAnimationFrame(id);
		id = 0;
	}
	speed_btn.oninput = function() {
    	speed = parseInt(speed_btn.value);
    	if(ball.velX >= 0){
    		ball.velX = speed;
    	}else{
    		ball.velX = -(speed);
    	}
    	if(ball.velY >= 0){
    		ball.velY = speed;
    	}else{
    		ball.velY = -(speed);
    	}
    	console.log(ball.x +"  "+ball.y+" || "+speed);
  	};

	function loop() {  
	  ctx.fillStyle = 'rgba(173, 216, 230, 0.25)';
	  ctx.fillRect(0, 0, width, height);
	  ball.draw();
	  ball.update();
	  console.log()
	  id = requestAnimationFrame(loop);
	}
	
	loop();
};

	function updateSpeed(newSpeed){
		speed = newSpeed;
		ball.velX = ball.velX*newSpeed;
		ball.velY = ball.velY*newSpeed;
	}

	function updateColor(newColor){
		color = newColor;
	}

	function updateShape(newShape){
		shape = newShape;
	}
