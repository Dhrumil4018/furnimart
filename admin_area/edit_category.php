<?php 
	if(isset($_GET['edit_category'])){
		$edit_category=$_GET['edit_category'];
		
		$edit_query="select * from categories where category_id=$edit_category";
		$result_query=mysqli_query($conn,$edit_query);
		$row=mysqli_fetch_assoc($result_query);
		$category_title=$row['category_title'];
	}
	if(isset($_POST['update_category'])){
		$category_title=$_POST['category_title'];
		
		$update_query="update categories set category_title='$category_title' where category_id=$edit_category";
		$result_update=mysqli_query($conn,$update_query);
		if($result_update){
			echo "<script>alert('Category updated successfully')</script>";
			echo "<script>window.open('./admin.php?view_categories','_self')</script>";
		}
	}
?>
<div class="container mt-3">
	<h2 class="text-center">Edit Category</h2>
	<form action="" method="post" class="text-center">
		<div class="form-outline mb-4">
			<label class="form-label">Category Title</label>
			<input type="text" class="form-control w-50 m-auto" name="category_title" value="<?php echo $category_title ?>" required="required">
		</div>
		<input type="submit" class="btn btn-primary" name="update_category" value="Update Category">
	</form>
</div>


