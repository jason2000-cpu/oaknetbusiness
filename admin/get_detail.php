<?php
// Include the necessary files and start the session if needed
include "../includes/header.php";
include "../../config/config.php";
include "../../libs/App.php";

$app = new App();

// Get the item ID from the POST request
$itemId = $_POST['itemId'];

// Fetch data for the selected item from the database
$query = "SELECT * FROM category WHERE cat_id = '{$itemId}'";
$category = $app->select_one($query);

// Return the category data as JSON
echo json_encode($category);
?>