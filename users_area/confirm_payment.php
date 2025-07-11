<?php
	include('../connect.php');
	include('../functions/common_functions.php');
	session_start();
	
	if(isset($_GET['order_id'])){
		$order_id=$_GET['order_id'];
	
	$select_data="select * from user_orders where order_id=$order_id";
	$result=mysqli_query($conn,$select_data);
	$row=mysqli_fetch_assoc($result);
	$invoice_number=$row['invoice_number'];
	$amount_due=$row['amount_due'];
	}
	
	if(isset($_POST['confirm_payment'])){
		$invoice_number=$_POST['invoice_number'];
		$amount=$_POST['amount'];
		$payment_mode=$_POST['payment_mode'];
		$insert_query="insert into user_payments (order_id,invoice_number,amount,payment_mode) values($order_id,$invoice_number,$amount,'$payment_mode')";
		$result_query=mysqli_query($conn,$insert_query);
		if($result_query){
			echo "<h3>Payment completed</h3>";
			echo "<script>window.open('profile.php?my_orders','_self')</script>";
		}
		$update_orders="update user_orders set order_status='complete' where order_id=$order_id";
		$update_query=mysqli_query($conn,$update_orders);
	}
?>
<html>
	<head>
	<!-- bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--font awsome file-->
	<link rel="stylesheet" href="../font/css/all.min.css" type="text/css">
	</head>
	<body class="bg-light">
		<div class="container my-5">
		<h1 class="text-center my-2">Confirm Payment</h1>
			<form action="" method="post">
				<div class="form-outline my-4 text-center w-50 m-auto">
					<label>Invoice number</label>
					<input type="text" value="<?php echo $invoice_number ?>" name="invoice_number" class="form-control w-50 m-auto">
				</div>
				<div class="form-outline my-4 text-center w-50 m-auto">
					<label>Amount</label>
					<input type="text" value="<?php echo $amount_due ?>" name="amount" class="form-control w-50 m-auto">
				</div>
				<div class="form-outline my-4 text-center w-50 m-auto">
					<select name="payment_mode" class="form-select w-50 m-auto">
						<option>Select Payment Mode</option>
						<option>netbanking</option>
						<option>upi</option>
						<option>paypal</option>
						<option>COD</option>
					</select>
				</div>
				<div class="form-outline my-4 text-center w-50 m-auto">
					<input type="submit" class="btn btn-primary" value="Confirm" name="confirm_payment">
				</div>
			</form>
		</div>
	</body>
</html>