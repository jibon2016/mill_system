<?php
include_once("../function.php");
$role = $_SESSION['ROLE'];
if ( $role !== "admin" && $role !== "mamager"){
    printf("<script>location.href='mill_info.php'</script>");
}
    $mill_date = $_POST['mill_date'];

    $date = checkMonth($mill_date);
    if (isset($date)){
        $query = "SELECT * FROM `mill_info` WHERE `mill_info`.`Date` = '$mill_date'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0){
            $statement = "DELETE FROM `mill_info` WHERE `mill_info`.`Date` = '$mill_date';";
            mysqli_query($conn, $statement);
            $_SESSION ['succ_msg'] = "Delete Mill Successfully";
            header("Location: mill_info.php");
        }else{
        $_SESSION ['error_msg'] = "There was no Mill in date ".$mill_date;
        header("Location: mill_info.php");
        }
    }else{
        $_SESSION ['error_msg'] = "Please Select This Month Date";
       header("Location: add_mill.php");
    }

?>
