<?php
	include('../connect.php');
	include('../functions/common_functions.php');
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>
	<link href="style.css" rel="stylesheet">
	<!-- bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--font awsome file-->
	<link rel="stylesheet" href="../font/css/all.min.css" type="text/css">
  </head>
  <body>
	<div class="container-fluid my-3">
		<h2 class="text-center">New User Registration</h2>
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-12 col-xl-6">
			<form action="" method="post" enctype="multipart/form-data">
				<!-- username --> 
				<div class="form-outline mb-4">
					<label for="user_username" class="form-label">Username</label>
					<input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
				</div>
				<!-- email --> 
				<div class="form-outline mb-4">
					<label for="user_email" class="form-label">Email</label>
					<input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
				</div>
				<!-- password --> 
				<div class="form-outline mb-4">
					<label for="user_password" class="form-label">Password</label>
					<input type="password" id="user_password" class="form-control" placeholder="Enter your password" required="required" name="user_password">
				</div>
				<!-- confrim password --> 
				<div class="form-outline mb-4">
					<label for="conf_user_password" class="form-label">Confirm Password</label>
					<input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" required="required" name="conf_user_password">
				</div>
				<!-- address --> 
				<div class="form-outline mb-4">
					<label for="user_address" class="form-label">Address</label>
					<input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
				</div>
				<!-- contact --> 
				<div class="form-outline mb-4">
					<label for="user_contact" class="form-label">Contact</label>
					<input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_contact">
				</div>
				
				<div class="">
					<input type="submit" value="Register" class="btn bg-info py-2 px-3" name="user_register">
				</div>
				<p class="small fw-bold mt-2 mb-0">Already have an account ?<a href="user_login.php" class="text-danger "> Login</a></p>
			</form>
			</div>
		</div>
	</div>
  </body>
</html>

<!-- php code -->
<?php 
	if(isset($_POST['user_register'])){
		$user_username=$_POST['user_username'];
		$user_email=$_POST['user_email'];
		$user_password=$_POST['user_password'];
		$hash_password=password_hash($user_password,PASSWORD_DEFAULT);
		$conf_user_password=$_POST['conf_user_password'];
		$user_address=$_POST['user_address'];
		$user_contact=$_POST['user_contact'];
		$user_ip=getIPAddress();
		
		//select_query
		$select_query="select * from user_table where username='$user_username' or user_email='$user_email' ";
		$result_query=mysqli_query($conn,$select_query);
		$rows=mysqli_num_rows($result_query);
		if($rows>0)
		{
			echo "<script>alert('Username/Email already exist')</script>";
		}
		elseif($conf_user_password!=$user_password)
		{
			echo "<script>alert('Password do not match')</script>";
		}
		else
		{
			//insert_query
			$insert_query="insert into user_table (username,user_email,user_password,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_ip','$user_address','$user_contact')";
			$result=mysqli_query($conn,$insert_query);
			if($result){
				echo "<script>alert('Your data has been submited')</script>";
			}
		}
		
	//selecting cart items
	$select_cart_items="select * from cart_details where ip_address='$user_ip'";
	$result_cart=mysqli_query($conn,$select_cart_items);
	$rows=mysqli_num_rows($result_cart);
	if($rows){
		$_SESSION['username']=$user_username;
		echo "<script>alert('You have items in your cart')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}else{
		echo "<script>window.open('../index.php','_self')</script>";
	}
	}
?>