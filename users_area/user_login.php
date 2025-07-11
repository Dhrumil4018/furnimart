<?php
	include('../connect.php');
	include('../functions/common_functions.php');
	@session_start(); //@ for when this particuler page is active only then this session will start
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>
	<link href="style.css" rel="stylesheet">
	<!-- bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--font awsome file-->
	<link rel="stylesheet" href="../font/css/all.min.css" type="text/css">
	<style>
	body{
		overflow-x:hidden;
	}
	</style>
  </head>
  <body>
	<div class="container-fluid my-3">
		<h2 class="text-center"> User Login</h2>
		<div class="row align-items-center justify-content-center mt-4">
			<div class="col-lg-12 col-xl-6">
			<form action="" method="post" enctype="multipart/form-data">
				<!-- username --> 
				<div class="form-outline mb-4">
					<label for="user_username" class="form-label">Username</label>
					<input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
				</div>
		
				<!-- password --> 
				<div class="form-outline mb-4">
					<label for="user_password" class="form-label">Password</label>
					<input type="password" id="user_password" class="form-control" placeholder="Enter your password" required="required" name="user_password">
				</div>
				
				<div class="">
					<input type="submit" value="Login" class="btn bg-info py-2 px-3" name="user_login">
				</div>
				<p class="small fw-bold mt-2 mb-0">Don't have an account ?<a href="user_registration.php" class="text-danger "> Register</a></p>
			</form>
			</div>
		</div>
	</div>
  </body>
</html>

<?php 
	if(isset($_POST['user_login'])){
		$user_username=$_POST['user_username'];
		$user_password=$_POST['user_password'];
		
		$select_query="select * from user_table where username='$user_username'";
		$result=mysqli_query($conn,$select_query);
		$rows=mysqli_num_rows($result);
		$row_data=mysqli_fetch_assoc($result);
		$user_ip=getIPAddress();
		
		//cart item
		$select_query_cart="select * from cart_details where username='$user_username'";
		$result_cart=mysqli_query($conn,$select_query_cart);
		$rows_cart=mysqli_num_rows($result_cart);
		if($rows>0){
			$_SESSION['username']=$user_username;
			if(password_verify($user_password,$row_data['user_password']))
			{
				//echo "<script>alert('Login Successful')</script>";
				if($rows==1 and $rows_cart==0)
				{
					$_SESSION['username']=$user_username;
					echo "<script>alert('Login Successful')</script>";
					echo "<script>window.open('profile.php','_self')</script>";
				}
				else
				{
					$_SESSION['username']=$user_username;
					echo "<script>alert('Login Successful')</script>";
					echo "<script>window.open('../cart.php','_self')</script>";
				}
			}else
			{
				echo "<script>alert('Invalid Password')</script>";
			}
		}else
		{
			echo "<script>alert('Invalid Username')</script>";
		}
	}

?>