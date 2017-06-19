<?php
session_start();
require '../includes/dbconnection.php';
require '../class/product.php';

$productid = $_POST['product_id_info'];

$sql = "SELECT * FROM producten WHERE id = '$productid'";
$result = mysqli_query($conn, $sql);
echo("Error description: " . mysqli_error($conn));
$count = mysqli_num_rows($result);

if($count == 1) {
	$row = mysqli_fetch_assoc($result);
	$product = new Product($row['id'], 
					$row['code'], 
					$row['naam'], 
					$row['prijs'], 
					$row['beschrijving'], 
					$row['soort'], 
					$row['winkelid']);
	var_dump($product);
	$_SESSION["p"] = serialize($product);	
	header("location: ../views/product.php");

} else {
	$_SESSION["error"] = "<span class='error'>Product niet gevonden</span>";
	header("location: ../views/main.php");
}
?>	