<?php include "../config/config.php"; ?>
<?php include "../libs/App.php"; ?>

<?php include "../includes/header.php" ?>
<?php
session_start();

// Retrieve the package data from the POST request
$amount = $_POST['amount'];
// start  the session
$_SESSION['deposit']=$amount;


?>