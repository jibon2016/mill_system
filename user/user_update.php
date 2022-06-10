<?php 
	include_once("../function.php");
	$name       =$_POST['name'];
	$email      =$_POST['email'];
	$address    =$_POST['address'];
	$mobile     =$_POST['mobile'];
	$id         =$_GET['id'];
    $role       =$_POST['role'];

    if ($role == 'manager'){
        $statement = "UPDATE `user` SET `ROLE` = 'user' WHERE `user`.`ROLE` ='manager';";
        mysqli_query($conn,$statement);
    }

	//Image Files  //
if (empty($_FILES['file']) ){
	$imgname = $_FILES['file']['name'];
	$imgsize = $_FILES['file']['size'];
	$imgtype = $_FILES['file']['type'];
	$extension=pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

	//Image Validation//

	if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
		if ($imgsize < 1024000) {
			$img="uploads/".time().".".$extension;
			$tmp_loc= $_FILES['file']['tmp_name'];
			move_uploaded_file ($tmp_loc, $img);
				//Password Encypriton//

					$password = md5($pass);

					//SQL Query //
					$sql = "UPDATE user SET NAME = '$name', EMAIL= '$email', U_Image = '$img',  P_Address = '$address', MOBILE='$mobile',ROLE='$role'WHERE ID = '$id';";
					if (mysqli_query($conn, $sql)){
						$_SESSION["user_resister"] =1;
						header("Location: view.php?id=".$id);
					}else{
						$_SESSION["user_resister_error"] =1;
						header("Location: view.php?id=".$id);
					}

		}else{
			$_SESSION["No_size"] = 1;
			header("Location: user_edit.php?id=".$id);
		}
	}else{
		$_SESSION["No_ext"] = 1;
		header("Location: user_edit.php?id=".$id);
	}
}else{
    $sql1 = "UPDATE user SET NAME = '$name', EMAIL= '$email',  P_Address = '$address', MOBILE='$mobile',ROLE='$role' WHERE ID = '$id';";
    if (mysqli_query($conn, $sql1)){
        $_SESSION["user_resister"] =1;
        header("Location: view.php?id=".$id);
    }else{
        $_SESSION["user_resister_error"] =1;
        header("Location: view.php?id=".$id);
    }
}

 ?>