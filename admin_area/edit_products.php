<?php
	if(isset($_GET['edit_products'])){
		$edit_id=$_GET['edit_products'];
		$get_data="select * from products where product_id=$edit_id";
		$result_data=mysqli_query($conn,$get_data);
		$row=mysqli_fetch_assoc($result_data);
		$product_title=$row['product_title'];
		$product_description=$row['product_description'];
		$product_keywords=$row['product_keywords'];
		$product_image=$row['product_image'];
		$product_image2=$row['product_image2'];
		$product_image3=$row['product_image3'];
		$product_price=$row['product_price'];
		$category_id=$row['category_id'];
		
		//fetching category name
		$select_cat="select * from categories where category_id=$category_id";
		$result_cat=mysqli_query($conn,$select_cat);
		$row_cat=mysqli_fetch_assoc($result_cat);
		$category_title=$row_cat['category_title'];
		//echo $category_title; 
	}
	if(isset($_POST['update_product'])){
		$product_title=$_POST['product_title'];
		$product_description=$_POST['product_description'];
		$product_keywords=$_POST['product_keywords'];
		$product_category=$_POST['product_category'];
		$product_price=$_POST['product_price'];
		
		$product_image=$_FILES['product_image']['name'];
		$product_image2=$_FILES['product_image2']['name'];
		$product_image3=$_FILES['product_image3']['name'];
		
		$temp_image=$_FILES['product_image']['tmp_name'];
		$temp_image2=$_FILES['product_image2']['tmp_name'];
		$temp_image3=$_FILES['product_image3']['tmp_name'];
		
		move_uploaded_file($temp_image,"./db_pro_img/$product_image");
		move_uploaded_file($temp_image,"./db_pro_img/$product_image2");
		move_uploaded_file($temp_image,"./db_pro_img/$product_image3");
		
		//query for update Product
		$update_query="update products set product_title='$product_title',product_description='$product_description',product_keywords='$product_keywords',product_image='$product_image',product_image2='$product_image2',product_image3='$product_image3', product_price='$product_price', category_id='$product_category',date=NOW() where product_id=$edit_id";
		$result_update=mysqli_query($conn,$update_query);
		if($result_update){
			echo "<script>alert('Product updated successfully')</script>";
			echo "<script>window.open('./admin.php?view_products','_self')</script>";
		}
	}
?>
<div class="container mt-5">
	<h1 class="text-center mt-3">Edit Product</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-outline w-50 m-auto mb-4">
			<label class="form-label">Product Title</label>
			<input type="text" name="product_title" value="<?php echo $product_title ?>" required="required" class="form-control">
		</div>
		<div class="form-outline w-50 m-auto mb-4">
			<label class="form-label">Product Description</label>
			<input type="text" name="product_description" value="<?php echo $product_description ?>" required="required" class="form-control">
		</div>
		<div class="form-outline w-50 m-auto mb-4">
			<label class="form-label">Product Keywords</label>
			<input type="text" name="product_keywords" value="<?php echo $product_keywords ?>" required="required" class="form-control">
		</div>
		<div class="form-outline w-50 m-auto mb-4">
		<label class="form-label">Product Categories</label>
		<select class="form-select" name="product_category">
			<option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
			<?php 
			$select_cat_all="select * from categories";
			$result_cat_all=mysqli_query($conn,$select_cat_all);
			while($row_cat_all=mysqli_fetch_assoc($result_cat_all)){
				$category_title=$row_cat_all['category_title'];
				$category_id=$row_cat_all['category_id'];
				echo "<option value='$category_id'>$category_title</option>";
			}
			?>
		</select>
		</div>
		<div class="form-outline w-50 m-auto mb-4">
			<label class="form-label">Product Image</label>
			<div class="d-flex">
				<input type="file" name="product_image" value="<?php echo $product_image ?>" required="required" class="form-control w-90 m-auto">
				<img src="./db_pro_img/<?php echo $product_image ?>" class="product_img">
			</div>
		</div>
		<div class="form-outline w-50 m-auto mb-4">
			<label class="form-label">Product Image2</label>
			<div class="d-flex">
				<input type="file" name="product_image2" value="<?php echo $product_image2 ?>" required="required" class="form-control w-90 m-auto">
				<img src="./db_pro_img/<?php echo $product_image2 ?>" class="product_img">
			</div>
		</div>
		<div class="form-outline w-50 m-auto mb-4">
			<label class="form-label">Product Image3</label>
			<div class="d-flex">
				<input type="file" name="product_image3" value="<?php echo $product_image3 ?>" required="required" class="form-control w-90 m-auto">
				<img src="./db_pro_img/<?php echo $product_image3 ?>" class="product_img">
			</div>
		</div>
		<div class="form-outline w-50 m-auto mb-4">
			<label class="form-label">Product Price</label>
			<input type="text" name="product_price" value="<?php echo $product_price ?>" required="required" class="form-control">
		</div>
		<div class="w-50 m-auto">
			<input type="submit" value="Update Product" name="update_product" class="btn btn-primary px-3 mb-3">
		</div>
	</form>
</div>

<?php 
	
?>