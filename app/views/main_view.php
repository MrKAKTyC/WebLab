<div class="main">
	<p id="Greeting" style="float: left; margin-left: 10px;"> Welcome, 
		<?php
		// $_SESSION['role'] = 'admin';
		// $_SESSION['login'] = 'Max';
		if($_SESSION['role']=='guest'){
			echo "guest";
		} else {
			echo "$_SESSION[login]";
		}
		?>

	</p>
	<p id="ac_action" style="float: right;"> 
		<?php
		if ($_SESSION['role']=='guest') {
			echo '<button onclick="$(\'#id01\').show()" style="width:auto;">Login</button>';
		} else {
			echo '<button id = "l_out" onclick="log_out()" style="width:auto;" >Logoff</button>';
		}
		?>
	</p>
	<div style="clear: both;"></div>	
</div>
<div class="main">
	<table id="main_tab">
		<caption>
			Зареєстровані користувачі
		</caption>
		<tr>
			<th><button onclick="sort('id')">id</button></th>
			<th><button onclick="sort('login')">Логін</button></th>
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
		while($result = mysqli_fetch_assoc($data)) {
			echo "<tr id='".$result['id']."'>";
			echo "<td>$result[id]</td>";
			echo "<td>";
			if(!($_SESSION['role']=='guest')) {
				echo "<a href='/profile/show/".$result['Login']."'>$result[Login]</a>";
			} else {
				echo "$result[Login]";
  		// echo !$_SESSION['role']=='guest';
			}
			"</td>";
			echo "<td>$result[Name]</td>";
			echo "<td>$result[Surname]</td>";
			echo "<td>$result[role]</td>";
			echo '<td><img src='.$result['Photo'].' height="128" width="128"></td>';
			if($_SESSION['role']=='admin')
				echo '<td>
			<button onclick="delet_user('.$result['id'].')">X</button>
			</td>';	
			echo "</tr>";
		}
		?>
	</table>
	<?php
	if($_SESSION['role']=='admin'){
		echo "<button id='add_usr' onclick=\"$('#id_reg').css('display','block')\" style=\"width:auto; display: block; \" margin-left: auto; margin-right: auto;\">Add new user</button>";
	}
	?>
</div>


<!-- Login form -->
<div id="id01" class="modal ">
	<div class="modal-content animate">
		<div class="imgcontainer">
			<span onclick="$('#id01').hide()" class="close" title="Close Modal">&times;</span>
		</div>
		<div class="container">
			<label for="uname"><b>Login</b></label>
			<input id="l_login" type="text" placeholder="Enter Login" name="login" required>
			<br>
			<label for="psw"><b>Password</b></label>
			<input id="l_psw" type="password" placeholder="Enter Password" name="password" required>
			<br>
			<button id="l_in" onclick="log_in()" class="button_lgn">Login</button>
		</div>
	</div>
</div>

<!-- Register form -->
<div id="id_reg" class="modal">
	<div class="modal-content animate">
		<div class="imgcontainer">
			<span onclick="$('#id_reg').hide()" class="close" title="Close Modal">&times;</span>
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

