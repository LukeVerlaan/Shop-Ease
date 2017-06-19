<?php
session_start();
require '../includes/dbconnection.php';
require '../class/user.php';

$email = $_POST["email"];
$password = $_POST["password"];
$repeat_password = $_POST["repeat-password"];
$valid = true;

//check voor valid email
if(strlen($email) < 3) {
	$valid = false;
}

//check wachtwoord voor registratie
if($password != $repeat_password) {
	$valid = false;
}
if(strlen($password) < 1) {
	$valid = false;
}
if($valid) {
	$sql = "INSERT INTO users (email, wachtwoord) VALUES ('$email', '$password')";
	$result = mysqli_query($conn, $sql);
	$_SESSION["error"] = "<span class='succes'>Succesvol geregistreerd</span>";
	echo("Error description: " . mysqli_error($conn));
	header("location: ../views/login.php");
}
else {
	$_SESSION["error"] = "<span class='error'>registratie is niet gelukt</span>";
	header("location: ../views/register.php");
}
?>	