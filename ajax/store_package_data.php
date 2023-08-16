<?php include "../config/config.php"; ?>
<?php include "../libs/App.php"; ?>

<?php include "../includes/header.php" ?>
<?php
session_start();

// Retrieve the package data from the POST request
$packageName = $_POST['packageName'];
$amount = $_POST['amount'];
$period = $_POST['period'];


// Store the package data in the session
$_SESSION['selected_package'] = array(
  'packageName' => $packageName,
  'amount' => $amount,
  'period' => $period,
);
