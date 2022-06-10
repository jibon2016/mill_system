<?php
include_once("../function.php");
    $old_password       = $_POST['old_password'];
    $new_password       = $_POST['new_password'];
    $retype_password    = $_POST['retype_password'];
    $user_id            = $_POST['id'];

    $query = "SELECT * FROM `user` WHERE `ID` = '$user_id';";
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();

    $old_password_md5 = md5($old_password);

    if ($old_password_md5 !== $row['PASSWORD'] )
    {
        $_SESSION['error_msg'] = "Old Password does not match";
        header("Location: password_reset.php");
    }else{
       if ($new_password !== $retype_password){
           $_SESSION['error_msg'] = "New Password not Mached";
           header("Location: password_reset.php");
       }else{
           if($old_password == $new_password){
               $_SESSION['error_msg'] = "Your Old password and new password are Same!! Please try another password.";
               header("Location: password_reset.php");
           }else{
               $new_password_md5 = md5($new_password);
               $statement = "UPDATE `user` SET `PASSWORD`='$new_password_md5' WHERE `ID` = '$user_id'";
               $result = mysqli_query($conn, $statement);
               $_SESSION['succ_msg'] = "Password Reset Successfully";
                header("Location: password_reset.php");
           }
       }


    }

?>