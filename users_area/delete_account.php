<html>
	<head>
		<title>Delete  Account</title>
	</head>
	<body>
		<h3 class="text-center mb-5 mt-2">Delete Account</h3>
		<form action="" method="post" class="mt-3">
			<div class="form-outline mb-4">
				<input type="submit" value="Delete Account" name="delete" class="form-control w-50 m-auto">
			</div>
			<div class="form-outline">
				<input type="submit" value="Don't Delete Account" name="dont_delete" class="form-control w-50 m-auto">
			</div>
		</form>
	</body>
</html>

<?php 
	$username_session=$_SESSION['username'];
	if(isset($_POST['delete'])){
		$delete_query="delete from user_table where username='$username_session'";
		$result=mysqli_query($conn,$delete_query);
		if($result)
		{
			session_destroy();
			echo "<script>alert('Account Deleted')</script>";
			echo "<script>window.open('../index.php','_self')</script>";
		}
	}
	
	if(isset($_POST['dont_delete'])){
		echo "<script>window.open('profile.php','_self')</script>";
	}
?>