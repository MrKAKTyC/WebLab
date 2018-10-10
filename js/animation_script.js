var X_loc = 100, Y_loc = 10;
var speed = 1, x_speed = 1, y_speed = 1;
var timer = 0;
var shape = "circle";
var color = "red";
var context;
var width;
var height;
var size = 10;


function start() {
	if(timer == 0)
		timer = setInterval(animate, 10*speed);
}

function stop() {
	clearInterval(timer);
	timer = 0;
}

function updateSpeed(newSpeed){
	speed = newSpeed;
	stop();
	start();
}

function updateColor(newColor){
	color = newColor;
}

function updateShape(newShape){
	shape = newShape;
}


function animate(){
    if (X_loc + this.radius > innerWidth || X_loc - this.radius < 0){
    	this.dx = -this.dx
  	}
    if (this.y + this.radius > innerHeight || this.y - this.radius < 0){
    	this.dy = -this.dy
	}
	// if(x_speed == 1){
	// 	if(X_loc+1+size >= width){
	// 		x_speed *= (-1);
	// 		console.log("Max x: " + x_speed);
	// 	}
	// } else {
	// 	if(X_loc-1 <= 0){
	// 		x_speed *= (-1);
	// 		console.log("Min x: " + x_speed);
	// 	}
	// }
	// if(y_speed == 1){
	// 	if(X_loc+1+size >= width){
	// 		y_speed *= (-1);
	// 		console.log("Max y: " + y_speed);
	// 	}
	// } else {
	// 	if(X_loc-1 <= 0){
	// 		y_speed *= (-1);
	// 		console.log("Min y: " + y_speed);
	// 	}
	// }
	 X_loc += x_speed;
	 Y_loc += y_speed;
 	repaint();
}

function repaint(){	
	context.rect(X_loc,Y_loc,size,size);
	// context.stroke();
	context.fill();
}

window.onload = function(){
	let canvas = document.getElementById('canv');
	width = canvas.width = window.innerWidth;
	height = canvas.height = window.innerHeight;
	context = canvas.getContext('2d');
	context.fillStyle = "white";
	// context.rect(0,0,width,height);
	context.fill();
	context.fillStyle = "green";
}