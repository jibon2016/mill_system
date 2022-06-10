<?php 
include_once("../header.php");
include_once("../function.php");

$sql = "SELECT * FROM user;";
$result = mysqli_query($conn, $sql);


 ?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h3 class="text-center">All User</h3>
                <hr/>
                <?php if(isset($_SESSION["succ_msg"])) { ?>
                    <div class="alert alert-success alert-dismissible show" role="alert">
                        <strong>Successful!</strong> <?php echo $_SESSION['succ_msg']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
                unset($_SESSION["succ_msg"]); ?>
                <?php if(isset($_SESSION["error_msg"])) { ?>
                    <div class="alert alert-warning alert-dismissible show" role="alert">
                        <strong>Warning!</strong> <?php echo $_SESSION['error_msg']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
                unset($_SESSION["error_msg"]); ?>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th colspan="3" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['NAME']; ?></td>
                            <td><?php echo $row['EMAIL']; ?></td>
                            <td><?php echo $row['P_Address']; ?></td>
                            <td><a class="btn btn-primary" href="<?php echo $url;?>user/view.php?id=<?php echo $row ['ID']?>">View</a></td>
                            <td><a class="btn btn-warning" href="<?php echo $url;?>user/user_edit.php?id=<?php echo $row ['ID']?>">Edit</a></td>
                            <td><a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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