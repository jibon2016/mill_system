<?php
include_once("../header.php");
include_once("../function.php");
?>
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid" id="container">
                <h3 class="text-center">Reset Your Passowrd</h3>
                <hr/>
                <?php if(isset($_SESSION["succ_msg"])) { ?>
                    <div class="alert alert-success alert-dismissible show" role="alert">
                        <strong>Successful!</strong> <?php echo $_SESSION['succ_msg']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
                unset($_SESSION["succ_msg"]); ?>
                <?php if(isset($_SESSION["error_msg"])) { ?>
                    <div class="alert alert-warning alert-dismissible show" role="alert">
                        <strong>Warning!</strong> <?php echo $_SESSION['error_msg']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
                unset($_SESSION["error_msg"]); ?>
                <div class="row">
                    <div class="col-md-12 align-items-center">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                        <form autocomplete="off" action="password_reset_submit.php" method="post">
                            <div class="form-group ">
                                <input type="password" class="form-control" id="old_password" name="old_password" required>
                                <input type="hidden" value="<?php echo $_SESSION['userId']?>" name="id">
                                <label>Old Password</label>
                            </div>
                            <div class="form-group ">
                                <input type="password" class="form-control" id="form_password" name="new_password" required>
                                <label>New Password</label>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="form_retype_password" name="retype_password" required>
                                <label>Retype Password</label>
                            </div>
                            <div class="form-group col-md-3 text-center">
                                <input style="background: #405ff6" type="submit" name="submit" value="Submit" class=" btn btn-primary" />
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    <script>
        $(document).ready(function(){
            $('#datepicker').datepicker({
                dateFormat: "yy-mm-dd",
            });
        });

        $("#password_error_massage").hide();
        $("#retype_password_error_massage").hide();

        var error_password = false;
        var error_retype_password = false;

        $("#old_password").focusout(function() {
            old_password();
        });
        $("#form_password").focusout(function() {
            check_password();
        });
        $("#form_retype_password").focusout(function() {
            check_retype_password();
        });
        function old_password() {
            var password_length = $("#old_password").val().length;
            if (password_length < 8) {
                $("#password_error_message").html("Atleast 8 Characters");
                $("#password_error_message").show();
                $("#old_password").css("border-bottom","2px solid #F90A0A");
                error_password = true;
            } else {
                $("#password_error_message").hide();
                $("#old_password").css("border-bottom","2px solid #34F458");
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
    </script>
<?php
include_once("../footer.php");
?>