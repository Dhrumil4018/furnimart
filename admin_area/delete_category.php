<?php
	if(isset($_GET['delete_category'])){
		$delete_category=$_GET['delete_category'];
		$select_product="select * from products where category_id=$delete_category";
		$result_select=mysqli_query($conn,$select_product);
		$row=mysqli_num_rows($result_select);
		if($row>0){
			echo "<script>alert('This category has products! you should delete them first')</script>";
			echo "<script>window.open('./admin.php?view_categories','_self')</script>";
		}else{
		$delete_query="delete from categories where category_id=$delete_category";
		$result_query=mysqli_query($conn,$delete_query);
		if($result_query){
			echo "<script>alert('Category deleted successfully')</script>";
			echo "<script>window.open('./admin.php?view_categories','_self')</script>";
		}
		}
	}
?>

