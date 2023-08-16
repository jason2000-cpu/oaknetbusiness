<?php include "../config/config.php" ?>
<?php include "../libs/App.php" ?>
<!-- include the app and config -->
<?php include "../includes/header.php"; ?>
<?php session_start(); ?>


<?php
if(isset($_POST['mobileAdd'])){

    $userId=$_POST['updateId'];
    $firstname=$_POST['firstnameAdd'];
    $lastname=$_POST['lastnameAdd'];
    $email=$_POST['emailAdd'];


    $password=password_hash($_POST['passwordAdd'],PASSWORD_DEFAULT);
   


    $mobile=$_POST['mobileAdd'];
    $residence=$_POST['residenceAdd'];
    $country=$_POST['countryAdd'];
    
    $image = $_FILES['imageAdd']['name'];
    $image_temp = $_FILES['imageAdd']['tmp_name'];
    // move the picture to a temporary location
    
// To move the image to the server location from the temporary location
   move_uploaded_file($image_temp, "../assets/images/$image");
    
    $app=new App;

    
        $query="UPDATE  users SET user_firstname=:firstname,user_lastname=:lastname,user_email=:email,password=:password, user_country = :country, user_residence=:residence,user_profile=:image,user_phone=:mobile WHERE user_id = :id";
        $arr=[
           ":firstname"=>$firstname,
           ":lastname"=>$lastname,
           ":email"=>$email,
           ":password"=>$password,
           ":country"=>$country,
           ":residence"=>$residence,
           ":mobile"=>$mobile,
           ":id"=>$userId,
           ":image"=>$image
          ];
         //  if succesiful
         
          $app->updateToken($query,$arr);
        
        }


?>