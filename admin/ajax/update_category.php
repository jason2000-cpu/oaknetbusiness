<?php
// Include the necessary files and start the session if needed
include "../includes/header.php";
include "../../config/config.php";
include "../../libs/App.php";
?>
<?php 
  
    if(isset($_POST['updatesend'])){
        $updateid=$_POST['updatesend'];
        $newCategory=$_POST['categoryupdate'];

    // Update the category data in the database
     $app=new App;
    $query = "UPDATE category SET cat_title = :title WHERE cat_id = :id";
    $arr = array(
        ':id' => $updateid,
        ':title' => $newCategory,
    );

    
    // Perform the update and redirect
    $app->updateToken($query, $arr);
}
    ?>