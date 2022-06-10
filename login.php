<?php 
session_start();

	$url="";     //http://jibon.pczone.ga/
 ?>

<!doctype html>
<html lang="en">
  	<head>
    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	    <title>Log In Page</title>
 	</head>
    <body>
    	<br> <br><br> <br><br><br><br>
	    <div class="container">
	      <div class="row h-100">
	      	<div class="col-md-3"></div>
	        <div class="col-md-6 align-items-center">

	          <form action="confirm_login.php" method="POST" style="padding:10px;border: 1px solid #ccc; box-shadow: 2px 2px 6px #ccc;">
	           	<h1 class="text-center text-primary font-weight-bold">Log In</h1>

	           	<?php if(isset($_SESSION['W_e_p'])){?>
	           		<div class="alert alert-warning alert-dismissible" role="alert">
	                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	              		<strong>Wrong!</strong> Email and Password.
	            	</div>
	          	<?php };
	          	unset($_SESSION["W_e_p"]); ?>

	            <div class="form-group">
	               <label for="email">Email :</label>
	               <input type="email" required class="form-control" name="email" placeholder="Email">
	            </div>

	            <div class="form-group">
	              <label for="Password">Password :</label>
	              <input type="password" required class="form-control" name="password" placeholder="Password">
	            </div>
	            
	            <button style="width:130px;" type="submit" class="btn btn-primary">Log in</button>
	          </form>
	        </div>
	      </div>
	    </div>
	<script src="<?php echo $url?>assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="<?php echo $url?>assets/js/popper.min.js"></script>
	<script src="<?php echo $url?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>


<?php
	unset($_SESSION['W_e_p']);
?>