<!-- include the app and config -->
<?php include "../includes/header.php"; ?>
<?php include "../../config/config.php" ?>
<?php include "../../libs/App.php" ?>

<?php
if(isset($_POST['userid'])){
    $userid=$_POST['userid'];
    $type=$_POST['state'];
    $app=new App;

    if($type =='allowed'){
        $forbiden="forbidden";
        $query="UPDATE  users SET user_state = :new WHERE user_id = :id";
        $arr=[
           ":new"=>$forbiden,
           ":id"=>$userid,   
          ];
         //  if succesiful
         
          $app->updateToken($query,$arr);

    }else{
        $allowed="allowed";
        $query="UPDATE  users SET user_state = :new WHERE user_id = :id";
        $arr=[
           ":new"=>$allowed,
           ":id"=>$userid,   
          ];
         //  if succesiful
         $path="http://localhost/trade/admin//users.php";
         
          $app->update($query,$arr,$path);

    }
}



?>