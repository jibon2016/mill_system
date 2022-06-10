<?php 
include_once("../header.php");
include_once("../function.php");
$sql_date_f =   $first_date->format('Y-m-d');
$sql_date_e =   $last_date->format('Y-m-d');

$sql = "SELECT mill_info.*, DATE_FORMAT(Date,'%d-%m-%Y') as nd, mill_info.ID as mill_id, user.ID, user.NAME as name 
FROM mill_info
JOIN user ON mill_info.U_ID = user.ID WHERE Date BETWEEN '$sql_date_f' AND '$sql_date_e' ORDER BY `mill_id` ASC;";
$result= mysqli_query($conn, $sql);
$sql2 = "SELECT * FROM user;";
$result2= mysqli_query($conn, $sql2);
?>

<div class="main">
	<div class="main-content">
		<div class="container-fluid" id="container">
			<h3 class="text-center">Add MIll</h3>
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
				<div class="col-md-12">
					<form autocomplete="off" action="insert_mill.php" method="post">
                        <div class="form-group col-md-6">
                            <table class="table">
                                <thead class="text-center">
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Member's Mill </th>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result2)){ ?>
                                    <th><?php echo $row['NAME']?><br></th>
                                    <td>
                                        <div class="form-group col-md-3">
                                        <input type="hidden" name="id[]" value="<?php echo $row['ID']?>">
                                        <input type="text"<?php if ($_SESSION['ROLE'] == 'user'){echo "disabled";}?> class="form-control" id="mill_info" name="mill_info[]" >
                                        <label>Mill</label>
                                        </div>
                                    </td>
                                </tbody>
                                <?php }?>
                            </table>
						</div>
                        <div class="mill_align">
                            <div class="form-group col-md-3 child_div">
                                <input type="text"<?php if ($_SESSION['ROLE'] == 'user'){echo "disabled";}?> class="form-control" id="datepicker" name="mill_date" required>
                                <label>Mill Date</label>
                            </div>
                            <div class="form-group col-md-3 text-center child_div">
                                <button type="submit"<?php if ($_SESSION['ROLE'] == 'user'){echo "disabled";}?> class=" btn btn-primary">Add MIll</button>
                            </div>
                        </div>
					</form>
				</div>
			</div>
            <?php if ($_SESSION['ROLE'] !== "user"){?>
            <div class="row">
                <div class="col-md-12">
                    <form autocomplete="off" action="delete_mill.php" method="POST">
                        <div class="mill_align">
                            <div class="form-group col-md-3 child_div">
                                <label>Select a Date to delete mill</label>
                            </div>
                            <div class="form-group col-md-3 child_div">
                                <input type="text" class="form-control" id="datepicker1" name="mill_date" required />
                                <label>Mill Date</label>
                            </div>
                            <div class="form-group col-md-3 text-center child_div">
                                <button type="submit" onclick="return confirm('Are you Sure to Delete this !!!!')" class="btn btn-danger">Delete MIll</button>
                            </div>
                        </div>
                    </form>
		        </div>
		    </div>
            <?php }?>
		</div>
	</div>
</div>
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
</script>
<?php include_once("../footer.php") ?>