<!-- include the app and config -->
<?php include "../includes/header.php"; ?>
<?php include "../../config/config.php" ?>
<?php include "../../libs/App.php" ?>

<?php
if(isset($_POST['userid'])){
    $userid=$_POST['userid'];
    $type=$_POST['type'];
    $app=new App;

    if($type =='admin'){
        $investor="investor";
        $query="UPDATE  users SET user_type = :new WHERE user_id = :id";
        $arr=[
           ":new"=>$investor,
           ":id"=>$userid,   
          ];
         //  if succesiful
         
          $app->updateToken($query,$arr);

    }else{
        $admin="admin";
        $query="UPDATE  users SET user_type = :new WHERE user_id = :id";
        $arr=[
           ":new"=>$admin,
           ":id"=>$userid,   
          ];
         //  if succesiful
         $path="http://localhost/trade/admin//users.php";
         
          $app->update($query,$arr,$path);

    }
}



?>