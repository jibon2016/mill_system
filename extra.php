<?php 
include_once("header.php");
include_once("function.php");
$role = $_SESSION['ROLE'];
if ( $role !== "admin" && $role !== "mamager"){
    printf("<script>location.href='mill_info.php'</script>");
}

    if (isset($_POST['submit'])){
        $extra_desc     = $_POST['extra_desc'];
        $extra_amount   = $_POST['extra_amount'];
        $extra_date     = $_POST['extra_date'];

        $statement = "INSERT INTO `extra`(`id`, `extra_desc`, `extra_amount`, `extra_date`) VALUES (NULL ,'$extra_desc','$extra_amount','$extra_date')";
        mysqli_query($conn, $statement);
        $_SESSION['succ_msg'] = " Add Extra Cost";
        printf("<script>location.href='extra.php'</script>");
    }

    $query = "SELECT *, DATE_FORMAT(extra_date,'%d-%m-%Y') as nd FROM `extra` WHERE extra_date BETWEEN '$S_date' AND '$E_date';";
    $result = mysqli_query($conn, $query);
 ?>
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid" id="container">
            <h3 class="text-center">Add Extra Cost</h3>
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
            <div class="row">
                <div class="col-md-12">
                    <form autocomplete="off" action="" method="post">
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="form_name" name="extra_desc" required>
                            <label>Extra Description</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" id="diposit_val" name="extra_amount" required>
                            <label>Extra Amount</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="datepicker" name="extra_date" required>
                            <label>Extra Date</label>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <input style="background: #405ff6" type="submit" name="submit" value="Submit" class=" btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
            <hr style="border-bottom:2px solid #00A0F0 ;">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead class="text-center" style="font-size: 20px;">
                        <th class="text-center">Extra Description</th>
                        <th class="text-center">Extra Amount</th>
                        <th class="text-center">Date</th>
                        </thead>
                        <tr>
                            <?php while ($row = mysqli_fetch_assoc($result)){?>
                                <tr>
                                    <td class="text-center"><?php echo $row['extra_desc'];?></td>
                                    <td class="text-center"><?php echo $row['extra_amount'];?></td>
                                    <td class="text-center"><?php echo $row['nd'];?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
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

        var error_deposit = false;
        var extra_amount = false;

        $("#diposit_val").focusout(function() {
            check_val();
        });
        $("#form_name").focusout(function() {
            check_name();
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
        function check_val() {
            var pattern = /^[0-9]*$/;
            var fname = $("#diposit_val").val();
            var ammount_length = $("#diposit_val").val().length;
            if (pattern.test(fname) && ammount_length < 5 && fname !== '') {
                $("#fname_error_message").hide();
                $("#diposit_val").css("border-bottom","2px solid #34F458");
            } else {
                $("#fname_error_message").html("Should contain only Characters");
                $("#fname_error_message").show();
                $("#diposit_val").css("border-bottom","2px solid #F90A0A");
                error_name = true;
            }
        }
    </script>
<?php 
include_once("footer.php");
?>