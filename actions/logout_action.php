<?php
session_start();
$_SESSION["u"] = null;
session_destroy();

header("location: ../index.php");
?>