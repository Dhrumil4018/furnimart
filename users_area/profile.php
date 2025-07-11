<?php
	include('../connect.php');
	include('../functions/common_functions.php');
	session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
	<link href="style.css" rel="stylesheet">
	<!--bootstrap css file-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<style>
	body{
		overflow-x:hidden;
	}
	.name{
		color:#8b008b;
		}
	</style>
	<!--font awsome file-->
	<link rel="stylesheet" href="../font/css/all.min.css" type="text/css" />
  </head>
  <body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-info p-0">
  <div class="container-fluid" >
    <a class="navbar-brand" href="../index.php"><h2 class="name"><strong>Furni</strong><span><em>Mart</em></span></h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        --></li>
                <li class="nav-item">
          <a class="nav-link" href="../about_us.php">Contact us</a>
        </li>
		<li><a href="profile.php" class="nav-link " aria-current="page">My Account</a></li>
		<a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
	<!--	<li class="nav-item">
          <a class="nav-link" href="#">Total price:- <?php total_cart_price(); ?></a>
        </li>-->
      </ul>
	  <!--<ul class="nav navbar-nav navbar-right">
        <li><a href="#" class="nav-link active" aria-current="page">Login</a></li>
      </ul>-->
	  <!--<form class="d-flex" role="search" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input class="btn btn-outline-light" type="submit" value="Search" name="search_data_product"></input>
      </form>-->
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
		
			if(!isset($_SESSION['username'])){
				echo "<li class='nav-item'>
						<a class='nav-link' href='./users_area/user_login.php'>Log In</a>
					</li>";
			}else{
				echo "<li class='nav-item'>
						<a class='nav-link' href='logout.php'>Log Out</a>
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

<!-- fourth child -->
<div class="row">
	<div class="col-md-2 mb-3">
		<ul class="navbar-nav p-0 bg-secondary text-center" style="height:70vh">
			<li class="nav-item">
				<a class="nav-link bg-info text-light" href="#">YOUR PROFILE</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-light m-2" href="profile.php">Pending orders</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-light m-2" href="profile.php?my_orders">My orders</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-light m-2" href="profile.php?edit_account">Edit account</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-light m-2" href="profile.php?delete_account">Delete account</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-light m-2" href="logout.php">Logout</a>
			</li>
		</ul>
	</div>
	<div class="col-md-10">
		<?php
			//calling function for pending orders
			get_user_order_details();
			
			if(isset($_GET['edit_account'])){
				include('edit_account.php');
			}
			
			if(isset($_GET['my_orders'])){
				include('user_orders.php');
			}
			
			if(isset($_GET['delete_account'])){
				include('delete_account.php');
			}
		?>
	</div>
</div>

<!--footer-->
<?php include('../footer.php') ?>
	
	<!--bootstrap js file-->
    <script src="../js/bootstrap.bundle.min.js" type="text/javascript"></script>
  </body>
</html>