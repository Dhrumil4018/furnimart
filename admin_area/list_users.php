<h3 class="text-center text-uppercase">All Users</h3>
<table class="table table-hover text-center mt-4">
	<thead>
	<?php 
		$get_users="select * from user_table";
		$result=mysqli_query($conn,$get_users);
		$row_count=mysqli_num_rows($result);
		
			
			if($row_count==0){
				echo "<h3 class='text-danger text-center mt-4'>No user found</h3>";
			}else{
				echo "<tr>
			<th>Sl no</th>
			<th>Username</th>
			<th>User Email</th>
			<th>User Address</th>
			<th>User Contact</th>
			<th>Delete</th>
			</tr>
			</thead>
			<tbody>";
				$number=0;
				while($row_data=mysqli_fetch_assoc($result)){
					$user_id=$row_data['user_id'];
					$username=$row_data['username'];
					$user_email=$row_data['user_email'];
					$user_address=$row_data['user_address'];
					$user_mobile=$row_data['user_mobile'];
					$number++ ;
					echo "<tr>
							<td>$number</td>
							<td>$username</td>
							<td>$user_email</td>
							<td>$user_address</td>
							<td>$user_mobile</td>
							<td><a href='admin.php?delete_user=$user_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
						</tr>";
				}
			}
	?>
		
	
		
	</tbody>
</table>