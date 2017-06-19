<?php
session_start();
$_SESSION["user"] = "";
$_SESSION["page"] = "";
$_SESSION["error"] = "";
$u = $_SESSION["u"];
require('includes/header.php');

if($u == null) {
header('Location: ../views/login.php');
}
else {
	header('Location: ../views/main.php');
}

?>