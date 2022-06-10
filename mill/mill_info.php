<?php 
include_once("../header.php");
include_once("../function.php"); 

//$id = $_GET['id'];

$date = new DateTime('now');
$date->modify('last day of this month');
$orderdate = $date->format('Y-m-d');
$date = explode('-', $orderdate);
$month = $date[1];
$day   = $date[2];
$year  = $date[0];

$last_day = new DateTime("last day of this month");
$first_day = new DateTime("first day of this month");

$firstdate = $first_day->format('Y-m-d'); // 2012-02-01
$lastdate = $last_day->format('Y-m-d');

$sql2 = "SELECT * FROM user";
$result2= mysqli_query($conn, $sql2);
?>

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Mill info</h3>
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
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Daily Mill Chart</h3>
                        </div>
                        <div class="panel-body">
                            <div id="demo-bar-chart" class="ct-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3 class="page-title">Mill List</h3>
                <div class="col-md-12">
                    <table class="table table-responsive-sm">
                        <thead>
                            <td>Name</td>
                            <?php for($i=1; $i<=$day; $i++){ ?>
                                <th><?php echo str_pad($i, 2, '0', STR_PAD_LEFT);?></th>
                            <?php }; ?>
                            <th>Total</th>
                        </thead>

                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result2)){ ?>
                        <th><?php echo $row['NAME']?><br></th>
                            <?php $id = $row['ID'];?>

                        <?php
                        for($i=1; $i<=$day; $i++){

                        $date       = explode('-', $orderdate);
                        $month      = $date[1];
                        $nday       = str_pad($i, 2, '0', STR_PAD_LEFT);
                        $year       = $date[0];
                        $nowdate    = $year. "-" .$month. "-" .$nday;

                        $sql = "SELECT Mill_Count FROM `mill_info` WHERE U_ID = '$id' AND Date = '$nowdate' AND Date BETWEEN '$firstdate' AND '$lastdate'; ";
                        $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){

                        while ($row1 =mysqli_fetch_assoc($result) ) {

                    ?>
                    <td><?php echo $row1['Mill_Count'];
                    $total[] = $row1['Mill_Count'];
                    ?></td>
                    <?php  }
                    }else{
                        ?>
                    <td>0</td>

                    <!-- End for and else -->
                    <?php }};
                        echo "<td class='text-center text-bold'>". array_sum($total)."</td>" ;
                        unset($total)?>
                    </tbody>
                    <!-- End While -->
                    <?php }?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
		<!-- END MAIN -->
<script>
	$(function() {
		var options;

		var data = {
			labels: [<?php for($i=1; $i<=$day; $i++){ ?>
                '<?php echo str_pad($i, 2, '0', STR_PAD_LEFT);?>',
        <?php }; ?>],
			series: [
				[<?php
                for($i=1; $i<=$day; $i++){

                $date       = explode('-', $orderdate);
                $month      = $date[1];
                $nday       = str_pad($i, 2, '0', STR_PAD_LEFT);
                $year       = $date[0];
                $nowdate    = $year. "-" .$month. "-" .$nday;

                $sql1 = "SELECT Mill_Count FROM `mill_info` WHERE Date = '$nowdate' AND Date BETWEEN '$firstdate' AND '$lastdate'; ";
                $result1 = mysqli_query($conn, $sql1);

                if(mysqli_num_rows($result1) > 0){
                    $mill = array();
                    while ($row2 =mysqli_fetch_assoc($result1) ) {
                            $mill[] = $row2['Mill_Count'];
                     }
                    echo array_sum($mill).",";
                    unset($mill);
                }else{
                    echo "0,";
                }
                }
                ?>],
			]
		};

		// bar chart
		options = {
			height: "300px",
			axisX: {
				showGrid: true
			},
		};

		new Chartist.Bar('#demo-bar-chart', data, options);
		// multiple chart
		var data = {
			labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12','13', '14','15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
			}]
		};

		var options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#multiple-chart', data, options);

	});
	</script>
<?php include_once("../footer.php"); ?>
