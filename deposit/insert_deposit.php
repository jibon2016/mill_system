<?php 
include_once("../function.php");

    $deposit_ammount = $_POST['diposit_val'];
    $deposit_date = $_POST['diposit_date'];
    $deposit_menber = $_REQUEST['deposit_member'];

    $sql = "INSERT INTO `deposit` (`ID`, `U_ID`, `Amount`, `Deposit_Date`,`D_month`) VALUES (NULL, '$deposit_menber', '$deposit_ammount', '$deposit_date', '$S_date');";
    if (mysqli_query($conn, $sql)) {
        $_SESSION["add_deposit"] =1;
        header("Location: add_deposit.php");
     }else{
        $_SESSION["deposit_error"] =1;
        header("Location: add_deposit.php");
     }

?>