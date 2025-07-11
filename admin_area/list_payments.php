<h3 class="text-center text-uppercase">All Payments</h3>
<table class="table table-hover text-center mt-4">
	<thead>
	<?php 
		$get_payment="select * from user_payments";
		$result=mysqli_query($conn,$get_payment);
		$row_count=mysqli_num_rows($result);
		
			
			if($row_count==0){
				echo "<h3 class='text-danger text-center mt-4'>No payment received yet</h3>";
			}else{
				echo "<tr>
			<th>Slno</th>
			<th>Amount</th>
			<th>Invoice Number</th>
			<th>payment_mode</th>
			<th>Order date</th>
			<th>Delete</th>
			</tr>
			</thead>
			<tbody>";
				$number=0;
				while($row_data=mysqli_fetch_assoc($result)){
					$order_id=$row_data['order_id'];
					$payment_id=$row_data['payment_id'];
					$amount=$row_data['amount'];
					$invoice_number=$row_data['invoice_number'];
					$payment_mode=$row_data['payment_mode'];
					$order_date=$row_data['date'];
					$number++ ;
					echo "<tr>
							<td>$number</td>
							<td>$amount</td>
							<td>$invoice_number</td>
							<td>$payment_mode</td>
							<td>$order_date</td>
							<td><a href='admin.php?delete_payment=$payment_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
						</tr>";
				}
			}
	?>
		
	
		
	</tbody>
</table>