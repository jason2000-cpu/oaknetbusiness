<?php
include "./google-api/vendor/autoload.php";
session_start();
?>
<?php
$client=new Google_Client();
$client->setClientId("123502806053-sv13pcarjsrpmi1jl6iesiv2uemtinmq.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setApplicationName("login");
$client->setRedirectUri('http://localhost/login/controler.php');
// scope to specify what you want from the user
$client->addScope('https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email');
$login_url=$client->createAuthUrl();
// set up the connection
$connection=mysqli_connect("localhost","root" ,"" ,"google_login");
if(!$connection){
    echo "no connection";
}
?>