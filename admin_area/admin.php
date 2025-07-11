<?php
	include('../connect.php');
	include('../functions/common_functions.php');
	session_start();
	
	// if (!isset($_SESSION['admin_name'])) {
		// header("Location: admin_login.php"); // Redirect to the login page
		// exit(); // Stop further execution of the code
	// }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
	<link href="../style.css" rel="stylesheet">
	<!--bootstrap css file-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--font awsome file-->
	<link rel="stylesheet" href="../font/css/all.min.css" type="text/css">
	<style>
		footer{
			bottom:0;
			
		}
		body{
			overflow-x:hidden;
		}
		.product_img{
			width:100px;
			object-fit:contain;
		}
		.name{
		color:#8b008b;
		}
	</style>
  </head>
  <body>
		<!--navbar-->
		<div class="container-fluid p-0 m-0">
			<!--First child-->
			 <nav class="navbar navbar-expand-lg bg-info p-0 ">
				<div class="container-fluid">
					<a class="navbar-brand" href="admin.php"><h2 class="name"><strong>Furni</strong><span><em>Mart</em></span></h2></a>
					<nav class="navbar navbar-expand-lg ">
						<ul class="navbar-nav">
						<?php 
						if(!isset($_SESSION['admin_name'])){
							echo "<li class='nav-item'>
									<a class='nav-link' href='admin_login.php'>Welcome Guest</a>
								</li>";
						}else{
							echo "<li class='nav-item'>
									<a class='nav-link text-capitalize' href='admin.php'>Welcome ".$_SESSION['admin_name']."</a>
								</li>";
						}
						?>
						</ul>
					</nav>
				</div>
			 </nav>
			 
			 <!--Second child-->
			 <div class="bg-light text-center p-2 m-2 pt-4">
				<h2>Manage Details</h2>
			 </div>
			 
			 <!--Third child-->
			 <div class="row pt-4">
				<div class="col-md-12 bg-light p-1">
					<div class=" text-center">
						<a class=" text-body bg-info m-2 btn" href="insert_product.php">Insert Product</a>
						<a class=" text-body bg-info m-2 btn" href="admin.php?view_products">View Products</a>
						<a class="text-body bg-info m-2 btn" href="admin.php?insert_category">Insert Categories</a>
						<a class="text-body bg-info m-2 btn" href="admin.php?view_categories">View Categories</a>
						<a class="text-body bg-info m-2 btn" href="admin.php?list_orders">All Orders</a>
						<a class="text-body bg-info m-2 btn" href="admin.php?list_payments">All Payments</a>
						<a class="text-body bg-info m-2 btn" href="admin.php?list_users">Users List</a>
						<a class="text-body bg-info m-2 btn" href="admin_registration.php">Add Admin</a>
						<a class="text-body bg-info m-2 btn" href="admin_logout.php">Log Out</a>
					</div>
				</div>
			 </div>
			 
			 <!--Fourth child-->
			 <div class="container my-5">
			 <?php
				if(isset($_GET['insert_category'])){
					include('insert_categories.php');
				}
				if(isset($_GET['view_products'])){
					include('view_products.php');
				}
				if(isset($_GET['edit_products'])){
					include('edit_products.php');
				}
				if(isset($_GET['delete_product'])){
					include('delete_product.php');
				}
				if(isset($_GET['view_categories'])){
					include('view_categories.php');
				}
				if(isset($_GET['edit_category'])){
					include('edit_category.php');
				}
				if(isset($_GET['delete_category'])){
					include('delete_category.php');
				}
				if(isset($_GET['list_orders'])){
					include('list_orders.php');
				}
				if(isset($_GET['delete_order'])){
					include('delete_order.php');
				}
				if(isset($_GET['list_payments'])){
					include('list_payments.php');
				}
				if(isset($_GET['delete_payment'])){
					include('delete_payment.php');
				}
				if(isset($_GET['list_users'])){
					include('list_users.php');
				}
				if(isset($_GET['delete_user'])){
					include('delete_user.php');
				}
			 ?>
			 </div>
			 
			 
			 <!--footer-->
			<?php include('../footer.php') ?>
	
	<!--bootstrap js file-->
    <script src="../js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>