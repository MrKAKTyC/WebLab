<?php

$dbhost="localhost"; //replace with your hostname

$dbuser = "root"; //replace with your admin username

$dbpass = ""; //password of your admin

$dbname = "Base";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);

if($con){

$db = mysqli_select_db($con, $dbname);

if(!$db){

echo "Could not connect to database ".mysqli_error($con);

} else {
	echo "ok?";
	$res = mysqli_query($con, "SELECT * FROM users");
	 ?>
		<table>
		  <caption>
		    Зареєстровані користувачі
		  </caption>
		  <tr>
		    <th>№</th>
		    <th>Ім'я</th>
		    <th>Прізвище</th>
		    <th>Роль</th>
		    <th>Фото</th>
		    <th>Видалення</th>
		  </tr>
		  <?php
		  while($result = mysqli_fetch_assoc($res)) {
		  	echo "<tr>";
		  	echo "<th>$result[id]</th>";
		  	echo "<th>$result[Name]</th>";
		  	echo "<th>$result[Surname]</th>";
		  	echo "<th>$result[role]</th>";
		  	echo "<th>$result[Photo]</th>";
		  	echo "</tr>";
		  }
		  ?>
		</table>
		<?php	
	}
} else {

echo "could not connect to server";

}

?>