<?php
include_once("../header.php");
include_once("../function.php");
$sql = "SELECT * FROM user;";
$result = mysqli_query($conn, $sql);

$Last_mill_sum = MonthMillCount($S_date, $E_date);
$Bazar_sum = MonthBazarCount($S_date, $E_date);
$mill_rate  = millRate($S_date, $E_date);
$total_deposit = MonthDeposit($S_date, $E_date);

$sub_date = new DateTime('last day of this month');
$thisMonth = $sub_date->format('F Y');



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
                                    <td style="color: #00A0F0; font-weight: bold;"><?php echo $thisMonth; ?></td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-right" style="background: #f69241">Mill Rate of <?php echo $thisMonth; ?></th>
                                    <td style="color: #00A0F0; font-weight: bold;"><?php echo $mill_rate; ?> /=</td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-right" style="background: #f69241"><?php echo $thisMonth; ?> Total Mill:</th>
                                    <td style="color: #00A0F0; font-weight: bold;"><?php echo $Last_mill_sum; ?></td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-right" style="background: #f69241"><?php echo $thisMonth; ?> Total Cost:</th>
                                    <td style="color: #00A0F0; font-weight: bold;"><?php echo $Bazar_sum; ?> /=</td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-right" style="background: #f69241"><?php echo $thisMonth; ?> Total Deposit:</th>
                                    <td style="color: #00A0F0; font-weight: bold;"><?php echo $total_deposit; ?> /=</td>
                                </tr>
                            </table>
                        </div>
                        <table class="table">
                            <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th colspan="2" class="text-center">Action</th>
                            </thead>
                            <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['ID']; ?></td>
                                    <td><?php echo $row['NAME']; ?></td>
                                    <td><?php echo $row['EMAIL']; ?></td>
                                    <td><a class="btn btn-primary" href="<?php echo $url;?>mill_report/this_month_user_repot.php?id=<?php echo $row ['ID']?>">View</a></td>
                                    <td><a class="btn btn-success" href="<?php echo $url;?>mill/mill_info.php?id=<?php echo $row ['ID']?>">User mill</a></td>
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