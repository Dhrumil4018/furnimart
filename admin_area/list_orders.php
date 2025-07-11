<h3 class="text-center text-uppercase">All Orders</h3>
<table class="table table-hover text-center mt-4">
	<thead>
	<?php 
		$get_data="select * from user_orders";
		$result=mysqli_query($conn,$get_data);
		$row_count=mysqli_num_rows($result);
		echo "<tr>
			<th>Slno</th>
			<th>Amount</th>
			<th>Invoice Number</th>
			<th>Total Products</th>
			<th>Order Date</th>
			<th>Status</th>
			<th>Delete</th>
			</tr>
			</thead>
			<tbody>";
			
			if($row_count==0){
				echo "<h3 class='text-danger text-center mt-4'>No orders yet</h3>";
			}else{
				$number=0;
				while($row_data=mysqli_fetch_assoc($result)){
					$order_id=$row_data['order_id'];
					$user_id=$row_data['user_id'];
					$amount=$row_data['amount_due'];
					$invoice_number=$row_data['invoice_number'];
					$total_products=$row_data['total_products'];
					$order_date=$row_data['order_date'];
					$order_status=$row_data['order_status'];
					$number++ ;
					echo "<tr>
							<td>$number</td>
							<td>$amount</td>
							<td>$invoice_number</td>
							<td>$total_products</td>
							<td>$order_date</td>
							<td>$order_status</td>
							<td><a href='admin.php?delete_order=$order_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
						</tr>";
				}
			}
	?>
		
	
		
	</tbody>
</table>