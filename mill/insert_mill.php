<?php 
include_once("../function.php");

if ( $role !== "admin" && $role !== "mamager"){
    printf("<script>location.href='add_mill.php'</script>");
}

$mill = $_POST['mill_info'];
$id = $_POST['id'];
$mill_date = data_clear($_POST['mill_date']);


$query = "SELECT * FROM `mill_info` WHERE Date = '$mill_date'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0){
    $_SESSION["error_msg"] ='This date mill is already Inserted!';
    header("Location: add_mill.php");
}else {

    $count = count($id);
    $statement = "INSERT INTO `mill_info` (`U_ID`, `Mill_Count`, `MIll_rate`, `Date`, `M_Date`) VALUES ";
    for ($i = 0; $i < $count; $i++) {
        if ($_POST['mill_info'][$i] == 0 || $_POST['mill_info'][$i] == NULL ){
            //
        }else{
            $statement .= "('" . $_POST['id'][$i] . "', '" . $_POST['mill_info'][$i] . "', '', '$mill_date', '$S_date'),";
        }
    }
    $statement = rtrim($statement, ',');

    if (mysqli_query($conn, $statement)) {
        $_SESSION["succ_msg"] = "Successfully add Mill";
        header("Location: mill_info.php");
    } else {
        $_SESSION["error_mill"] = 1;
        header("Location: add_mill.php");
    }
}
 ?>