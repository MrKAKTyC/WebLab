<?php
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
		}
	} else {
		echo "could not connect to server";
	}
?>

<html>
	<?php include 'header.php'; ?>
	<div class="profile main">
		<div class="info">
			<p class="leftline">Login</p>
			<p class="rightline"><input type="text" name="login" value="<?php
			 echo $result['Login'].'"';
			 if($result['Login']!=$_SESSION['login']){
				 	echo ' readonly';
			 } 
			 ?>></p>
			<br>
			<p class="leftline">Name</p>
			<p class="rightline"><input type="text" name="name" value="<?php
				echo $result['Name'].'"';
				if($result['Login']!=$_SESSION['login']){
					echo ' readonly';
				} 
			?>></p>
			<br>
			<p class="leftline">Surname</p>
			<p class="rightline"><input type="text" name="sname" value="<?php
			 echo $result['Surname'].'"';
				if($result['Login']!=$_SESSION['login']){
					echo ' readonly';
				} 
			?>></p>
			<br>
			<p class="leftline">Role</p>
			<p class="rightline">
				<select name="role">
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
				</select></p>
			<br>
			<div <?php if($result['Login']!=$_SESSION['login']) {echo ' style = "display: none"';}?>>
				<form method="POST" action="update_psw.php">
					<p class="leftline">Old password</p>
					<p class="rightline"><input type="password" name="old_psw"></p>
					<br>
					<p class="leftline">New password</p>
					<p class="rightline"><input type="password" name="new_psw"></p>
					<br>
					<p class="leftline">New password</p>
					<p class="rightline"><input type="password" name="new_psw2"></p>
					<input type="hidden" name="u_name" value="<?php echo $result['Login']; ?>" >
					<p><button type="submit">Reset password</button></p>
				</form>
			</div>
		</div>
		<div class="pic">
			<form enctype="multipart/form-data" method="POST" action="upload_foto.php">
				<img src=<?php echo $result['Photo']; ?> height="128" width="128">
				<br>
				<input type="hidden" name="u_name" value="<?php echo $result['Login']; ?>" >
				<input type="file" name="fileToUpload" id="fileToUpload">
				<button type="submit">Update</button>
			</form>
			
		</div>
		<div style="clear: both; margin-left: auto; margin-right: auto;">
			<button>Back</button>
			<button>Save</button>

		</div>
	</div>
	<?php include 'footer.php'; ?>
</html>
