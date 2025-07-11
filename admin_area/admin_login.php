<?php 
	include('../connect.php');
	@session_start(); //@ for when this particuler page is active only then this session will start
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
	<link href="../style.css" rel="stylesheet">
	<!--bootstrap css file-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<style>
	body{
		overflow-x: hidden;
	}
	</style>
	<!--font awsome file-->
	<link rel="stylesheet" href="font/css/all.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
	<div class="container-fluid m-3">
		<h2 class="text-center text-uppercase">admin login</h2>
		<div class="row d-flex justify-content-center">
			<div class="col-lg-6 col-xl-5">
				<img src="../img/admin_img.jpg" alt="Admin Registration" class="img-fluid">
			</div>
			<div class="col-lg-6 col-xl-5">
				<form action="" method="post">
					<div class="form-outline mb-4 mt-5">
						<label class="form-label" >Username</label>
						<input type="text" name="admin_username" class="form-control w-60" required="required" placeholder="Enter your username">
					</div>
					<div class="form-outline mb-4">
						<label class="form-label" >Password</label>
						<input type="password" name="password" class="form-control w-60" required="required" placeholder="Enter your password">
					</div>
					<div>
						<input type="submit" class="btn btn-primary" name="admin_login" value="Login">
						<!--<p class="small fw-bold mt-2">Don't you have an account? <a href="admin_registration.php" class="text-danger">Register</a></p>-->
					</div>
				</form>
			</div>
		</div>
	</div>
  </body>
 </html>
 
 <!-- php code -->
 <?php 
	if(isset($_POST['admin_login'])){
		$admin_username=$_POST['admin_username'];
		$password=$_POST['password'];
		
		$select_query="select * from admin_table where admin_name='$admin_username'";
		$result=mysqli_query($conn,$select_query);
		$rows=mysqli_num_rows($result);
		$row_data=mysqli_fetch_assoc($result);
		
		if($rows>0)
		{
			$_SESSION['admin_name']=$admin_username;
			if(password_verify($password,$row_data['admin_password']))
			{
				echo "<script>alert('Login Successfully')</script>";
				echo "<script>window.open('admin.php','_self')</script>";
			}
			else
			{
				echo "<script>alert('Invalid Password')</script>";
			}
		}
		else
		{
			echo "<script>alert('Invalid Credintials')</script>";
		}
	}
 ?>