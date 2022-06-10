<?php 
include_once("../header.php");
include_once("../function.php");
$sql = "SELECT * FROM user;";
$result = mysqli_query($conn, $sql);
?>

<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluied" id="container">
			<h3 class="text-center">Add Bazar</h3>
			<hr/>
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
				<div class="col-md-12">
					<form autocomplete="off" action="bazar_insert.php" method="post">
						<div class="row">
							<div class="form-group col-md-12">
								<input type="text" class="form-control" id="bazar_desc" id="from_name" name="bazar_list" required>
								<label>Bazar Description</label>
							</div>
							<div class="form-group col-md-4">
								<input type="text" id="bazar_ammount" class="form-control" id="form_name" name="ammount" required >
								<label>Bazar Ammount</label>
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control" id="datepicker" name="Date" required>
								<label>Bazar Date</label>
							</div>
							<div class="form-group col-md-3">
								<select name="member" class="form-control" required>
                                    <?php if ($_SESSION['ROLE'] == 'user'){?>
									<option value="<?php echo $_SESSION['userId'];?>"><?php echo $_SESSION['userName'];?></option>
                                    <?php }else{?>
                                        <option>Select Member</option>
                                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo $row['ID'];?>"><?php echo $row['NAME'];?></option>
									<?php }}?>
								</select>
							</div>
                            <div class="col-auto">
                                <div class="form-check mb-2 col-md-2 form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="deposit" value="yes">
                                    <label style="padding: 13px 0px 0px 18px;" class="form-check-label" for="autoSizingCheck">
                                        Save to Deposit!!!
                                    </label>
                                </div>
                            </div>
							<div class="form-group col-md-12 text-center">
								<button type="submit" class="btn-lg btn btn-primary">Add Bazar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
            <?php if ($_SESSION['ROLE'] !== "user"){?>
                <h3 class="text-center">Delete Bazar</h3>
                <hr/>
                <div class="row">
                    <div class="col-md-12">
                        <form autocomplete="off" action="delete_bazar.php" method="POST">
                            <div class="mill_align">
                                <div class="form-group col-md-3 child_div">
                                    <label>Select a Date to delete Bazar</label>
                                </div>
                                <div class="form-group col-md-3 child_div">
                                    <input type="text" class="form-control" id="datepicker1" name="bazar_date" required />
                                    <label>Bazar Date</label>
                                </div>
                                <div class="form-group col-md-3 text-center">
                                    <button type="submit" onclick="return confirm('Are you Sure to Delete this !!!!')" class="btn btn-danger">Delete Bazar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php }?>
		</div>
	</div>
			<!-- END MAIN CONTENT -->
</div>
		<!-- END MAIN -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#datepicker1').datepicker({
            dateFormat: "yy-mm-dd",
        });
    });

    // $(document).ready(function () {
    //     $('#datepicker').onChange(function () {
    //         var query = $(this).val();
    //         if (query!=='')
    //         {
    //             $.ajax({
    //                 url:"http://localhost/klorofil/Bazar_list/bazar_insert.php,
    //                 method:"GET",
    //                 data:{
    //                     query:query,
    //                 },
    //                 success:function (data) {
    //                     $('#txtHint').fadeIn();
    //                     $('#txtHint').html(data);
    //                 }
    //             })
    //         }
    //     });
    //     $(document).on('click', 'li',function () {
    //         $('#txtHint').val($(this).text());
    //         $('#txtHint').fadeOut();
    //     })
    // });

</script>

<script>
	$(document).ready(function(){
      	$('#datepicker').datepicker({
      		dateFormat: "yy-mm-dd",
         });
     });
</script>
<script type="text/javascript">
	
	var error_desc = false;
	var error_ammount = false;

	$("#bazar_desc").focusout(function() {
		check_bazar_desc();
	});
	$("#bazar_ammount").focusout(function() {
			check_bazar_amount();
		});
	function check_bazar_desc() {
            var pattern = /[^,]*([,][^,]+)*/;
            var fname = $("#bazar_desc").val();
            if (pattern.test(fname) && fname !== '') {
               $("#fname_error_message").hide();
               $("#bazar_desc").css("border-bottom","2px solid #34F458");
            } else {
               $("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#bazar_desc").css("border-bottom","2px solid #F90A0A");
               error_desc = true;
            }
         }
         function check_bazar_amount() {
            var pattern = /^[0-9]*$/;
            var fname = $("#bazar_ammount").val();
            var ammount_length = $("#bazar_ammount").val().length;
            if (pattern.test(fname) && ammount_length < 5 && fname !== '') {
               $("#fname_error_message").hide();
               $("#bazar_ammount").css("border-bottom","2px solid #34F458");
            } else {
               $("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#bazar_ammount").css("border-bottom","2px solid #F90A0A");
               error_ammount = true;
            }
         };
</script>
<?php include_once("../footer.php") ?>
