<?php
include_once("../header.php");
$role = $_SESSION['ROLE'];
if ( $role !== "admin"){
    printf("<script>location.href='../index.php'</script>");
}else{

}
 ?>
<div class="main">
    <div class="main-content" id="container">
        <h3 class="text-center">Add New User</h3>
        <hr/>
        <form id="registration_form" action="insert.php" method="POST" enctype="multipart/form-data" >
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" id="form_name" name="name"  required>
                    <label>Name</label>
                    <p class="error_form" ic="name_error_massage"></p>
                </div>
                <div class="form-group col-md-12">
                    <input  type="email" class="form-control" id="form_email" name="email" required>
                    <label>Email</label>
                    <span class="error_form" ic="email_error_massage"></span>
                </div>
                <div class="form-group col-md-6">
                    <span class="error_form" ic="password_error_massage"></span>
                    <input type="password" class="form-control" id="form_password" name="password"  required>
                    <label>Password</label>
                </div>

                <div class="form-group col-md-6">
                    <span class="error_form" ic="retype_password_error_massage"></span>
                    <input type="password" class="form-control" id="form_retype_password" name="confirmpassword"  required>
                    <label>Confirm Password</label>
                </div>
                <div class="form-group col-md-12">
                    <span class="error_form" ic="address_error_massage"></span>
                  <input type="text" class="form-control" id="form_address" name="address"  required>
                  <label>Parmanent Address</label>
                </div>
                <div class="form-group col-md-3">
                    <span class="error_form" ic="mobile_error_massage"></span>
                    <input type="text" class="form-control" id="form_mobile" name="mobile" required>
                    <label for="inputCity">Mobile</label>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Choose Your image </label>
                </div>
                <div class="form-group col-md-4">
                    <input style="border: none;" type="file" name="file" accept=".jpg,.jpeg,.png" required>
                <?php if (isset($_SESSION["No_ext"])) {?>
                    <strong style="color: red;"> File format is not supported </strong>
                 <?php }
                    unset($_SESSION["No_ext"]);
                  ?>
                  <?php if (isset($_SESSION["No_size"])) {?>
                    <strong style="color: red;"> File size is Bigger .</strong>
                 <?php }
                    unset($_SESSION["No_size"]);
                  ?>
                </div>
                <div class="form-group col-md-3">
                    <select name="role" id="inputState" class="form-control" required>
                        <option selected>Select User Role</option>
                        <option value="manager">Manager</option>
                        <option value="user">User</option>
                    </select>
                </div>
              </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn-lg btn btn-primary">Add User</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">

$(function() {
	$("#name_error_massage").hide();
	$("#email_error_massage").hide();
	$("#password_error_massage").hide();
	$("#retype_password_error_massage").hide();
	$("#address_error_massage").hide();
	$("#mobile_error_massage").hide();

	var error_name = false;
	var error_email = false;
	var error_password = false;
	var error_retype_password = false;
	var error_address = false;
	var error_mobile = false;

	$("#form_name").focusout(function() {
		check_name();
	});
	$("#form_email").focusout(function() {
		check_email();
	});
	$("#form_password").focusout(function() {
		check_password();
	});
	$("#form_retype_password").focusout(function() {
		check_retype_password();
	});
	$("#form_address").focusout(function() {
		check_address();
	});
	$("#form_mobile").focusout(function() {
		check_mobile();
	});

	
         function check_name() {
            var pattern = /^[a-z A-Z]*$/;
            var fname = $("#form_name").val();
            if (pattern.test(fname) && fname !== '') {
               $("#fname_error_message").hide();
               $("#form_name").css("border-bottom","2px solid #34F458");
            } else {
               $("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#form_name").css("border-bottom","2px solid #F90A0A");
               error_name = true;
            }
         }
         function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#form_email").val();
            if (pattern.test(email) && email !== '') {
               $("#email_error_message").hide();
               $("#form_email").css("border-bottom","2px solid #34F458");
            } else {
               $("#email_error_message").html("Invalid Email");
               $("#email_error_message").show();
               $("#form_email").css("border-bottom","2px solid #F90A0A");
               error_email = true;
            }
         }
         function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 8) {
               $("#password_error_message").html("Atleast 8 Characters");
               $("#password_error_message").show();
               $("#form_password").css("border-bottom","2px solid #F90A0A");
               error_password = true;
            } else {
               $("#password_error_message").hide();
               $("#form_password").css("border-bottom","2px solid #34F458");
            }
         }
         function check_retype_password() {
            var password = $("#form_password").val();
            var retype_password = $("#form_retype_password").val();
            if (password !== retype_password) {
               $("#retype_password_error_message").html("Passwords Did not Matched");
               $("#retype_password_error_message").show();
               $("#form_retype_password").css("border-bottom","2px solid #F90A0A");
               error_retype_password = true;
            } else {
               $("#retype_password_error_message").hide();
               $("#form_retype_password").css("border-bottom","2px solid #34F458");
            }
         }
         
         function check_address() {
            var pattern = /^[\w-\.][\w-]/;
            var addr = $("#form_address").val();
            if (pattern.test(addr) && addr !== '') {
               $("#address_error_massage").hide();
               $("#form_address").css("border-bottom","2px solid #34F458");
            } else {
               $("#address_error_massage").html("Should contain only Characters");
               $("#address_error_massage").show();
               $("#form_address").css("border-bottom","2px solid #F90A0A");
               error_address = true;
            }
         }
         function check_mobile() {
            var mobile_length = $("#form_mobile").val().length;
            var mobile = $("#form_mobile").val();
            if (mobile_length < 11 && mobile_length !=='') {
               $("#mobile_error_massage").html("Atleast 11 Characters");
               $("#mobile_error_massage").show("#mobile_error_massage");
               $("#form_mobile").css("border-bottom","2px solid #F90A0A");
               error_mobile = true;
            } else {
               $("#mobile_error_massage").hide();
               $("#form_mobile").css("border-bottom","2px solid #34F458");
            }
         }

         $("#registration_form").submit(function() {
            error_name = false;
            error_email = false;
            error_password = false;
            error_retype_password = false;
            check_name();
            check_email();
            check_password();
            check_retype_password();
            if (error_name === false && error_email === false && error_password === false && error_retype_password === false) {
             window.location.href = "insert.php";
               return true;
            } else {
               alert("Please Fill the form Correctly");
               return false;
            }
     });

});


</script>
		
<?php 
include_once("../footer.php");
?>