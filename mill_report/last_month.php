<?php
include_once("../header.php");
include_once("../function.php");
$sql = "SELECT * FROM user;";
$result = mysqli_query($conn, $sql);
$Last_mill_sum = MonthMillCount($lmfd, $lmld);
$Bazar_sum = MonthBazarCount($lmfd, $lmld);
$mill_rate  = millRate($lmfd, $lmld);
$total_deposit = MonthDeposit($lmfd, $lmld);
if (isset($_GET['paid_id']))
{
    paidUpdateById($_GET['paid_id']);
    printf("<script>location.href='last_month.php'</script>");
}
?>
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center">Mill Report</h3>
                        <hr/>
                        <div class="mill_rate text-center col-md-6 col-md-offset-3">
                            <table class="table">
                                <tr>
                                    <th width="200" class="text-right" style="background: #f69241">Report of Month: </th>
                                    <td style="color: #00A0F0; font-weight: bold;"><?php echo $lastMonth; ?></td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-right" style="background: #f69241">Mill Rate of <?php echo $lastMonth; ?></th>
                                    <td style="color: #00A0F0; font-weight: bold;"><?php echo $mill_rate; ?> /=</td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-right" style="background: #f69241"><?php echo $lastMonth; ?> Total Mill:</th>
                                    <td style="color: #00A0F0; font-weight: bold;"><?php echo $Last_mill_sum; ?></td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-right" style="background: #f69241"><?php echo $lastMonth; ?> Total Cost:</th>
                                    <td style="color: #00A0F0; font-weight: bold;"><?php echo $Bazar_sum; ?> /=</td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-right" style="background: #f69241"><?php echo $lastMonth; ?> Total Deposit:</th>
                                    <td style="color: #00A0F0; font-weight: bold;"><?php echo $total_deposit; ?> /=</td>
                                </tr>
                            </table>
                        </div>
                        <table class="table">
                            <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th colspan="3" class="text-center">Action</th>
                            </thead>
                            <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['ID']; ?></td>
                                    <td><?php echo $row['NAME']; ?></td>
                                    <td><?php echo $row['EMAIL']; ?></td>
                                    <td><a class="btn btn-primary" href="<?php echo $url;?>mill_report/mill_report_update.php?id=<?php echo $row ['ID']?>">View</a></td>
                                    <td><a class="btn btn-success" href="<?php echo $url;?>mill/mill_info_last_month.php?id=<?php echo $row ['ID']?>">User mill</a></td>
                                    <?php if ($_SESSION['ROLE'] !== 'user'){?>
                                        <?php if ($row['paid_status'] == '0'){?>
                                            <td><a class="btn btn-info" href="?paid_id=<?php echo $row['ID']?>">Paid</a></td>
                                        <?php }else{?>
                                            <td><a class="btn btn-info disabled" disabled href="">Clear</a></td>
                                        <?php }?>
                                    <?php }?>
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

<?php
include_once("../footer.php");
?>