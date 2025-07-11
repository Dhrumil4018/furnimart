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
        --></li>
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
						<a class='nav-link' href='./users_area/logout.php'>Log Out</a>
					</li>";
			}
		?>
	</ul>
</nav>

<!--third section-->
<!--<div class="bg-light">
	<h3 class="text-center">Furniture Store</h3>
	<p class="text-center">Here you can buy any kind of furniture product</p>
</div>

<!-- About us-->
<div>
	<h2 class="text-center text-uppercase py-4 font-monospace fw-bold"><u>About us</u></h2>
	<p class="text-center">Here you can buy any kind of furniture product Here you can buy any kind of furniture product</br>Here you can buy any kind of furniture product Here you can buy any kind of furniture product </br>Here you can buy any kind of furniture product Here you can buy any kind of furniture product Here you can buy any kind of furniture product</p>
</div>

<!--CONTACT US-->
<div>
	<h2 class="text-center text-uppercase pt-5 font-monospace fw-bold mt-5"><u>contact us</u></h2>
	<form action="" method="post" class="mt-4">
		<!--name-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="fb_name" class="form-label">Name</label>
				<input type="text" name="fb_name" id="fb_name" class="form-control" placeholder="Enter your name" required="required">
			</div>
			
		<!--email-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="fb_email" class="form-label">Email</label>
				<input type="email" name="fb_email" id="fb_email" class="form-control" placeholder="Enter your email address" required="required">
			</div>
			
		<!--feedback-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="feedback" class="form-label">Feedback</label>
				<textarea name="feedback" id="feedback" class="form-control" placeholder="Write your feedback" rows=5 required="required"></textarea>
			</div>
			
			<div class="form-outline mb-4 w-50 m-auto">
				<input type="submit" class="btn btn-primary text-center" name="submit_fb" value="Submit">
			</div>
	</form>
</div>


<!--footer-->
<?php include('footer.php') ?>
	
	<!--bootstrap js file-->
    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
  </body>
</html>
<?php 
	if(isset($_POST['submit_fb'])){
		
		$fb_name=$_POST['fb_name'];
		$fb_email=$_POST['fb_email'];
		$feedback=$_POST['feedback'];
		
		$insert_query="insert into contact (name,email,feedback) values ('$fb_name','$fb_email','$feedback')";
		$result=mysqli_query($conn,$insert_query);
		if($result){
			echo "<script>alert('Your feedback has been submited')</script>";
			echo "<script>window.open('about_us.php','_self')</script>";
		}
	}
?>