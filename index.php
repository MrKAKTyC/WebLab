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
		<table id="main_tab">
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
		  	echo "<th>";
		  	if(!($_SESSION['role']=='guest')) {
		  		echo "<a href='profile.php?user=".$result['Login']."'>$result[Login]</a>";
		  	} else {
		  		echo "$result[Login]";
		  		echo !$_SESSION['role']=='guest';
		  	}
		  	"</th>";
		  	echo "<th>$result[Name]</th>";
		  	echo "<th>$result[Surname]</th>";
		  	echo "<th>$result[role]</th>";
		  	echo '<th><img src='.$result['Photo'].' height="128" width="128"></th>';
		    if($_SESSION['role']=='admin')
		    	echo '<th>
				  		<button onclick="delet_user('.$result['id'].')">X</button>
					</th>';	
		  	echo "</tr>";
		  }
		  ?>
		</table>
		<?php
		if($_SESSION['role']=='admin'){
			echo "<button onclick=\"$('#id_reg').css('display','block')\" style=\"width:auto; display: block; \" margin-left: auto; margin-right: auto;\">Add new user</button>";
		}
		?>
	</div>


		<!-- Register form -->
	<div id="id_reg" class="modal">
	  <div class="modal-content animate">
	    <div class="imgcontainer">
	      <span onclick="document.getElementById('id_reg').style.display='none'" class="close" title="Close Modal">&times;</span>
	    </div>
	    <div class="container">
	      <label for="login"><b>Login</b></label>
	      <input id="r_login" type="text" placeholder="Enter login" name="login" required>

		  <label for="psw"><b>Password</b></label>
	      <input id="r_psw" type="password" placeholder="Enter Password" name="psw" required>
	      <br>
	      <label for="psw"><b>Role</b></label>
	      <select id="r_role" name="role">
	        <option>user</option>
	        <option>admin</option>
	      </select>
	      <br>
	      <label for="name"><b>Name</b></label>
	      <input id="r_name" type="text" placeholder="Enter name" name="name" required>
	      <label for="surname"><b>Surname</b></label>
	      <input id="r_surname" type="text" placeholder="Enter surname" name="surname" required>
	      <br>
	      <button id="r_btn" onclick="add_user()">Add</button>
	    </div>
	  </div>
	</div>

	<?php include 'footer.php';?>
</html>
