<html>
	<body>
	<?php 
		$username=$_SESSION['username'];
		$get_user="select * from user_table where username='$username'";
		$result=mysqli_query($conn,$get_user);
		$row_fetch=mysqli_fetch_assoc($result);
		$user_id=$row_fetch['user_id'];
	?>
	<h2 class="text-success text-center mt-2">All my orders</h2>
	<table class="table table-bordered mt-5 text-center">
		<thead class="bg-info">
			<tr>
				<th>SL no</th>
				<th>Amount due</th>
				<th>Total products</th>
				<th>Invoice number</th>
				<th>Date</th>
				<th>Complete/Incomplete</th>
				<th>Status</th>
				<th>Download Invoice</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$get_order_details="select * from user_orders where user_id=$user_id";
			$result_orders=mysqli_query($conn,$get_order_details);
			$number=1;
			while($row_order=mysqli_fetch_assoc($result_orders)){
				$order_id=$row_order['order_id'];
				$amount_due=$row_order['amount_due'];
				$total_products=$row_order['total_products'];
				$invoice_number=$row_order['invoice_number'];
				$order_status=$row_order['order_status'];
				if($order_status=='pending'){
					$order_status='Incomplete';
				}else{
					$order_status='Complete';
				}
				$order_date=$row_order['order_date'];
				echo " <tr>
							<td>$number</td>
							<td>$amount_due</td>
							<td>$total_products</td>
							<td>$invoice_number</td>
							<td>$order_date</td>
							<td>$order_status</td>";
							?>
							
							<?php
							if($order_status=='Complete'){
								echo "<td>Paid</td>";
								echo "<td><a href='invoice2.php?invoice_number=$invoice_number'>Click Here</a></td>";
							}else{
								echo "<td><a href='confirm_payment.php?order_id=$order_id'>confirm</a></td>";
								echo "<td>Plz Confirm the patment</td>
						</tr>";
						}
				$number++;
			}
			?>
			
		</tbody>
	</table>
	</body>
</html>