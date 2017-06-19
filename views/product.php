<?php
	session_start();
	require "../includes/header.php";
	require "../class/user.php";
	require "../class/product.php";
	require "../class/shop.php";
	
	//user object
	$user = new User(null,null,null,null,null,null,null,null,null,null,null,null,null,null);
	if($_SESSION['u'] == null) {
		header("location: ../views/login.php");
	} else {
		$user = unserialize($_SESSION['u']);
	}
	
	//product object
	$product = new Product(null,null,null,null,null,null,null);
	if($_SESSION['p'] == null) {
		
	} else {
		$product = unserialize($_SESSION['p']);
	}
	
	$shop = new Shop(null,null,null,null,null);
	
?>
<script type="text/javascript" src="../includes/scripts/productScript.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<hr />
<!-- toevoegen van het menu -->
<?php require "../includes/nav.php"; ?>

<div class='product_box'>
	<h2 class='product_name'><?php $product->getName(); ?></h2>
	
	<!--<img class="product_img" src="../img/product_img/p<?php $product->getId(); ?>.jpg">-->
	
	<!--<div class="slide_container">
		<img class="mySlides" src="../img/product_img/p1.jpg">
		<img class="mySlides" src="../img/product_img/p2.jpg">
		<button class="button_left" onclick="plusDivs(-1)">&#10094;</button>
		<button class="button_right" onclick="plusDivs(1)">&#10095;</button>
	</div>-->
	
	<div class='product_div'>
		<p class='price_tag'>&euro;<?php $product->getPrice(); ?></p>
	</div>
	
	<img class="productshop_img" src="../img/shop_img/s<?php $product->getShop(); ?>.jpg">
	
	<p class='product_description'><?php $product->getDescription(); ?>

	<div class='button_box'>
		<button class='cancel_button' type="submit">
			Terug
		</button>
		<button class='submit_button' type="submit">
			Toevoegen aan winkelmand
		</button>
	</div>
</div>