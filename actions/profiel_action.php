<?php
session_start();
require '../includes/dbconnection.php';
require "../class/user.php";

$valid = true;
$pass_valid = false;

if(isset($_POST["person"])) {
	echo "person";
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$insertion = $_POST["insertion"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$phone_number = $_POST["phone-number"];
	$city = $_POST["city"];
	$zip = $_POST["zip"];
	$street_name = $_POST["street-name"];
	$house_number = $_POST["house-number"];
	$birth_date = $_POST["birth"];
	$gender = $_POST["gender"];
	$iban = $_POST["iban"];
	
	if(strtotime($birth_date) > strtotime('now') ) {
		$valid = false;
	}

	if($valid) {
		$sql = "UPDATE users SET 
		voornaam = '$firstname', 
		tussenvoegsel = '$insertion', 
		achternaam = '$lastname', 
		email = '$email', 
		telefoonnummer = '$phone_number',
		woonplaats = '$city',
		postcode = '$zip',
		straatnaam = '$street_name',
		huisnummer = '$house_number',	
		geboorteDatum = '$birth_date',
		geslacht = '$gender', 
		IBAN = '$iban' 
		WHERE id = $id";
		
		if (!mysqli_query($conn, $sql))
		{
			echo("Error description: " . mysqli_error($conn));
			$_SESSION["error"] = "<span class= 'error'>Er is iets fout gegaan</span>";
			header("location: ../views/profiel.php");
		}
		else {
			$result = mysqli_query($conn, $sql);
			$_SESSION["error"] = "<span class = 'succes'>Succesvol opgeslagen</span>";
			header("location: ../views/profiel.php");
		}
	}
	else {
		$_SESSION["error"] = "<span class = 'error'>Gegevens kloppen niet</span>";
		header("location: ../views/profiel.php");
	}

}


if(isset($_POST["pass"])) {
	echo "pass";
	$id = $_POST["id"];
	$old_password = $_POST["old-password"];
	$new_password = $_POST["new-password"];
	$repeat_new_password = $_POST["repeat-new-password"];
	
	$sql1 = "SELECT wachtwoord FROM users WHERE id = '$id'";
	$result = mysqli_query($conn, $sql1);
	$val = mysqli_fetch_object($result);
	echo("Error description: " . mysqli_error($conn));
	echo $val->wachtwoord;
	if($new_password != $old_password and $new_password == $repeat_new_password and $old_password == $val->wachtwoord) {
		$pass_valid = true;
	}

	if($pass_valid) {
		$sql = "UPDATE users SET wachtwoord = '$new_password' WHERE id = '$id'";
		
		if (!mysqli_query($conn, $sql))
		{
			echo("Error description: " . mysqli_error($conn));
			$_SESSION["error"] = "<span class= 'error'>Er is iets fout gegaan</span>";
			header("location: ../views/profiel.php");
		}
		else {
			$result = mysqli_query($conn, $sql);
			$_SESSION["error"] = "<span class = 'succes'>Succesvol opgeslagen</span>";
			header("location: ../views/profiel.php");
		}
	}
	else {
		$_SESSION["error"] = "<span class = 'error'>Gegevens kloppen niet</span>";
		header("location: ../views/profiel.php");
	}
}
?>