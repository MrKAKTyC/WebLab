<?php
include 'header.php';

$dbhost="localhost";
$dbuser = "root"; 
$dbpass = ""; 
$dbname = "Base";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);
$db = mysqli_select_db($con, $dbname);
$res = mysqli_query($con, "SELECT * FROM media");

echo '<div class = content>';
	
while($result = mysqli_fetch_assoc($res)) {
	echo "<div class = content_block>";
	echo $result['name'].'<br>';
	if ($result['local']==0) {
		echo $result['src'];
	} else {
		if($result['type'] == 'audio'){
			echo " <audio controls>
					<source src=".$result['src']." type='audio/mpeg'>
					Your browser does not support the audio element.
					</audio> ";
		}else{
			echo " <video controls style='width: 100%'>
					<source src=".$result['src']." type='video/mp4'>
					Your browser does not support the video element.
					</video> ";
		}
	}
	echo "</div>";
}

echo '</div>';


include 'footer.php';
?>
