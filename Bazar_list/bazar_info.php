<?php 
include_once("../header.php");
include_once("../function.php");
$sql_date_f =   $first_date->format('Y-m-d');
$sql_date_e =   $last_date->format('Y-m-d');

$sql = "SELECT bazar_list.*, DATE_FORMAT(B_Date,'%d-%m-%Y') as nd, user.NAME as bazar_id 
FROM bazar_list
JOIN user ON bazar_list.U_ID = user.id WHERE B_month BETWEEN '$sql_date_f' AND '$sql_date_e' ORDER BY `nd` ASC;";
$result = mysqli_query($conn, $sql);

    if (isset($_GET['bazar_id']))
    {
        $table_name = 'bazar_list';
        approvalById($_GET['bazar_id'], $table_name);
        printf("<script>location.href='bazar_info.php'</script>");
    }

    if (isset($_GET['bazar_delete']))
    {
        $table_name = 'bazar_list';
        deleteById($_GET['bazar_delete'], $table_name);
        printf("<script>location.href='bazar_info.php'</script>");
    }
?>

<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="text-center"><?php echo date('F Y');?> Bazar Infomration</h3>
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
					<div class="table-responsive">
                        <table class="table">
                            <thead class="text-center" style="font-size: 20px;">
                                <th class="text-center">ID</th>
                                <th class="text-center">Bazar Date</th>
                                <th class="text-center">Member</th>
                                <th class="text-center" rowspan="2">Bazar Description</th>
                                <th class="text-center">Ammount</th>
                                <th class="text-center" colspan="3">Action</th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                    while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                <tr class="text-center">
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['nd']; ?></td>
                                    <td><?php echo $row['bazar_id']; ?></td>
                                    <td><?php echo $row['B_Description']; ?></td>
                                    <td><?php echo $row['B_Amount']; ?>/=</td>
                                    <?php if ($_SESSION['ROLE'] !== 'user'){?>
                                        <?php if ($row['approve_by_manager'] == 0 ){ ?>
                                            <td><a class="btn btn-success" href="?bazar_id=<?php echo $row ['ID']?>">Approve</a></td>
                                            <td><a class="btn btn-danger" onclick="return confirm('Are you Sure to Delete this !!!!')" href="?bazar_delete=<?php echo $row ['ID']?>"">Delete</a></td>
                                        <?php }else{?>
                                                <td><a class="btn btn-success" disabled href="#">Approved</a></td>
                                        <?php };?>
                                    <?php }else{?>
                                        <?php if ($row['approve_by_manager'] == 0 ){ ?>
                                            <td class="text-bold text-danger">Not Approve</td>
                                        <?php }else{?>
                                            <td class="text-bold text-success" >Approved</td>
                                        <?php };?>
                                    <?php };?>
                                </tr>
                                <?php }; ?>
                            </tbody>
                        </table>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<script>
    $('.delete-btn').click(function () {
        event.preventDefault();
        var check = confirm('Are you Sure to Delete this !!!!');
        if(check){
          return true;
        }
            alert('Your data is safe');
    })
</script>
<?php 
include_once("../footer.php");
?>