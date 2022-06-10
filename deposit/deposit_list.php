<?php
include_once("../header.php");
include_once("../function.php");
$sql_date_f =   $first_date->format('Y-m-d');
$sql_date_e =   $last_date->format('Y-m-d');

$sql = "SELECT deposit.*, DATE_FORMAT(Deposit_Date,'%d-%m-%Y') as nd, deposit.ID as deposit_id, user.ID, user.NAME as name 
FROM deposit
JOIN user ON deposit.U_ID = user.ID WHERE D_month BETWEEN '$sql_date_f' AND '$sql_date_e' ORDER BY nd ASC;";
$result = mysqli_query($conn, $sql);

if (isset($_GET['deposit_id']))
{
    $table_name = 'deposit';
    approvalById($_GET['deposit_id'], $table_name);
    printf("<script>location.href='deposit_list.php'</script>");
}

if (isset($_GET['deposit_delete']))
{
    $table_name = 'deposit';
    deleteById($_GET['deposit_delete'], $table_name);
    printf("<script>location.href='deposit_list.php'</script>");
}

?>

    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="text-center"><?php echo date('F Y');?> Deposit Infomration</h3>
                <hr/>
                <?php if(isset($_SESSION["bazar_add"])) { ?>
                    <div class="alert alert-success alert-dismissible show" role="alert">
                        <strong>SUCCESS!</strong> Bazar is Add.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
                unset($_SESSION["bazar_add"]); ?>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="text-center" style="font-size: 20px;">
                            <th class="text-center">ID</th>
                            <th class="text-center">Deposit Date</th>
                            <th class="text-center">Member</th>
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
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['Amount']; ?>/=</td>
                                    <?php if ($_SESSION['ROLE'] !== 'user'){?>
                                        <?php if ($row['approve_by_manager'] == 0 ){ ?>
                                            <td><a class="btn btn-success" href="?deposit_id=<?php echo $row ['deposit_id']?>">Approve</a></td>
                                            <td><a class="btn btn-danger" onclick="return confirm('Are you Sure to Delete this !!!!')" href="?deposit_delete=<?php echo $row ['deposit_id']?>"">Delete</a></td>
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