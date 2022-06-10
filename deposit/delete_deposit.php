<?php
include_once("../function.php");
    $role = $_SESSION['ROLE'];
    if ( $role !== "admin" && $role !== "mamager"){
        printf("<script>location.href='add_deposit.php'</script>");
    }
    $deposit_date = $_POST['deposit_date'];
    $member = $_POST['member'];

    $date = checkMonth($deposit_date);
    if (isset($date)){
        $query = "SELECT * FROM `deposit` WHERE `deposit`.`Deposit_Date` = '$deposit_date'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0){
            $statement = "DELETE FROM `deposit` WHERE `deposit`.`Deposit_Date` = '$deposit_date' AND `U_ID` = '$member';";
            mysqli_query($conn, $statement);
            $_SESSION ['succ_msg'] = "Delete Deposit Successfully";
            header("Location: add_deposit.php");
        }else{
            $_SESSION ['error_msg'] = "There was no Deposit in this date ".$deposit_date;
            header("Location: add_deposit.php");
        }
    }else{
    $_SESSION ['error_msg'] = "Please Select This Month Date";
    header("Location: add_deposit.php");
    }

?>