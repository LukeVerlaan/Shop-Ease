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
<script type="text/javascript" src="../includes/scripts/mainScript.js"></script>
<hr />
<!-- toevoegen van het menu -->
<?php require "../includes/nav.php"; ?>
Welkom <?php $user->getFirstname(); ?>
<script>getUserById(1); </script>
<!-- winkel scannen -->
<div class="scan_shop_box">
	<i class="fa fa-search fa-5x"></i>
	<input type="text" id="shop_code" name="shop_code" placeholder="Scan Winkelcode">
	<div>
		<button onclick="searchShop()" class='submit_button' type="submit" name="pass">
			Bevestigen
		</button>
	</div>
</div>

<img class="shop_img">
