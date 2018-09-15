<html>
	<?php include 'header.php'; ?>
	<div class="profile main">
		<div class="info">
			<p class="leftline">Login</p>
			<p class="rightline"><input type="text" name="login" value="Vasia" readonly></p>
			<br>
			<p class="leftline">Name</p>
			<p class="rightline"><input type="text" name="name" value="Vasiliy" readonly></p>
			<br>
			<p class="leftline">Surname</p>
			<p class="rightline"><input type="text" name="sname" value="Pupkin" readonly></p>
			<br>
			<p class="leftline">Role</p>
			<p class="rightline"><select name="role" readonly><option>user</option><option>admin</option></select></p>
			<br>
			<p class="leftline">Old password</p>
			<p class="rightline"><input type="password" name="login" readonly></p>
			<br>
			<p class="leftline">New password</p>
			<p class="rightline"><input type="password" name="login" readonly></p>
			<br>
			<p class="leftline">New password</p>
			<p class="rightline"><input type="password" name="login" readonly></p>
		</div>
		<div class="pic">
			<img src="img/1.png" height="256" width="256">
			<br>
			<input type="file" name="Photo">
		</div>
		<div style="clear: both; margin-left: auto; margin-right: auto;">
			<button>Back</button>
			<button>Save</button>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</html>
