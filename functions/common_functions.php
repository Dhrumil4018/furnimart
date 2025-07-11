<?php

	//including connection file
	
	//include('./connect.php');
	
	//fetching products
	function getproducts(){
		global $conn;
		
		// checking isset or not
		if(!isset($_GET['category']))
		{
		$select_query="select * from products order by rand() LIMIT 0,6";
		$result=mysqli_query($conn,$select_query);
		while($row=mysqli_fetch_assoc($result)){
			$product_id=$row['product_id'];
			$product_title=$row['product_title'];
			$product_description=$row['product_description'];
			$product_image=$row['product_image'];
			$product_price=$row['product_price'];
			$category_id=$row['category_id'];
			echo "<div class='col-md-4 mb-2'>
				<form action='' method='post'>
					<div class='card'>
					<img src='./admin_area/db_pro_img/$product_image' class='card-img-top' alt='$product_title'>
					<div class='card-body'>
					<h5 class='card-title text-capitalize'>$product_title</h5>
					<p class='card-text'>Price: $product_price/-</p>
					<a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
					<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
					</div>
				</div></form>
			</div>";
		}
		}
	}
	
	//GETTING ALL PRODUCTS
	function get_all_products(){
		global $conn;
		
		// checking isset or not
		if(!isset($_GET['category']))
		{
		$select_query="select * from products";
		$result=mysqli_query($conn,$select_query);
		while($row=mysqli_fetch_assoc($result)){
			$product_id=$row['product_id'];
			$product_title=$row['product_title'];
			$product_description=$row['product_description'];
			$product_image=$row['product_image'];
			$product_price=$row['product_price'];
			$category_id=$row['category_id'];
			echo "<div class='col-md-4 mb-2'>
					<div class='card'>
					<img src='./admin_area/db_pro_img/$product_image' class='card-img-top' alt='$product_title'>
					<div class='card-body'>
					<h5 class='card-title text-capitalize'>$product_title</h5>
					<p class='card-text'>Price: $product_price/-</p>
					<a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
					<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
					</div>
				</div>
			</div>";
		}
		}
	}
	
	
	//getting unique categories
	function get_uni_categories(){
		global $conn;
		
		// checking isset or not
		if(isset($_GET['category']))
		{
			$category_id=$_GET['category'];
		$select_query="select * from products where category_id=$category_id";
		$result=mysqli_query($conn,$select_query);
		$num_of_rows=mysqli_num_rows($result);
		if($num_of_rows==0){
			echo "<h4 class='text-center text-danger'>We are sorry , No stock available for this category</h4>";
		}
		while($row=mysqli_fetch_assoc($result)){
			$product_id=$row['product_id'];
			$product_title=$row['product_title'];
			$product_description=$row['product_description'];
			$product_image=$row['product_image'];
			$product_price=$row['product_price'];
			$category_id=$row['category_id'];
			echo "<div class='col-md-4 mb-2'>
					<div class='card'>
					<img src='./admin_area/db_pro_img/$product_image' class='card-img-top' alt='$product_title'>
					<div class='card-body'>
					<h5 class='card-title text-capitalize'>$product_title</h5>
					<p class='card-text'>Price: $product_price/-</p>
					<a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
					<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
					</div>
				</div>
			</div>";
		}
		}
	}
	
	
	function getcategories(){
		global $conn;
		$select_category="select * from `categories` ";
				$result_category=mysqli_query($conn,$select_category);
				while($row_data=mysqli_fetch_assoc($result_category))
				{
					$cat_id=$row_data['category_id'];
					$cat_title=$row_data['category_title'];
					echo "<li class='nav-item'>
						 <a class='nav-link' href='index.php?category=$cat_id'>$cat_title</a>
						 </li>";
				}
	}
	
	//seaching products
	function search_product(){
		global $conn;
		
		if(isset($_GET['search_data_product'])){
		$search_data_value=$_GET['search_data'];
		$search_query="select * from products where product_keywords like '%$search_data_value%'";
		$result=mysqli_query($conn,$search_query);
		$num_of_rows=mysqli_num_rows($result);
		if($num_of_rows==0){
			echo "<h4 class='text-center text-danger'>No result match..No product found!</h4>";
		}
		while($row=mysqli_fetch_assoc($result)){
			$product_id=$row['product_id'];
			$product_title=$row['product_title'];
			$product_description=$row['product_description'];
			$product_image=$row['product_image'];
			$product_price=$row['product_price'];
			$category_id=$row['category_id'];
			echo "<div class='col-md-4 mb-2'>
					<div class='card'>
					<img src='./admin_area/db_pro_img/$product_image' class='card-img-top' alt='$product_title'>
					<div class='card-body'>
					<h5 class='card-title text-capitalize'>$product_title</h5>
					<p class='card-text'>Price: $product_price/-</p>
					<a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
					<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
					</div>
				</div>
			</div>";
		}
		}
	}
	
	//view details
	function view_details(){
		global $conn;
		
	if(isset($_GET['product_id'])){
		if(!isset($_GET['category']))
		{
			$product_id=$_GET['product_id'];
		$select_query="select * from products where product_id=$product_id";
		$result=mysqli_query($conn,$select_query);
		while($row=mysqli_fetch_assoc($result)){
			$product_id=$row['product_id'];
			$product_title=$row['product_title'];
			$product_description=$row['product_description'];
			$product_image1=$row['product_image'];
			$product_image2=$row['product_image2'];
			$product_image3=$row['product_image3'];
			$product_price=$row['product_price'];
			$category_id=$row['category_id'];
			echo "<div class='col-md-4'>
				<div class='card'>
					<img src='./admin_area/db_pro_img/$product_image1' class='card-img-top' alt='$product_title'>
					<div class='card-body'>
					<h5 class='card-title text-capitalize'>$product_title</h5>
					<p class='card-text'>Price: $product_price/-</p>
					<a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
					<a href='display_all.php' class='btn btn-secondary'>Back</a>
					</div>
				</div>
			</div>
			
			<div class='col-md-8'>
			
				<div class='row'>
					<div class='col-md-12 mb-4'>
						<h4 class='text-center text-muted text-uppercase'> related photos </h4>
					</div>
					<div class='col-md-6'>
					<img src='./admin_area/db_pro_img/$product_image2' class='card-img-top' alt='$product_title'>
					</div>
					<div class='col-md-6'>
					<img src='./admin_area/db_pro_img/$product_image3' class='card-img-top' alt='$product_title'>
					</div>
					<div class='col-md-12'>
						<h5 class='  text-lowercase mt-4 text-capitalize text-dark'> $product_description </h5>
					</div>
				</div>
			</div>";
		}
		}
		}
	}
	
	// get ip address function
	 function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
	//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
	}  
	//$ip = getIPAddress();  
	//echo 'User Real IP Address - '.$ip;  
	
	
	//CART FUNCTION
	
	function cart(){
		if(isset($_GET['add_to_cart'])){
			global $conn;
			$ip = getIPAddress();
			$username = "";
			if(isset($_SESSION['username']))
				{
	$username = $_SESSION['username'];}
			$get_pro_id=$_GET['add_to_cart'];
			$select_query="select * from cart_details where username='$username' and product_id=$get_pro_id";
			$result_query=mysqli_query($conn,$select_query);
			$num_of_rows=mysqli_num_rows($result_query);
			if($num_of_rows>0){
			echo "<script>alert('This item is already in cart')</script>";
			echo "<script>window.open('index.php','_self')</script>";
			}
			else{
				$select_query="select * from products where product_id=$get_pro_id";
				$result_select=mysqli_query($conn,$select_query);
				$row=mysqli_fetch_array($result_select);
				$item_price=$row['product_price'];
				$insert_query="insert into `cart_details` (product_id,ip_address,quantity,username) values ($get_pro_id,'$ip',1,'$username')";
				$result_query=mysqli_query($conn,$insert_query);
				echo "<script>alert('This item is added to cart')</script>";
				echo "<script>window.open('index.php','_self')</script>";
			}
		}
	}
	
	//	FUNCTION TO GET CART ITEM NUMBERS
	function cart_item(){
		if(isset($_GET['add_to_cart'])){
			global $conn;
			$ip = getIPAddress();
			$select_query="select * from cart_details where ip_address='$ip'";
			$result_query=mysqli_query($conn,$select_query);
			$count_cart_items=mysqli_num_rows($result_query);
		}
		else{
				global $conn;
			$ip = getIPAddress();
			$select_query="select * from cart_details where ip_address='$ip'";
			$result_query=mysqli_query($conn,$select_query);
			$count_cart_items=mysqli_num_rows($result_query);
			}
		echo $count_cart_items;
	}
	
	//total price function
	function total_cart_price(){
		global $conn;
		$total=0;
		$ip = getIPAddress();
		$cart_query="select * from cart_details where ip_address='$ip'";
		$result=mysqli_query($conn,$cart_query);
		while($row=mysqli_fetch_array($result)){
			$product_id=$row['product_id'];
			$select_query="select * from products where product_id=$product_id";
			$result_pro=mysqli_query($conn,$select_query);
			while($row_pro_price=mysqli_fetch_array($result_pro)){
				$pro_price=array($row_pro_price['product_price']);
				$pro_value=array_sum($pro_price);
				$total+=$pro_value;
			}
		}
		echo $total;
	}
	
	
	//get user orders details
	function get_user_order_details(){
		global $conn;
		$username=$_SESSION['username'];
		$get_details="select * from user_table where username='$username'";
		$result=mysqli_query($conn,$get_details);
		while($row=mysqli_fetch_array($result)){
			$user_id=$row['user_id'];
			if(!isset($_GET['my_orders'])){
				if(!isset($_GET['edit_account'])){
					if(!isset($_GET['delete_account'])){
						$get_orders="select * from user_orders where user_id=$user_id and order_status='pending'";
						$result_orders=mysqli_query($conn,$get_orders);
						$row_count=mysqli_num_rows($result_orders);
						if($row_count>0){
							echo "<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-dange'>$row_count</span> pending orders</h3>
							<p class='text-center'><a href='profile.php?my_orders'>Order Details</a></p>";
						}else
						{
							echo "<h3 class='text-center text-success mt-5 mb-3'>You have zero pending orders</h3>
							<p class='text-center'><a href='../index.php'>Explore  Products</a></p>";
						}
					}
				}
			}
		}
	}
	
	
	function getUserEmail() {
    global $conn; // Assuming $conn is your database connection

    // Start or resume the session
    @session_start();

    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $select_query = "SELECT user_email FROM user_table WHERE username = '$username'";
        $result = mysqli_query($conn, $select_query);
		echo $result;
        if($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['user_email'];
        }
    }

    return null; // Handle the case when the user is not logged in or email is not found
}

?>