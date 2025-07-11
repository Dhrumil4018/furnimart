<h3 class="text-center">All Products</h3>
<table class="table table-hover mt-5 text-center">
	<thead class="bg-info">
		<tr>
			<th>Product No</th>
			<th>Product Title</th>
			<th>Product Image</th>
			<th>Product Price</th>
			<th>Total Sold</th>
			<th>Status</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$get_products="select * from products";
	$result=mysqli_query($conn,$get_products);
	$number=1;
	while($row=mysqli_fetch_assoc($result)){
		$product_id=$row['product_id'];
		$product_title=$row['product_title'];
		$product_image=$row['product_image'];
		$product_price=$row['product_price'];
		$status=$row['status'];
		?>
		<tr>
			<td><?php echo $number; ?></td>
			<td><?php echo $product_title; ?></td>
			<td><img src='./db_pro_img/<?php echo $product_image; ?>' class='product_img'/></td>
			<td><?php echo $product_price; ?></td>
			<td><?php 
				$get_count="select * from pending_orders where product_id=$product_id";
				$result_count=mysqli_query($conn,$get_count);
				$row_count=mysqli_num_rows($result_count);
				echo "$row_count";
			?></td>
			<td><?php echo $status; ?></td>
			<td><a href='admin.php?edit_products=<?php echo $product_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
			<td><a href='admin.php?delete_product=<?php echo $product_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
		</tr>
		
		<?php
		$number++;
	}
	?>
	</tbody>
</table>