<!-- include the app and config -->
<?php include "../includes/header.php"; ?>
<?php include "../../config/config.php" ?>
<?php include "../../libs/App.php" ?>
<?php
if(isset($_POST['deletesend'])){
     $deleteId = $_POST['deletesend'];
     $app=new App;
     $query="DELETE FROM users WHERE user_id='{$deleteId}'";
     $app->delete_without_path($query);
 
}


?>