<?php 
include_once("header.php");
include_once("function.php");
$month_first_date =  $first_date->format('M-d-Y');
$month_last_date =   $last_date->format('M-d-Y');

$sql_date_f =   $first_date->format('Y-m-d');
$sql_date_e =   $last_date->format('Y-m-d');

$role =  $_SESSION['ROLE'];


//For total Deposit
  $total_deposit = MonthDeposit($sql_date_f, $sql_date_e);
//End total Deposit

//For total Bazar

    $total_bazar = MonthBazarCount($sql_date_f, $sql_date_e);

//End total Bazar

//Takeable Cost
    $takeable_cost = $total_deposit - $total_bazar;

//For total Bazar
    $total_mill = MonthMillCount($sql_date_f, $sql_date_e);
//End total Bazar

 ?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Monthly Overview</h3>
                    <p style="font-size: 20px;" class="panel-subtitle">Period: <?php echo $month_first_date ?> - <?php echo $month_last_date?></p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-download"></i></span>
                                <p>
                                    <span class="number"><?php echo $total_deposit; ?>/=</span>
                                    <span class="title">Total Deposit</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                <p>
                                    <span class="number"><?php echo $total_bazar; ?>/=</span>
                                    <span class="title">Total Bazar</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-eye"></i></span>
                                <p>
                                    <span class="number"><?php echo $takeable_cost; ?>/=</span>
                                    <span class="title">Takeable Cost </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                <p>
                                    <span class="number"><?php echo $total_mill; ?></span>
                                    <span class="title">Total Mill</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

<?php 
include_once("footer.php");
?>