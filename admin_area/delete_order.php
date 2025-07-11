<?php
	if(isset($_GET['delete_order'])){
		$delete_order=$_GET['delete_order'];
		$delete_query="delete from user_orders where order_id=$delete_order";
		$result_query=mysqli_query($conn,$delete_query);
		if($result_query){
			echo "<script>alert('Order deleted successfully')</script>";
			echo "<script>window.open('./admin.php?list_orders','_self')</script>";
		}
	}
?>

