<?php
	include('../connect.php');
	include('../functions/common_functions.php');
?>
<html>
	<head>
		<title>Payment page</title>
		<!-- bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<style>
	img{
		width:80%;
		
	}
	</style>
	</head>
	<body>
		<!-- php code for get user id -->
		<?php
			$user_ip=getIPAddress();
			$username = "";
			if(isset($_SESSION['username']))
				{
	$username = $_SESSION['username'];}
			$select_query="select * from user_table where username='$username'";
			$result=mysqli_query($conn,$select_query);
			$run=mysqli_fetch_array($result);
			$user_id=$run['user_id'];
		?>
		<div class="container">
			<h2 class="text-center text-primary">PAYMENT OPTIONS</h2>
			<div class="row  d-flex justify-content-center align-items-center pt-3 my-5">
				<div class="col-md-6">
				  <a href="https://www.paypal.com" target="_blank"><img src="../img/upi.png" alt="payment"></a>
				</div>
				<div class="col-md-6">
					<a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay offline</h2></a>
				</div>
			</div>
		</div>
	</body>
</html>