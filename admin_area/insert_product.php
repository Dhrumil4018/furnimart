<?php
	include('../connect.php');
	if(isset($_POST['insert_product']))
	{
		$product_title=$_POST['product_title'];
		$description=$_POST['description'];
		$product_keyword=$_POST['product_keyword'];
		$product_price=$_POST['product_price'];
		$product_category=$_POST['product_category'];
		$priduct_status="true";
		
		//accessing images
		$product_image=$_FILES['product_image']['name'];
		$product_image2=$_FILES['product_image2']['name'];
		$product_image3=$_FILES['product_image3']['name'];
		
		//accessing image temp name
		$temp_image=$_FILES['product_image']['tmp_name'];
		$temp_image2=$_FILES['product_image2']['tmp_name'];
		$temp_image3=$_FILES['product_image3']['tmp_name'];
		
		//storing in folder 
		move_uploaded_file($temp_image,"./db_pro_img/$product_image");
		move_uploaded_file($temp_image2,"./db_pro_img/$product_image2");
		move_uploaded_file($temp_image3,"./db_pro_img/$product_image3");
		
		//insert query
		
		$insert_product="insert into  `products` (product_title,product_description,product_keywords,product_image,product_image2,product_image3,product_price,category_id,date,status) values('$product_title','$description','$product_keyword','$product_image','$product_image2','$product_image3','$product_price','$product_category',NOW(),'$priduct_status')";
		$result_query=mysqli_query($conn,$insert_product);
		if($result_query){
			echo "<script>alert('product inserted successfully')</script>";
			echo "<script>window.open('./admin.php?view_products','_self')</script>";
		}
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Products-Admin Dashboard</title>
	<link href="../style.css" rel="stylesheet">
	<!--bootstrap css file-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--font awsome file-->
	<link rel="stylesheet" href="../font/css/all.min.css" type="text/css">
  </head>
  <body class="bg-light">
	<div class="container mt-3">
		<h1 class="text-center">Insert Product</h1>
		<!--Form for inserting product details-->
		<form action="" method="post" enctype="multipart/form-data">
			<!--TITLE-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_title" class="form-label">Product_title</label>
				<input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" required="required">
			</div>
			
			<!--DESCRIPTION-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="description" class="form-label">Product_description</label>
				<input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" required="required">
			</div>
			
			<!--KEYWORDS-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_keyword" class="form-label">Product_keywords</label>
				<input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keywords" required="required">
			</div>
			
			<!--IMAGE-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_image" class="form-label">product_image</label>
				<input type="file" name="product_image" id="product_image" class="form-control" required="required">
			</div>
			
			<!--IMAGE-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_image2" class="form-label">product_image2</label>
				<input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
			</div>
			
			<!--IMAGE-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_image3" class="form-label">product_image3</label>
				<input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
			</div>
			
			<!--PRICE---->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_price" class="form-label">Product_price</label>
				<input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" required="required">
			</div>
			
			<!--CATEGORIES-->
			<div class="form-outline mb-6 w-50 m-auto">
				<select name="product_category" class="form-select form-select-sm">
					<option value="">Select category</option>
					<?php
						$select_category="select * from `categories` ";
						$result_category=mysqli_query($conn,$select_category);
						while($row=mysqli_fetch_assoc($result_category))
						{
							$cat_id=$row['category_id'];
							$cat_title=$row['category_title'];
							echo "<option value='$cat_id'>$cat_title</option>";
						}
					?>
				</<select>
			</div>
			
			<!--SUBMIT BTN-->
			<div class="form-outline mb-4 w-50 m-auto">
				<input type="submit" name="insert_product" class="btn btn-info mb-3 mt-4 px-3" value="Insert product">
			</div>
		</form>
	</div>
	
	<!--bootstrap js file-->
    <script src="../js/bootstrap.bundle.min.js" type="text/javascript"></script>
  </body>