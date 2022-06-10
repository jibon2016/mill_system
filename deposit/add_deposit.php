<?php 
include_once("../header.php");
include_once("../function.php");

$month_first_date =  $first_date->format('M-d-Y');
$month_last_date =   $last_date->format('M-d-Y');

$sql_date_f =   $first_date->format('Y-m-d');
$sql_date_e =   $last_date->format('Y-m-d');


$sql = "SELECT deposit.*, DATE_FORMAT(Deposit_Date,'%d-%m-%Y') as nd, deposit.ID as deposit_id, user.ID, user.NAME as name 
FROM deposit
JOIN user ON deposit.U_ID = user.ID WHERE D_month = '$S_date' ORDER BY `deposit_id` ASC;";
$result = mysqli_query($conn, $sql);
$result2= allUser();
$query = "SELECT * FROM user;";
$result1= mysqli_query($conn, $query);
$result4= depositDate();
 ?>
		<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid" id="container">	
			<h3 class="text-center">Add Deposit</h3>
			<hr/>
			<?php if(isset($_SESSION["add_deposit"])) { ?>
					<div class="alert alert-success alert-dismissible show" role="alert">
					  <strong>SUCCESS!</strong> Added a Deposit.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
			<?php }
			unset($_SESSION["add_deposit"]); ?>
			<?php if(isset($_SESSION["deposit_error"])) { ?>
					<div class="alert alert-warning alert-dismissible show" role="alert">
					  <strong>WARNING!</strong> There is a Problem.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
			<?php }
			unset($_SESSION["deposit_error"]); ?>
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
				<div class="col-md-12">
					<form action="insert_deposit.php" method="post">
						<div class="form-group col-md-3">
							<input type="text" class="form-control" id="diposit_val" name="diposit_val" required>
							<label>Diposit</label>
						</div>
						<div class="form-group col-md-3">
							<input type="text" class="form-control" id="datepicker" name="diposit_date" required>
							<label>Diposit Date</label>
						</div>
						<div class="form-group col-md-3 ">
							<select name="deposit_member" class="form-control" required>
								<option>Select any Member</option>
								<?php while($row1 = mysqli_fetch_assoc($result2)) {?>
								<option value="<?php echo $row1['ID'] ?>"><?php echo $row1['NAME'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-md-3 text-center">
							<button type="submit" class=" btn btn-primary">Add Diposit</button>
						</div>
					</form>
				</div>
			</div>	
			<hr style="border-bottom:2px solid #00A0F0 ;">
			<div class="row">
				<div class="col-md-12">
					<h4 style="color:#00A0F0;" class="text-center" ><?php 
					echo date('F Y');?> Deposit</h4>
					<table class="table">
						<thead class="text-center">
							<th class="text-center">Name</th>
                            <?php while($row4 = mysqli_fetch_assoc($result4)) { ?>
							    <th class="text-center"><?php echo $row4['nd'];?></th>
                            <?php };?>
                            <th class="text-center">Total</th>
						</thead>
						<tbody class="text-center">
                        <?php
                        $query_user = "SELECT * FROM user;";
                        $result_user= mysqli_query($conn,$query_user);
                        while($row2 = mysqli_fetch_assoc($result_user)) {
                        ?>
                            <tr>
                                <th ><?php echo $row2['NAME']; ?><br></th>
                                    <?php $id = $row2['ID']; ?>
                                <?php
                                    $query_deposit = "SELECT DISTINCT Deposit_Date FROM deposit WHERE Deposit_Date BETWEEN '$sql_date_f' AND '$sql_date_e' AND approve_by_manager = 1 ORDER BY Deposit_Date ASC;";
                                    $result_deposit = mysqli_query($conn,$query_deposit);
                                    while ($row3 = mysqli_fetch_assoc($result_deposit)){
                                        $date = $row3['Deposit_Date'];
                                ?>
                                        <?php
                                            $query_amount = "SELECT Amount,Deposit_Date FROM `deposit` WHERE U_ID = '$id' AND Deposit_Date = '$date' AND approve_by_manager = '1' ";
                                            $result_amount = mysqli_query($conn,$query_amount);
                                            if (mysqli_num_rows($result_amount) > 0) {
                                                while ($row6 = mysqli_fetch_assoc($result_amount)) {
                                                    $data[] = $row6['Amount'];
                                                }?>
                                                <td><?php echo $data1 =array_sum($data); unset($data);?>/=<br></td>
                                                <?php $total[] = $data1; ?>
                                                    <?php
                                            }else{
                                                echo '<td>0/=<br></td>';
                                            }
                                        ?>
                                <?php };?>
                                <?php if(empty($total)) {
                                    echo '<td>0/=<br></td>';
                                }else{
                                    echo '<td>'. array_sum($total).'/=<br></td>';
                                    unset($total);
                                }
                                    ?>
                            </tr>
                        <?php };?>
                        </tbody>
					</table>
				</div>
			</div>
            <?php if ($_SESSION['ROLE'] !== "user"){?>
                <div class="row">
                    <div class="col-md-12">
                        <form autocomplete="off" action="delete_deposit.php" method="POST">
                            <div class="mill_align">
                                <div class="form-group col-md-3 child_div">
                                    <label>Select a Date to delete Deposit</label>
                                </div>
                                <div class="form-group col-md-3 child_div">
                                    <input type="text" class="form-control" id="datepicker1" name="deposit_date" required />
                                    <label>Deposit Date</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <select name="member" class="form-control" required>
                                            <option>Select Member</option>
                                            <?php while($row = mysqli_fetch_assoc($result1)) { ?>
                                                <option value="<?php echo $row['ID'];?>"><?php echo $row['NAME'];?></option>
                                            <?php }?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 text-center child_div">
                                    <button type="submit" onclick="return confirm('Are you Sure to Delete this !!!!')" class="btn btn-danger">Delete Deposit</button>
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
<script>
	$(document).ready(function(){
      	$('#datepicker').datepicker({
      		dateFormat: "yy-mm-dd",
         });
     });
    $(document).ready(function(){
        $('#datepicker1').datepicker({
            dateFormat: "yy-mm-dd",
        });
    });

	var error_deposit = false;

	$("#diposit_val").focusout(function() {
		check_val();
	});
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
include_once("../footer.php");
?>