
<?php
session_start();
$target_dir = "photo/";
$target_file = $target_dir . $_POST['u_name'].".".strtolower(pathinfo($_FILES["new_photo"]["name"],PATHINFO_EXTENSION));
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
			$sql = "UPDATE users SET Photo='".$target_file."' WHERE Login='".$_POST['u_name']."'";
			echo $sql;
			$res = mysqli_query($con, $sql);
            
		}
	} else {
		echo "could not connect to server";
	}

        header("Location:profile.php?user=".$_POST['u_name']);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
