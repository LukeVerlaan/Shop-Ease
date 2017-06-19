<?php
session_start();
require '../includes/dbconnection.php';
require '../class/user.php';

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "select * from users where email = '$email' and wachtwoord = '$password'";
$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);

if($count == 1) {
	$row = mysqli_fetch_assoc($result);
	$_SESSION["user"] = $row['id'];
	$user = new User($row['id'], 
					$row['voornaam'], 
					$row['tussenvoegsel'], 
					$row['achternaam'], 
					$row['email'], 
					$row['wachtwoord'], 
					$row['telefoonnummer'], 
					$row['woonplaats'], 
					$row['postcode'], 
					$row['straatnaam'], 
					$row['huisnummer'], 
					$row['geboorteDatum'], 
					$row['geslacht'], 
					$row['IBAN']);
	var_dump($user);
	$_SESSION["u"] = serialize($user);
	
	$sql1 = "SELECT id FROM winkelmandje WHERE userid = '".$user->id."' ORDER BY id DESC LIMIT 1";
	//echo $sql1;
	$result1 = mysqli_query($conn, $sql1);
	$row = mysqli_fetch_assoc($result1);
	$_SESSION["cartid"] = $row['id'];
	header("location: ../views/main.php");

} else {
	$_SESSION["error"] = "<span class='error'>Login mislukt</span>";
	header("location: ../views/login.php");
}
?>