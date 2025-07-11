<?php
	if(isset($_GET['delete_payment'])){
		$delete_payment=$_GET['delete_payment'];
		$delete_query="delete from user_payments where payment_id=$delete_payment";
		$result_query=mysqli_query($conn,$delete_query);
		if($result_query){
			echo "<script>alert('Payment deleted successfully')</script>";
			echo "<script>window.open('./admin.php?list_orders','_self')</script>";
		}
	}
?>

