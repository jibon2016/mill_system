<?php 
include_once("../header.php");
include_once("../function.php");
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE ID = '$id';";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
 ?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">User Information</h3>
                    <hr/>
                    <?php if(isset($_SESSION["user_resister"])) { ?>
                        <div class="alert alert-success alert-dismissible show" role="alert">
                          <strong>SUCCESS!</strong> User Profile is edit.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    <?php }
                    unset($_SESSION["user_resister"]); ?>
                    <?php if(isset($_SESSION["user_resister_error"])) { ?>
                        <div class="alert alert-warning alert-dismissible show" role="alert">
                          <strong>WARNING!</strong> User Profile is not edit, There is a problem.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    <?php }
                    unset($_SESSION["user_resister_error"]); ?>
                    <div class="col-md-6 col-md-offset-3">
                    <table class="table " >
                        <tr>
                            <th width="100" class="text-right" >Name:</th>
                            <td><?php echo $user['NAME']; ?></td>
                        </tr>
                        <tr>
                            <th width="100" class="text-right" >Email:</th>
                            <td><?php echo $user['EMAIL'] ;?></td>
                        </tr>
                        <tr>
                            <th width="100" class="text-right" >Address:</th>
                            <td><?php echo $user['P_Address']; ?></td>
                        </tr>
                        <tr>
                            <th width="100" class="text-right" >Mobile:</th>
                            <td><?php echo $user['MOBILE'] ?></td>
                        </tr>
                        <div class="user_img text-center">
                            <img width="300" height="300" src="<?php echo  $user['U_Image'];?>" alt="Image">
                        </div>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<?php 
include_once("../footer.php");
?>