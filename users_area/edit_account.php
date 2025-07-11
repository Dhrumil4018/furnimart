<?php 
	if(isset($_GET['edit_account'])){
		$user_session_name=$_SESSION['username'];
		$select_query="select * from user_table where username='$user_session_name'";
		$result_select_query=mysqli_query($conn,$select_query);
		$row=mysqli_fetch_assoc($result_select_query);
		$user_id=$row['user_id'];
		$username=$row['username'];
		$user_email=$row['user_email'];
		$user_address=$row['user_address'];
		$user_mobile=$row['user_mobile'];
		
	}
		if(isset($_POST['user_update'])){
			$update_id=$user_id;
			$username=$_POST['user_username'];
			$user_email=$_POST['user_email'];
			$user_address=$_POST['user_address'];
			$user_mobile=$_POST['user_mobile'];
			
			$update_query="update user_table set username='$username',user_email='$user_email',user_address='$user_address',user_mobile='$user_mobile' where user_id=$update_id";
			$result_update_query=mysqli_query($conn,$update_query);
			if($result_update_query){
				echo "<script>alert('Data updated Successfully')</script>";
				echo "<script>window.open('logout.php','_self')</script>";
			}
		}
	

?>
<html>
	<body>
		<h3 class="text-center text-success mb-4 mt-3"><u>Edit Account</u></h3>
		<form action="" method="post" class="text-center mt-5">
			<div class="form-outline mb-4">
				<input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="user_username" >
			</div>
			<div class="form-outline mb-4">
				<input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email" >
			</div>
			<div class="form-outline mb-4">
				<input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address" >
			</div>
			<div class="form-outline mb-4">
				<input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile" >
			</div>
			
			<input type="submit" class="btn btn-primary px-2 py-2" value="Update" name="user_update">
		</form>
	</body>
</html>