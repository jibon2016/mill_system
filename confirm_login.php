<?php
	session_start();
	include('function.php');

	$email = $_POST['email'];
	$pass =  $_POST['password'];

	$password  = md5($pass);
 	$sql = "SELECT * FROM user WHERE EMAIL='$email' AND PASSWORD='$password' ";
 	$result = mysqli_query($conn, $sql);
 	$value = mysqli_fetch_array($result);
 	$rowcount = mysqli_num_rows($result);
 	if ($rowcount == 1) {
 		$_SESSION['login'] = 1;
 		$_SESSION['ROLE'] = $value['ROLE'];
 		$_SESSION['userName'] = $value['NAME'];
 		$_SESSION['userId'] = $value['ID'];
 		$_SESSION['Img'] = $value['U_Image'];
 		header("Location: index.php");
 	} else{
 		$_SESSION['W_e_p'] = 1;
 		header("Location: login.php");
 	}
 ?>