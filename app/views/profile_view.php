	<div class="profile main">
		<!-- MAININFO DIV -->
		<div class="info">
			<p>
				<span class="leftline">Login</span>
				<span class="rightline"><input id="u_login" type="text" name="login" value="<?php
				 echo $data['Login'].'"';
				 if($_SESSION['role']!='admin'){
					 	echo ' readonly';
				 } 
				 ?>></span>
			</p>
			<p>
				<span class="leftline">Name</span>
				<span class="rightline"><input id="u_name" type="text" name="name" value="<?php
					echo $data['Name'].'"';
					if($data['Login']!=$_SESSION['login'] & $_SESSION['role']!='admin'){
						echo ' readonly';
					} 
				?>></span>
			</p>
			<p>
				<span class="leftline">Surname</span>
				<span class="rightline"><input id="u_surname" type="text" name="sname" value="<?php
				 echo $data['Surname'].'"';
					if($data['Login']!=$_SESSION['login'] & $_SESSION['role']!='admin'){
						echo ' readonly';
					} 
				?>></span>
			</p>
			<p>
			<span class="leftline">Role</span>
			<span class="rightline">
				<select id="u_role" name="role" <?php if($_SESSION['role']=='user') {echo "disabled";}?>>
				<?php
					if($data['role']=='user') {
						echo "
						<option selected> user </option>
						<option> admin </option>
						";
					} else { 
						echo "
						<option> user </option>
						<option selected> admin </option>
						";
					}
				?>
				</select></span>
				<input type="hidden" name="u_name" value="<?php echo $data['Login']; ?>" >
				<?php if($_SESSION['role']=='admin' || $_SESSION['login'] == $data['Login']) {echo "<button onclick='change_data()' type=\"submit\">Save</button>";}?>
			</p>
		<!-- PASSWORD DIV -->
			<div <?php if($data['Login']!=$_SESSION['login']) {echo ' style = "display: none"';}?>>
				<!-- <form method="POST" action="update_psw.php"> -->
					<p>
						<span class="leftline">Old password</span>
						<span class="rightline"><input id="u_oldpsw" type="password" name="old_psw"></span>
					</p>
					<p>
						<span class="leftline">New password</span>
						<span class="rightline"><input id="u_newpsw" type="password" name="new_psw"></span>
					</p>
					<p>
						<span class="leftline">New password</span>
						<span class="rightline"><input id="u_sbmtpsw" type="password" name="new_psw2"></span>
					</p>
					<input id="psw_u_name" type="hidden" name="u_name" value="<?php echo $data['Login']; ?>" >
					<span><button onclick="change_password()" type="submit">Reset password</button></span>
				<!-- </form> -->
			</div>
		</div>
		<!-- IMAGE DIV -->
		<div class="pic">
			<!-- <form enctype="multipart/form-data" method="POST" action="update_foto.php"> -->
				
				<img src=<?php echo '"/'.$data['Photo'].'"'; ?> id="prof_pic" height="128" width="128">
				<br>
				<input type="hidden" id="foto_user_name" value="<?php echo $data['Login']; ?>" >
				<input type="hidden" id="old_photo" value="<?php echo $data['Photo']; ?>" >
				<?php if($_SESSION['role']=='admin' || $_SESSION['login'] == $data['Login']) {echo '
				<input type="file" name="new_photo" id="fileToUpload">
				<button onclick="change_image()">Update</button>';}?>
			<!-- </form> -->
			
		</div>
		<div style="clear: both; margin-left: auto; margin-right: auto;">
			<button onclick="go_home()";>Back</button>
		</div>
	</div>