<html>
<?php 
	include 'header.php';

	$dbhost="localhost";
	$dbuser = "root"; 
	$dbpass = ""; 
	$dbname = "Base";

	$con = mysqli_connect($dbhost, $dbuser, $dbpass);

	$db = mysqli_select_db($con, $dbname);

	$res = mysqli_query($con, "SELECT * FROM users");

?>
	<div class="main">
		<table>
		  <caption>
		    Зареєстровані користувачі
		  </caption>
		  <tr>
		    <th>id</th>
		    <th>Логін</th>
		    <th>Ім'я</th>
		    <th>Прізвище</th>
		    <th>Роль</th>
		    <th>Фото</th>
		    <?php
		    if($_SESSION['role']=='admin'){
		    	echo "<th>Видалення</th>";
			}
		    ?>
		  </tr>
		  <?php
		  while($result = mysqli_fetch_assoc($res)) {
		  	echo "<tr>";
		  	echo "<th>$result[id]</th>";
		  	echo "<th>$result[Login]</th>";
		  	echo "<th>$result[Name]</th>";
		  	echo "<th>$result[Surname]</th>";
		  	echo "<th>$result[role]</th>";
		  	echo "<th><img src=\"$result[Photo]\"></th>";
		    if($_SESSION['role']=='admin')
		  		echo "<th><a href=''>X</a></th>";
		  	echo "</tr>";
		  }
		  ?>
		</table>
		<?php
		if($_SESSION['role']=='admin'){
			echo "<button onclick=\"document.getElementById('id_reg').style.display='block'\" style=\"width:auto; display: block; \" margin-left: auto; margin-right: auto;\">Add new user</button>";
		}
		?>
	</div>


		<!-- Register form -->
	<div id="id_reg" class="modal">
	  <form class="modal-content animate" action="register.php" method="POST">
	    <div class="imgcontainer">
	      <span onclick="document.getElementById('id_reg').style.display='none'" class="close" title="Close Modal">&times;</span>
	    </div>
	    <div class="container">
	      <label for="login"><b>Login</b></label>
	      <input type="text" placeholder="Enter nogin" name="login" required>

		  <label for="psw"><b>Password</b></label>
	      <input type="password" placeholder="Enter Password" name="psw" required>
	      
	      <label for="psw"><b>Role</b></label><br>
	      <select  name="role">
	        <option>user</option>
	        <option>admin</option>
	      </select><br>

	      <label for="name"><b>Name</b></label>
	      <input type="text" placeholder="Enter name" name="name" required>

	      <label for="surname"><b>Surname</b></label>
	      <input type="text" placeholder="Enter surname" name="surname" required>

	        
	      <button type="submit">Add</button>
	    </div>
	  </form>
	</div>

	<?php include 'footer.php';?>
</html>
