<?php 
include_once("../function.php");
$bazar_ammount = $_POST['ammount'];
$bazar_date = $_POST['Date'];
$bazar_menber = $_REQUEST['member'];
$bazar_list = $_POST['bazar_list'];
$deposit = $_POST['deposit'];

// Validation of Date
$date = checkMonth($bazar_date);
//    if (isset($date)){
        $sql = "INSERT INTO `bazar_list` (`ID`, `U_ID`, `B_Description`, `B_Amount`, `B_Date`, `B_month`,`approve_by_manager`) VALUES (NULL, '$bazar_menber', '$bazar_list', '$bazar_ammount', '$bazar_date', '$S_date', 0);";
        if ($deposit == 'yes'){
            $query2 = "INSERT INTO `deposit`(`ID`, `U_ID`, `Amount`, `Deposit_Date`, `D_month`, `approve_by_manager`) VALUES (NULL,'$bazar_menber','$bazar_ammount','$bazar_date','$S_date', 0);";
            mysqli_query($conn, $query2);
        }
        if (mysqli_query($conn, $sql)) {
            $_SESSION["succ_msg"] ="Bazar is Add.";
            header("Location: bazar_info.php");
        }else{
            $_SESSION["error_msg"] ="Query not exectue";
            header("Location: bazar_list.php");
        }
//    }
//    else{
//        $_SESSION["error_msg"] ='Select only this month date';
//        header("Location: bazar_list.php");
//    }

    function test(){
        return "This is test Data";
    }
?>