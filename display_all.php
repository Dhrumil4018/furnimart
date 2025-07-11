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
    <title>Furniture store</title>
	<link href="style.css" rel="stylesheet">
	<!-- bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--font awsome file-->
	<link rel="stylesheet" href="font/css/all.min.css" type="text/css">
	<style>
	body{
		overflow-x:hidden;
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
        </li>-->
        <li class="nav-item">
          <a class="nav-link" href="about_us.php">Contact us</a>
        </li>
		<?php 
		if(isset($_SESSION['username'])){
			echo  "<li><a href='users_area/profile.php' class='nav-link' aria-current='page'>My account</a></li>";
		}else{
			echo "<li><a href='users_area/user_registration.php' class='nav-link' aria-current='page'>Register</a></li>";
		}
		?>
		<a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
		<!--<li class="nav-item">
          <a class="nav-link" href="#">Total price:- <?php total_cart_price(); ?></a>
        </li>-->
      </ul>
	  <!--<ul class="nav navbar-nav navbar-right">
        <li><a href="#" class="nav-link active" aria-current="page">Login</a></li>
		
      </ul>-->
	  <form class="d-flex" role="search" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input class="btn btn-outline-light" type="submit" value="Search" name="search_data_product"></input>
      </form>
    </div>
  </div>
</nav>
</div>

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

<!--Fourth section-->
<div class="row px-1 pb-2">
	<div class="col-md-2 bg-secondary p-0 text-center text-light">
		<!--sidenav-->
		<ul class="navbar-nav me-auto">
			<li class="nav-item bg-info">
				<a class="nav-link" href="#"><h4>Categories</h4></a>
			</li>
			<?php
				getcategories();
			?>
		</ul>
	</div>
	<div class="col-md-10">
		<!--products-->
		<div class="row">
		<!--fatching products-->
		<?php
		//calling fuction
		if(!isset($_GET['search_data_product'])){
		get_all_products();
		}
		else{
			search_product();
		}
		get_uni_categories();
		?>
			<!--row end-->
		</div>
		<!--column end-->
	</div>
</div>


<!--footer-->
<?php include('footer.php') ?>
	
	<!--bootstrap js file-->
    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
  </body>
</html>