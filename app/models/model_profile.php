<?php
class Model_profile extends Model
{
	private $base;

	public function __construct()
	{
		$db = new SQLBase("localhost", "root", "");
		$connect = $db->connect();
		$db->select_base("Base");
		$this->base = $db;
	}

	public function get_data()
	{	
	}

	public function get_user_data($user)
	{	
		$sql = "SELECT * FROM users WHERE Login = '".$user."'";
		$res = $this->base->make_request($sql);
		$result = mysqli_fetch_assoc($res);
		return $result;
	}

	public function update_data($name, $sname, $role, $login)
	{
		$sql = "UPDATE users SET Name='".$name."', Surname='".$sname."', role='".$role."' WHERE Login='".$login."'";
		$res = $this->base->make_request($sql);
	}
	public function update_pass($old_psw, $new_psw, $login)
	{
		$sql = "SELECT Password FROM users WHERE Login='".$login."'";
		$res = $this->base->make_request($sql);
		$result = mysqli_fetch_assoc($res);
		if ($old_psw==$result['Password']) {
			$sql = "UPDATE users SET Password='".$new_psw."' WHERE Login='".$login."'";
			$res = $this->base->make_request($sql);
			echo "Password changed";
		} else {
			echo "Wrong Password";
		}
	}
	// ====================================
	public function update_foto($login, $old_photo, $new_photo)
	{
		$target_dir = "photo/";
		$target_file = $target_dir .$login.".".strtolower(pathinfo($_FILES["new_photo"]["name"],PATHINFO_EXTENSION));
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["new_photo"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
// Check file size
		if ($_FILES["new_photo"]["size"] > 1024 * 10 * 1024) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
	} else {
// if($_POST['old_photo'] != "def.png"){
//     unlink($_POST['old_photo']);
// }
		if (move_uploaded_file($_FILES["new_photo"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["new_photo"]["name"]). " has been uploaded.";
			$sql = "UPDATE users SET Photo='".$target_file."' WHERE Login='".$login."'";
			$result = [];
			$this->base->make_request($sql);

		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
}?>