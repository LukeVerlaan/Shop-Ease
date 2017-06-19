<?php
	session_start();
	require "../includes/header.php";
	require "../class/user.php";
	require "../includes/dbconnection.php";
	
	// Gebruik Object
	$user = new User(null,null,null,null,null,null,null,null,null,null,null,null,null,null);
	if($_SESSION['u'] == null) {
		header("location: ../views/login.php");
	} else {
		$user = unserialize($_SESSION['u']);
	}
	
?>
<script type="text/javascript" src="../includes/scripts/cartScript.js"></script>

<hr />
<!-- toevoegen van het menu -->
<?php require "../includes/nav.php"; ?>
<title>ShopEase Winkelmandje</title>

<h2> Winkelmandje </h2>

 <div class="cart-container">
 <script> </script>
	<div id="cart_table">
		<script>fillCart(<?php echo $user->id; ?>);</script>
		
		
	</div>
	<div class="cart_submit">
	<button class="submit_button">Afrekenen </button>
	</div>
	<?php
		$sql = "SELECT * FROM winkelmandje WHERE userid = '$user->id' ORDER BY id DESC LIMIT 1";
		$result = mysqli_query($conn, $sql);
		
		$count = mysqli_num_rows($result);
		if($count == 1) {
			$cartid = mysqli_fetch_object($result);
			if($cartid->status) {
				echo $cartid->status;
			}
			else {
				echo "false";
			}
			
		}
	?>
 </div>