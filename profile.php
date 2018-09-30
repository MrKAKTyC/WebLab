<?php
	include 'header.php';
	$login = $_GET['user'];
	$dbhost="localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "Base";

	$con = mysqli_connect($dbhost, $dbuser, $dbpass);
	$result = [];

	if($con){
		$db = mysqli_select_db($con, $dbname);
		if(!$db){
			echo "Could not connect to database ".mysqli_error($con);
		} else {
			$sql = "SELECT * FROM users WHERE Login = '".$login."'";
			$res = mysqli_query($con, $sql);
			$result = mysqli_fetch_assoc($res);

			$sql = "SELECT * FROM users WHERE Login = '".$_SESSION['login']."'";
			$res = mysqli_query($con, $sql);
			$c_res = mysqli_fetch_assoc($res);
			$c_role = $c_res['role'];
		}
	} else {
		echo "could not connect to server";
	}
?>
	<div class="profile main">
		<!-- MAININFO DIV -->
		<div class="info">
			<p>
				<span class="leftline">Login</span>
				<span class="rightline"><input id="u_login" type="text" name="login" value="<?php
				 echo $result['Login'].'"';
				 if($c_role!='admin'){
					 	echo ' readonly';
				 } 
				 ?>></span>
			</p>
			<p>
				<span class="leftline">Name</span>
				<span class="rightline"><input id="u_name" type="text" name="name" value="<?php
					echo $result['Name'].'"';
					if($result['Login']!=$_SESSION['login'] & $c_role!='admin'){
						echo ' readonly';
					} 
				?>></span>
			</p>
			<p>
				<span class="leftline">Surname</span>
				<span class="rightline"><input id="u_surname" type="text" name="sname" value="<?php
				 echo $result['Surname'].'"';
					if($result['Login']!=$_SESSION['login'] & $c_role!='admin'){
						echo ' readonly';
					} 
				?>></span>
			</p>
			<p>
			<span class="leftline">Role</span>
			<span class="rightline">
				<select id="u_role" name="role" <?php if($c_role=='user') {echo "disabled";}?>>
				<?php
					if($result['role']=='user') {
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
				<input type="hidden" name="u_name" value="<?php echo $result['Login']; ?>" >
				<?php if($c_role=='admin' || $_SESSION['login'] == $result['Login']) {echo "<button onclick='change_data()' type=\"submit\">Save</button>";}?>
			</p>
		<!-- PASSWORD DIV -->
			<div <?php if($result['Login']!=$_SESSION['login']) {echo ' style = "display: none"';}?>>
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
					<input id="psw_u_name" type="hidden" name="u_name" value="<?php echo $result['Login']; ?>" >
					<span><button onclick="change_password()" type="submit">Reset password</button></span>
				<!-- </form> -->
			</div>
		</div>
		<!-- IMAGE DIV -->
		<div class="pic">
			<form enctype="multipart/form-data" method="POST" action="update_foto.php">
				<img src=<?php echo $result['Photo']; ?> height="128" width="128">
				<br>
				<input type="hidden" name="u_name" value="<?php echo $result['Login']; ?>" >
				<input type="hidden" name="f_name" value="<?php echo $result['Photo']; ?>" >
				<?php if($c_role=='admin' || $_SESSION['login'] == $result['Login']) {echo '
				<input type="file" name="fileToUpload" id="fileToUpload">
				<button type="submit">Update</button>';}?>
			</form>
			
		</div>
		<div style="clear: both; margin-left: auto; margin-right: auto;">
			<button onclick="go_home()";>Back</button>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</html>
