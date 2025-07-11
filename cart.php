<?php
	include('connect.php');
	include('functions/common_functions.php');
	session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Furniture store-Cart details</title>
	<link href="style.css" rel="stylesheet">
	<!--bootstrap css file-->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--font awsome file-->
	<link rel="stylesheet" href="font/css/all.min.css" type="text/css">
	
	<style>
	.cart_img{
			width:80px;
			height:80px;
			object-fit:contain;
		}
	.name{
		color:#8b008b;
	}
	</style>
  </head>
  <body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-info p-0">
  <div class="container-fluid" >
    <a class="navbar-brand" href="index.php"><h2 class="name"><strong>Furni</strong><span><em>Mart</em></span></h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        --></li>
                <li class="nav-item">
          <a class="nav-link" href="about_us.php">Contact us</a>
        </li>
		<li><a href="users_area/user_registration.php" class="nav-link " aria-current="page">Register</a></li>
		<a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
      </ul>
    </div>
  </div>
</nav>
</div>

<!--calling cart function-->
<?php
	cart();
?>

<!--second navbar-->
<nav class="navbar navbar-expand-lg bg-secondary">
	<ul class="navbar-nav me-auto">
		<?php 
			if(!isset($_SESSION['username'])){
				echo "<li class='nav-item'>
						<a class='nav-link text-light' href='#'>Welcome Guest</a>
					  </li>";
			}else{
				echo "<li class='nav-item'>
						<a class='nav-link text-light text-capitalize' href='#'>Welcome ".$_SESSION['username']."</a>
					  </li>";
			}
		?>
		<?php 
			if(!isset($_SESSION['username'])){
				echo "<li class='nav-item'>
						<a class='nav-link' href='./users_area/user_login.php'>Log In</a>
					</li>";
			}else{
				echo "<li class='nav-item'>
						<a class='nav-link' href='./users_area/logout.php'>Log Out</a>
					</li>";
			}
		?>
	</ul>
</nav>

<!--third section-->
<div class="bg-light">
	<h3 class="text-center">Furniture Store</h3>
	<p class="text-center">Here you can buy any kind of furniture product</p>
</div>

<!-- Fourth child-table -->
<div class="container">
  <div class="row">
    <form method="post" action="">
      <table class="table table-bordered text-center">
        <!-- php code for displaying dynamic data-->
        <?php
        
        global $conn;
		$gt = 0;
        $total = 0;
        $tprice = 0;
        $ip = getIPAddress();
        $cart_query = "select * from cart_details where ip_address='$ip'";
        $result = mysqli_query($conn, $cart_query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
          echo "<thead>
            <tr>
              <th>Product Title</th>
              <th>Product Image</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total Price</th>
              <th>Remove</th>
              <th colspan='2'>Operations</th>
            </tr>
          </thead>
          <tbody>";
          while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $old_qty = $row['quantity'];
            $select_query = "select * from products where product_id=$product_id";
            $result_pro = mysqli_query($conn, $select_query);
            while ($row_pro_price = mysqli_fetch_array($result_pro)) {
              $pro_price = array($row_pro_price['product_price']);
              $price = $row_pro_price['product_price'];
              $product_title = $row_pro_price['product_title'];
              $product_img = $row_pro_price['product_image'];
              $pro_value = array_sum($pro_price);
              $total += $pro_value;
              $tprice = $price * $old_qty;
              $gt += $tprice;
              ?>
              <tr>
                <td><h6><?php echo $product_title ?></h6></td>
                <td><img src="./admin_area/db_pro_img/<?php echo $product_img ?>" alt=".." class="cart_img"></td>
                <td>
                  <input type="number" name="qty[<?php echo $product_id ?>]" min="1" max="10" class="form-input w-50 " value="<?php echo $old_qty ?>">
                </td>
                <?php
                $ip = getIPAddress();
                if (isset($_POST['update_cart'])) {
                  $quantities = $_POST['qty'];	

                  // Loop through the quantities and update the cart
                  foreach ($quantities as $product_id => $quantity) {
                    // Update the cart quantity in your data storage (e.g., session, database, etc.)
                    // Implement your logic here to update the quantity for the given product ID
                    $update_cart = "UPDATE cart_details SET quantity = $quantity WHERE product_id = $product_id";
                    mysqli_query($conn, $update_cart);
                    $tprice = $price * $quantity;
                    $gt +=$tprice;
                  }

                  // Redirect back to the cart page
                  header('Location: cart.php');
                  exit();
                }
                ?>
                <td><?php echo $price ?></td>
                <td><?php echo $tprice ?></td>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                <td>
                  <input type="submit" class="btn btn-info px-3 border-0 p-1 mx-2" value="Update Cart" name="update_cart">
                  <input type="submit" class="btn btn-info px-3 border-0 p-1 mx-2" value="Remove" name="remove_cart">
                </td>
              </tr>
			 
          <?php
            }
          }
        } else {
          echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
        }
        ?>
        </tbody>
      </table>
      <!-- subtotal -->
      <div class="d-flex mb-3">
        <?php
        global $conn;
        $ip = getIPAddress();
        $cart_query = "select * from cart_details where ip_address='$ip'";
        $result = mysqli_query($conn, $cart_query);
        $count = mysqli_num_rows($result);
        if( $count > 0)
		{
			if(isset($_POST['update_cart']))
			{
				echo "<h4 class='px-3'>Grand Total: <strong class='text-info'>$gt</strong></h4>";
			 echo "<input type='submit' class='btn btn-info px-3 border-0 p-1 mx-2' value='Continue Shopping' name='continue_shopping'>
            <button class='btn bg-secondary px-3 border-0 p-1 mx-2 text-light'><a href='./users_area/checkout.php' class='text-light text-decoration-none '>Checkout</a></button>";
			}
			else
			{
            echo "<h4 class='px-3'>Grand Total: <strong class='text-info'>$gt</strong></h4>";
			 echo "<input type='submit' class='btn btn-info px-3 border-0 p-1 mx-2' value='Continue Shopping' name='continue_shopping'>
            <button class='btn bg-secondary px-3 border-0 p-1 mx-2 text-light'><a href='./users_area/checkout.php' class='text-light text-decoration-none '>Checkout</a></button>";}
        } 
		else 
		{
          echo "<input type='submit' class='btn btn-info px-3 border-0 p-1 mx-2' value='Continue Shopping' name='continue_shopping'>";
        }
		
        if (isset($_POST['continue_shopping'])) {
          echo "<script>window.open('index.php','_self')</script>";
        }
        ?>
      </div>
    </div>
  </div>
</form>

<!-- function for remove item -->
<?php
function remove_cart_item()
{
  global $conn;
  if (isset($_POST['remove_cart'])) {
    foreach ($_POST['removeitem'] as $remove_id) {
      echo $remove_id;
      $delete_query = "delete from cart_details where product_id=$remove_id";
      $result = mysqli_query($conn, $delete_query);
      if ($result) {
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item = remove_cart_item();
?>


<!--footer-->
<?php include('footer.php') ?>

<!--bootstrap js file-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
</body>

</html>
