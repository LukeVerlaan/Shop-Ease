<?php
	session_start();
	echo $_SESSION["error"];
	require "../includes/header.php";
	require "../class/user.php";
	$user = new User(null,null,null,null,null,null,null,null,null,null,null,null,null,null);
	if($_SESSION['u'] == null) {
		header("location: ../views/login.php");
	} else {
		$user = unserialize($_SESSION['u']);
	}
?>
<script type="text/javascript" src="../includes/scripts/scanScript.js"></script>
<!-- include voor qrscanner -->
    <script src="../includes/scanners/qrscanner2/jsqrcode-combined.min.js"></script>
 <script src="../includes/scanners/qrscanner2/html5-qrcode.min.js"></script>
 
<hr />
<!-- toevoegen van het menu -->
<?php require "../includes/nav.php"; ?>

<!-- winkel scan div -->
<div class="scan_shop_box">
	<i class="fa fa-search fa-5x"></i>
	<div id="reader"></div>
	<input type="text" id="shop_code" name="shop_code" placeholder="Scan Winkelcode">
	<div>
		<button onclick="searchShop()" class='submit_button' id="bevestig-winkel">
			Bevestigen
		</button>
	</div>
</div>

<!-- product scan div-->
<div class="add_product_box">
	<i class="fa fa-search fa-5x" id="search_icon"></i>
	<!-- product info -->
	<div id="shop_info">
		<img class="scan_shop_img">
		<span id="shop_name"></span>
	</div>
	
	<input type="text" id="product_code" name="product_code" placeholder="Scan Productcode">
	<!-- knoppen -->
	<div>
		<button onclick="searchProduct()" class='submit_button'>
			Bevestigen
		</button>
		<button onclick="changeShop()" class='cancel_button' id="verander-winkel">
			Andere Winkel
		</button>
	</div>
</div>

<!-- product info / action div -->
<div class="product_info_box">
	<div id="product_info">
		<img class="product_info_img">
		<span id="product_name"></span>
	</div>
	<!-- product toevoegen aan winkelmand knop -->
	<div id="product_add">
		<input type="number" id="product_amount" name="product_amount" placeholder="Aantal">
		<button onclick="addProductToCart(<?php echo $_SESSION['cartid']; ?>)" class='submit_button' name="pass">
			Toevoegen aan winkelmandje
		</button>
	</div>
	<!-- knop naar productpagina -->
	<div id="show_product_form_box">
		<form method="POST" id="show_product_info_form" action="../actions/product_action.php">
			<input id="product_id_info" name="product_id_info" hidden>
			<button class='submit_button' name="pass">
				Product Info
			</button>
		</form>
	</div>
	<!-- cancel knop -->
	<button onclick="changeProduct()" class='cancel_button' id="verander-product">
		cancel
	</button>
</div>
<script>

    $('#reader').html5_qrcode(function (data) {
                // do something when code is read
                console.log(data);
				$("#shop_code").val(data);
				searchShop();

            },
            function (error) {
                //show read errors
            }, function (videoError) {
                //the video stream could be opened
            }
    );</script>