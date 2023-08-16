<!-- include the app and config -->
<?php include "./includes/header.php"; ?>
<?php include "../../config/config.php" ?>
<?php include "../../libs/App.php" ?>
<?php
extract($_POST);
if(isset($_POST['categoryAdd'])){
     $category = $_POST['categoryAdd'];
     $app=new App;
     $query="INSERT INTO category(cat_title)VALUES(:category)";
     $arr=[
         ":category"=>$category,    
     ];
     
     $app->insertWithoutPath($query,$arr);
 
}


?>