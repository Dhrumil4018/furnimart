<?php
	include('../connect.php');
	if(isset($_POST['insert_cat']))
	{
		$categories_title=$_POST['cat_title'];
		
		$select_query="select * from `categories` where category_title='$categories_title'";
		$result=mysqli_query($conn,$select_query);
		$rows=mysqli_num_rows($result);
		if($rows>0){
			echo "<script>alert('This category already present in database')</script>";
		}
		else
		{
			$insert_query="insert into categories (category_title) values ('$categories_title')";
			$result_insert=mysqli_query($conn,$insert_query);
			if($result_insert)
			{
				echo "<script>alert('Category has been inserted successfully')</script>";
			}
		}
	}
?>
<form action="" method="POST" class="m-2">
	<div class="input-group w-90 mb-3">
		<span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-reciept"></i></span>
		<input type="text" class="form-control" placeholder="Insert Categories" name="cat_title" aria-label="Categories" aria-describedby="basic-addon1">
	</div>
	<div class="input-group w-10 mb-2 m-auto">
		<input type="submit" class="bg-info p-2 my-3 border-0 btn" name="insert_cat" value="Insert Categories"></input>
	</div>
</form>