<html>
<?php include 'header.php';?>
	<div class="main">
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
		    <!-- if admin -->
		    <th>Видалення</th>
		  </tr>
		  <!-- for each in db add line with <tr> wraper -->
		</table>
		<button onclick="document.getElementById('id_reg').style.display='block'" style="width:auto; display: block; margin-left: auto; margin-right: auto;">Add new user</button>
	</div>
		<!-- Register form -->
	<div id="id_reg" class="modal">
	  <form class="modal-content animate" action="/register.php">
	    <div class="imgcontainer">
	      <span onclick="document.getElementById('id_reg').style.display='none'" class="close" title="Close Modal">&times;</span>
	    </div>
	    <div class="container">
	      <label for="login"><b>Login</b></label>
	      <input type="text" placeholder="Enter nogin" name="login" required>

	      <label for="uname"><b>Name</b></label>
	      <input type="text" placeholder="Enter name" name="uname" required>

	      <label for="surname"><b>Surname</b></label>
	      <input type="text" placeholder="Enter surname" name="surname" required>

	      <label for="psw"><b>Password</b></label>
	      <input type="password" placeholder="Enter Password" name="psw" required>
	        
	      <button type="submit">Add</button>
	    </div>
	  </form>
	</div>
	<?php include 'footer.php';?>
</html>
