<?php 
	session_start();

	$url="http://192.168.0.100/klorofil/";//http://jibon.pczone.ga/
//http://localhost/klorofil
	if (!isset($_SESSION['login'])) {
		header("Location: ".$url."login.php");// http://jibon.pczone.ga/
	}

	$conn= mysqli_connect('localhost','root','','mase');
	// 'sql207.epizy.com', 'epiz_24748818', 'Q3ITjKMlJ4x5mbk', 'epiz_24748818_mase'
	if (mysqli_connect_errno()) {
    	printf("Connect failed: %s\n", mysqli_connect_error());
   		exit();
	}

	function data_clear($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	};

	
	$first_date = new DateTime('first day of this month');
	$last_date = new DateTime('last day of this month');

	$S_date= $first_date->format('Y-m-d');
	$E_date= $last_date->format('Y-m-d');

	$month_ini = new DateTime("first day of last month");
	$month_end = new DateTime("last day of last month");

	$lmfd = $month_ini->format('Y-m-d'); // 2012-02-01
	$lmld = $month_end->format('Y-m-d'); // 2012-02-29

	$month_first_date =  $first_date->format('M-d-Y');
	$month_last_date  =   $last_date->format('M-d-Y');


	$date = date("Y-m-d");
	$dateTime = new DateTime($date);
	$lastMonth = $dateTime->modify('-' . $dateTime->format('d') . ' days')->format('F Y');

	function MonthMillCount($firstDate, $lastDate){
		$query = "SELECT Mill_Count from mill_info WHERE Date BETWEEN '$firstDate' AND '$lastDate' ;";
		$result = mysqli_query($GLOBALS['conn'], $query);
		while ($row = mysqli_fetch_assoc($result)) {
				  $mill[] =  $row['Mill_Count'];
				}
		if (empty($mill)) {
				return $Last_mill_sum = 0;
			}else{
				return $Last_mill_sum = array_sum($mill);
		}
	}

	function MonthDeposit($firstDate, $lastDate){
		$query = "SELECT * FROM deposit WHERE Deposit_Date BETWEEN '$firstDate' AND '$lastDate' AND approve_by_manager = 1;";
		$result_deposit= mysqli_query($GLOBALS['conn'], $query);
		while ($row = mysqli_fetch_assoc($result_deposit)) {
			$deposit_amount[] =  $row['Amount'];
		}
		if (empty($deposit_amount)) {
			return $total_deposit = 0;
		}else{
			return $total_deposit = array_sum($deposit_amount);
		}
	};


	function MonthBazarCount($firstDate, $lastDate){
		$query = "SELECT B_Amount FROM bazar_list WHERE B_Date BETWEEN '$firstDate' AND '$lastDate' ;";
		$result =mysqli_query($GLOBALS['conn'], $query);
		while ($row = mysqli_fetch_assoc($result)) {
 	 		  $array[] = $row['B_Amount'];
		}
   		if (empty($array)) {
 			return $Bazar_sum = 0;
   		}else{
   			return $Bazar_sum = array_sum($array);
   		}
	}

	function millRate($firstDate, $lastDate){
		$lastMonthMill = MonthMillCount($firstDate, $lastDate);
		if ($lastMonthMill == 0){
			return $mill_rate = 0;
		}else{
			$mill_rate2 = (MonthBazarCount($firstDate, $lastDate) / MonthMillCount($firstDate, $lastDate) );
			return $mill_rate = round($mill_rate2, 2);
		}
	}


		function approvalById($id, $table_name){
			$query = "UPDATE `$table_name` SET `approve_by_manager`= 1 WHERE ID = '$id'";
			mysqli_query($GLOBALS['conn'],$query);
			return true;
		}

		function deleteById($id, $table_name){
			$query = "DELETE FROM `$table_name` WHERE `ID` = '$id'";
			mysqli_query($GLOBALS['conn'],$query);
			return true;
		}

		function allUser(){
			$query = "SELECT * FROM user;";
			$result= mysqli_query($GLOBALS['conn'],$query);
			return $result;
		}

		function depositDate(){
			$month_first_date =  $GLOBALS['first_date']->format('M-d-Y');
			$month_last_date =   $GLOBALS['last_date']->format('M-d-Y');

			$sql_date_f =   $GLOBALS['first_date']->format('Y-m-d');
			$sql_date_e =   $GLOBALS['last_date']->format('Y-m-d');

			$query = "SELECT DISTINCT DATE_FORMAT(Deposit_Date,'%d-%m-%Y') as nd, Deposit_Date FROM deposit WHERE Deposit_Date BETWEEN '$sql_date_f' AND '$sql_date_e' AND approve_by_manager = 1 ORDER BY Deposit_Date ASC;";
			$result = mysqli_query($GLOBALS['conn'],$query);
			return $result;
		}

		function checkMonth ($check_date)
		{
			//User Date format
			$dateOfUser = explode('-', $check_date);
			$monthOfUser = $dateOfUser[1];
			$dayOfUser = $dateOfUser[2];
			$yearOfUser = $dateOfUser[0];

			//Server Date format
			$dateOfServer = new DateTime('now');
			$dateOfServer->modify('last day of this month');
			$orderdate = $dateOfServer->format('Y-m-d');
			$dateOfServer = explode('-', $orderdate);
			$monthofServer = $dateOfServer[1];
			$dayofServer = $dateOfServer[2];
			$yearofServer = $dateOfServer[0];
			if ($monthOfUser == $monthofServer) {
				return true;
			};
		}


// Mill Rate & Total Cost Insert Database:------------------------------------------------------
		$query = "SELECT `S_Date` FROM `relation` order by S_Date desc limit 1";
		$result= mysqli_query($conn, $query);
		$total_Bazar = MonthBazarCount($lmfd, $lmld);
		$total_mill = MonthMillCount($lmfd, $lmld);
		while ($row = $result->fetch_assoc()) {
			$start_date = $row['S_Date'];
		}
		$n_date = checkMonth($start_date);
		if (isset($n_date)){
			//
		}else{
			$query1 = "INSERT INTO `relation` (`ID`, `S_Date`, `E_Date`) VALUES (NULL, '$S_date', '$E_date') ";
			mysqli_query($conn, $query1);
			$query2= "UPDATE `relation` SET `M_rate` = '$mill_rate' , `T_Cost` = '$total_Bazar' , `T_Mill` = '$total_mill' WHERE `S_Date` = '$lmfd' AND `E_Date` ='$lmld';";
			mysqli_query($conn, $query2);
			$query3= "UPDATE `user` SET `paid_status`= 0;";
			mysqli_query($conn, $query3);
		}

		function paidUpdateById($id){
			$query = "UPDATE `user` SET `paid_status`= 1 WHERE `ID` = '$id';";
			mysqli_query($GLOBALS['conn'],$query);
			return true;
		}



 ?>
