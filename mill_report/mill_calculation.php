<?php

include_once("../function.php");

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
}else{};

        function userTotalDeposit($first_date, $last_date, $user_id){
            $query2 = "SELECT * FROM deposit WHERE U_ID = '$user_id' AND Deposit_Date BETWEEN '$first_date' AND '$last_date' ;";
            $result2 =mysqli_query($GLOBALS['conn'], $query2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $member_amount[] =  $row2['Amount'];
            }

            if (empty($member_amount)) {
                return $member_sum = 0;
            }else{
                return $member_sum = array_sum($member_amount);
            }
        };


        function userTotalMill($first_date, $last_date, $user_id){
            $query3 = "SELECT * FROM mill_info WHERE U_ID = '$user_id' AND Date BETWEEN '$first_date' AND '$last_date' ;";
            $result3 =mysqli_query($GLOBALS['conn'], $query3);
            while ($row1 = mysqli_fetch_assoc($result3)) {
                  $member_mill[] =  $row1['Mill_Count'];
                }
            if (empty($member_mill)) {
                return $mill_sum = 0;
            }else{
                return $mill_sum = array_sum($member_mill);
            }
        };

        $sql1 = "SELECT * FROM user WHERE `ID` = '$user_id';";
        $result4 = mysqli_query($GLOBALS['conn'], $sql1);
        $user = mysqli_fetch_assoc($result4);


        $sql = "SELECT * FROM user;";
        $result3 = mysqli_query($GLOBALS['conn'], $sql);
        $Alluser = mysqli_num_rows($result3);

        function monthExtra($first_date, $last_date ){
            $statement = "SELECT * FROM extra WHERE extra_date BETWEEN '$first_date' AND '$last_date' ;";
            $result4 =mysqli_query($GLOBALS['conn'], $statement);
            while ($row3 = mysqli_fetch_assoc($result4)) {
                $extra_cost_array[] =  $row3['extra_amount'];
            }
            if (empty($extra_cost_array)) {
                return $extra_cost = 0;
            }else{
                return $extra_cost = array_sum($extra_cost_array);
            }
        }


?>