<?php 
	include_once("../function.php");
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
	$role=$_POST['role'];

	if ($role == 'manager'){
        $statement = "UPDATE `user` SET `ROLE` = 'user' WHERE `user`.`ROLE` ='manager';";
        mysqli_query($conn,$statement);
    }


	//Image Files  //
	$imgname = $_FILES['file']['name'];
	$imgsize = $_FILES['file']['size'];
	$imgtype = $_FILES['file']['type'];
	$extension=pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

	//Image Validation//

	if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
		if ($imgsize < 1024000) {
			$img="uploads/".time().".".$extension;
			$tmp_loc= $_FILES['file']['tmp_name'];
			move_uploaded_file($tmp_loc, $img);
				//Password Encypriton//

					$password = md5($pass);
					//SQL Query //
					$sql = "INSERT INTO user VALUES (NULL,'$name', '$email','$password','$img', '$address','$mobile','$role', 0);";
					if (mysqli_query($conn, $sql)){
						$_SESSION["succ_msg"] ="Add a user!!";
						header("Location: user_profile.php");
					}else{
						$_SESSION["error_msg"] ="Enable to add user!!";
						header("Location: user_profile.php");
					}

		}else{
			$_SESSION["No_size"] = 1;
			header("Location: user_insert.php");
		}
	}else{
		$_SESSION["No_ext"] = 1;
		header('Location: user_insert.php');
	}	

 ?>