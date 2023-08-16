<?php include "./config.php"; ?>
<?php include "./controler.php"; ?>


<?php
if(!isset($_SESSION['user_token'])){
    header("Location:index.php");

}
?>
<!-- display the user information -->
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