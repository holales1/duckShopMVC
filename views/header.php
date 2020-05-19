<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Header</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  
</head>
<body>
	<header id="main-header">
		<div id="logo-header" href="#">
			<h6 class="site-name">THEDuckShop</h6>
			
		</div> <!-- / #logo-header -->
		<nav>
			<ul>
				<li><a href="<?php echo constant('URL')?>main">Home</a></li>
				<li><a href="<?php echo constant('URL')?>aboutUs">About Us</a></li>
				<li><a href="<?php echo constant('URL')?>contact">Contact</a></li>
				<li><a href="<?php echo constant('URL')?>news">News</a></li>
				<li><a href="<?php echo constant('URL')?>login" class="material-icons shopCar">account_circle</a></li>
				<li><a href="<?php echo constant('URL')?>shopCar" class="material-icons shopCar" >shopping_cart</a></li>
				<?php
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){
                ?>
				<li><a href="<?php echo constant('URL')?>order" class="material-icons shopCar" >description</a></li>
				<?php
                }
                ?>
			</ul>
		</nav><!-- / nav -->
	</header><!-- / #main-header -->

</body>
</html>