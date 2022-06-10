<?php 
include_once("../header.php");
include_once("../function.php");
require("mill_calculation.php");

    $final_extra = monthExtra($S_date, $E_date) / ($Alluser - 1);

    $member_sub_cost = (millRate($S_date, $E_date) * userTotalMill($S_date, $E_date,$user_id)) + $final_extra;

    if ($member_sub_cost < userTotalDeposit($S_date, $E_date,$user_id)) {
        $member1_cost = (userTotalDeposit($S_date, $E_date,$user_id) - $member_sub_cost);
        if ($member1_cost == 0) {
            paidUpdateById($user_id);
            $member_cost = "Paid";
        }else{
            $member_cost = "Get ". round($member1_cost, 2);
        }
    }else{
        $member_cost1 = ($member_sub_cost - userTotalDeposit($S_date, $E_date,$user_id));
        if ($member_cost1 == 0) {
            paidUpdateById($user_id);
            $member_cost = "Paid";
        }else{
            $member_cost = "Give ". round($member_cost1, 2);
        }
    }

    $mill_sum = userTotalMill($S_date, $E_date,$user_id);
    $member_sum = userTotalDeposit($S_date, $E_date,$user_id);

 ?>
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="text-center">Mill Report</h3>
						<hr/>
			<div class="col-md-6 col-md-offset-3">
				<table class="table " >
					<tr>
						<th width="200" class="text-right" >Name:</th>
						<td><?php echo $user['NAME']; ?></td>
					</tr>
					<tr>
						<th width="200" class="text-right" > Mill:</th>
						<td><?php echo $mill_sum; ?></td>
					</tr>
					<tr>
						<th width="200" class="text-right" > Deposit:</th>
						<td><?php echo $member_sum; ?></td>
                    </tr>
					<tr>
						<th width="200" class="text-right" >Mill Rate:</th>
						<td><?php echo millRate($S_date, $E_date); ?></td>
					</tr>
                    <tr>
                        <th width="200" class="text-right" > Extra:</th>
                        <?php if ($user['ROLE'] == 'admin'){?>
                            <td><?php echo "0"; ?></td>
                        <?php }else{?>
                            <td><?php echo round($final_extra, 2); ?></td>
                        <?php }?>
                    </tr>
					<tr>
						<th width="200" class="text-right" > Cost:</th>
                        <td><?php echo round($member_cost, 2); ?></td>
					</tr>
                    <tr>
                        <th width="200" class="text-right" > Status:</th>
                        <?php if ($user['paid_status'] == 1){?>
                            <td class="bg-success" style="color: #fff; font-weight: bold">Paid</td>
                        <?php }else{?>
                            <td class="bg-danger" style="color: #fff; font-weight: bold"> Not Paid</td>
                        <?php }?>
                    </tr>
					<div class="user_img text-center">
						<img width="200" height="200" src="<?php echo $url ."user/" . $user['U_Image'];?>" alt="Image">
					</div>
				</table>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
		
<?php 
include_once("../footer.php");
?>