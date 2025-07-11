<?php 
	include('../connect.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Registration</title>
	<link href="../style.css" rel="stylesheet">
	<!--bootstrap css file-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<style>
	body{
		overflow-x:hidden;
	}
	</style>
	<!--font awsome file-->
	<link rel="stylesheet" href="font/css/all.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
	<div class="container-fluid m-3">
		<h2 class="text-center text-uppercase">admin registration</h2>
		<div class="row d-flex justify-content-center">
			<div class="col-lg-6 col-xl-5">
				<img src="../img/admin_img.jpg" alt="Admin Registration" class="img-fluid">
			</div>
			<div class="col-lg-6 col-xl-5">
				<form action="" method="post">
					<div class="form-outline mb-4 mt-5">
						<label class="form-label" >Username</label>
						<input type="text" name="username" class="form-control w-60" required="required" placeholder="Enter your username">
					</div>
					<div class="form-outline mb-4">
						<label class="form-label" >Email</label>
						<input type="email" name="email" class="form-control w-60" required="required" placeholder="Enter your email">
					</div>
					<div class="form-outline mb-4">
						<label class="form-label" >Password</label>
						<input type="password" name="password" class="form-control w-60" required="required" placeholder="Enter your password">
					</div>
					<div class="form-outline mb-4">
						<label class="form-label" >Confirm Password</label>
						<input type="password" name="conf_password" class="form-control w-60" required="required" placeholder="Enter your password again">
					</div>
					<div>
						<input type="submit" class="btn btn-primary" name="admin_registration" value="Register">
						<p class="small fw-bold mt-2">You have an account? <a href="admin_login.php" class="text-danger">Login</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
  </body>
 </html>
 
 <!-- php code -->
 <?php 
	if(isset($_POST['admin_registration'])){
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$hash_password=password_hash($password,PASSWORD_DEFAULT);
		$conf_password=$_POST['conf_password'];
		
		//select query
		$select_query="select * from admin_table where admin_name='$username' or admin_email='$email'";
		$result_query=mysqli_query($conn,$select_query);
		$row=mysqli_num_rows($result_query);
		if($row>0)
		{
			echo "<script>alert('Username/Email already exists')</script>";
		}
		elseif($conf_password!=$password)
		{
			echo "<script>alert('Password do not match')</script>";
		}
		else
		{
			//insert query
			$insert_query="insert into admin_table (admin_name,admin_email,admin_password) values('$username','$email','$hash_password')";
			$result_insert=mysqli_query($conn,$insert_query);
			if($result_insert){
				echo "<script>alert('Your data has been submited')</script>";
			}
		}
	}
 
 ?>