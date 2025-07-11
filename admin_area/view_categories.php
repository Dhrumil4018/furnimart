<h3 class="text-center text-uppercase">All Categories</h3>
<table class="table table-hover text-center">
	<thead>
		<tr>
			<th>Slno</th>
			<th>Category title</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$select_query="select * from categories";
		$result_query=mysqli_query($conn,$select_query);
		$number=0;
		while($row=mysqli_fetch_assoc($result_query)){
			$category_id=$row['category_id'];
			$category_title=$row['category_title'];
			$number++;
		?>
		<tr>
			<td><?php echo $number; ?></td>
			<td><?php echo $category_title; ?></td>
			<td><a href='admin.php?edit_category=<?php echo $category_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
			<td><a href='admin.php?delete_category=<?php echo $category_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
