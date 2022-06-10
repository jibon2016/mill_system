<?php
include_once("../function.php");
    $role = $_SESSION['ROLE'];
    if ( $role !== "admin" && $role !== "mamager"){
        printf("<script>location.href='bazar_list.php'</script>");
    }
    $bazar_date = data_clear($_POST['bazar_date']);

    $date = checkMonth($bazar_date);
    if (isset($date)){
        $query = "SELECT * FROM `bazar_list` WHERE `bazar_list`.`B_Date` = '$bazar_date'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0){
            $statement = "DELETE FROM `bazar_list` WHERE `bazar_list`.`B_Date` = '$bazar_date';";
            mysqli_query($conn, $statement);
            $_SESSION ['succ_msg'] = "Delete Bazar Successfully";
            header("Location: bazar_info.php");
        }else{
            $_SESSION ['error_msg'] = "There is no bazar this in date ".$bazar_date;
            header("Location: bazar_list.php");
        }
    }else{
        $_SESSION ['error_msg'] = "Please Select This Month Date";
        header("Location: bazar_list.php");
    }

?>