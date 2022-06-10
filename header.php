<?php 
include_once("function.php");

?>
<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Mill System</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo $url?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $url?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $url?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?php echo $url?>assets/vendor/chartist/css/chartist-custom.css">
	<link rel="stylesheet" href="<?php echo $url?>assets/css/jquery-ui.min.css">
	<script src="<?php echo $url?>assets/js/jquery-3.2.1.js"></script>
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo $url?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?php echo $url?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $url?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $url?>assets/img/favicon.png">
	<script type="text/javascript">
$(document).ready(function() {
    $(".tab").click(function () {
        $("this").addClass("active").siblings().removeClass("active");   
    });
});
</script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?php echo $url?>index.php"><img src="<?php echo $url?>assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-success">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $url.'user/'.$_SESSION['Img']?>" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['userName']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo $url;?>user/view.php?id=<?php echo $_SESSION['userId']?>"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="<?php echo $url;?>user/password_reset.php?id=<?php echo $_SESSION['userId']?>"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="<?php echo $url?>logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav" >
						<li><a href="<?php echo $url?>index.php" class="tab active "><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li>
							<a href="#Bazarsub" data-toggle="collapse" class="collapsed tab"><i class="lnr lnr-code"></i> <span>Bazar list</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="Bazarsub" class="collapse">
								<ul class="nav">
									<li><a href="<?php echo $url?>Bazar_list/bazar_list.php">Add Bazar</a></li>
									<li><a href="<?php echo $url?>Bazar_list/bazar_info.php" class="">Bazar Information</a></li>
								</ul>
							</div>
						</li>


						<li>
							<a href="#Mill_sub" data-toggle="collapse" class="collapsed tab "><i class="lnr lnr-chart-bars"></i> <span>Mill Info</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="Mill_sub" class="collapse ">
								<ul class="nav">
									<li><a href=<?php echo $url?>mill/add_mill.php class="">Add Mill</a></li>
									<li><a href=<?php echo $url?>mill/mill_info.php class="">Mill List</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#dip_sub" data-toggle="collapse" class="collapsed"><i class="lnr lnr-diamond"></i> <span>Diposit</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="dip_sub" class="collapse ">
								<ul class="nav">
									<li><a href=<?php echo $url?>deposit/add_deposit.php class="">Add Diposit</a></li>
									<li><a href=<?php echo $url?>deposit/deposit_list.php class="">Diposit List</a></li>
								</ul>
							</div>

						</li>
						
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>User</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo $url?>user/user_insert.php" class="">Add User</a></li>
									<li><a href="<?php echo $url?>user/user_profile.php" class="">All User</a></li>
									<li><a href="<?php echo $url?>extra.php" class="">Extra</a></li>
								</ul>
							</div>
						</li>
                        <li>
							<a href="#report_pages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-dice"></i> <span>Mill Report</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="report_pages" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo $url?>mill_report/this_month.php" class="">This month report</a></li>
									<li><a href="<?php echo $url?>mill_report/last_month.php" class="">Last month report</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->