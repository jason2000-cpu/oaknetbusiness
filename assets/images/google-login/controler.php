<?php include './config.php';?>

<?php 
// if not set session
if(!isset($_SESSION['user_token'])){
    header("Location:index.php");
}




if(isset($_GET['code'])){
    $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);
    // / getting the user data
$oAuth=new Google_Service_Oauth2($client);
$userData=$oAuth->userinfo->get();
$userinfo=[
    'email' =>$userData['email'],
    'first_name' =>$userData['givenName'],
    'last_name' =>$userData['familyName'],
    'gender' =>$userData['gender'],
    'full_name' =>$userData['name'],
    'verified_email' =>$userData['verifiedEmail'],
    'picture' =>$userData['picture'],
    'token' =>$userData['id'],
    

];




// checking if user already exists inthe database
$check_if_user_exists="SELECT * FROM users WHERE email='{$userinfo['email']}'";
$result=mysqli_query($connection,$check_if_user_exists);
if(mysqli_num_rows($result)>0){
    // user already exists
    $userData=mysqli_fetch_assoc($result);
    $token=$userData['token'];
}else{
   $insert_user = "INSERT INTO users (email, first_name, last_name, gender, full_name, picture, verified_email, token) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', '{$userinfo['gender']}', '{$userinfo['full_name']}', '{$userinfo['picture']}', '{$userinfo['verified_email']}', '{$userinfo['token']}')";
    $result=mysqli_query($connection,$insert_user);
    if($result){
        $token=$userinfo['token'];
       
    }else{
       
        die("QUERY FAILED");
    }
}
// save the user data in a session
$_SESSION['user_token']=$token;
}else{
    header("Location:inder.php");
    // echo "<a href='".$login_url."'>Google login</a>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>profile</title>
    <link rel="stylesheet" href="boostrap/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="./profile.css">


</head>

<body>
    <div class="container background-primary">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="text-center">Your Profile is:</h1>
                <img class="align-center" src="<?php echo $userinfo['picture'] ?>" width="90px" height="90px" alt="">
            </div>
            <div class="col-lg-6">
                <ul>
                    <li>Full name:<?php echo $userinfo['full_name'] ?></li>
                    <li>First name:<?php echo $userinfo['first_name'] ?></li>
                    <li>last name:<?php echo $userinfo['last_name'] ?></li>
                    <li>Gender:<?php echo $userinfo['gender'] ?></li>
                    <li>Email:<?php echo $userinfo['email'] ?></li>
                </ul>
            </div>
        </div>
    </div>









</body>

</html>