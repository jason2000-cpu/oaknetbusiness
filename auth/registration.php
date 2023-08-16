<!-- include the cofig -->
<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<!-- header -->
<?php include "../includes/header.php"?>
<?php session_start() ?>
<style>
* {
    padding: 0;
    margin: 0;
}

@media screen and (max-width:820px) {
    * {
        font-size: 22px;
    }

    .px-4,
    .py-5,
    .px-md-5 {
        padding: 1rem .5rem !important;

    }

}


#row {
    background-color: whitesmoke;
}

img {
    width: 175px;
    height: auto;
}

#info-header {
    color: #562221;
}

#info-span {
    color: black;

}

#info-p {
    color: #A0363B;
}

#button {
    background-color: #562221;
    outline: none;
    color: whitesmoke;
    font-size: 18px;
    width: 80%;
    padding: auto;
}

#register {
    color: #562221;
}

@media screen and (max-width:512px) {
    * {
        font-size: 20px;
        padding: 0 !important;
        margin: 0 !important;
    }

    .px-4,
    .py-5,
    .px-md-5 {
        padding: 1rem .5rem !important;

    }

    #button {
        padding: 10px 30px !important;
    }

}
</style>
<!-- the function to register user -->
<?php
// initiaize the app
$app=new App;
// check if session exists and send him to login
$app->validate_session();
$app->google_session();
// then you can register the user
if($_SERVER['REQUEST_METHOD'] =='POST'){
    // trim the details
    $first_name=trim($_POST['first_name']);
    $last_name=trim($_POST['last_name']);
    $username=trim($_POST['username']);
    $email=trim($_POST['email']);
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    // check for errors
    $error=[
        'username'=>'',
        'email'=>'',
        'password'=>''
    ];
    if($app->username_exists($username)){
        $error['username']='username already exists';
    }
    if($app->email_exists($email)){
        $error['email']='email already exists';
    }
    if(strlen($password) < 4){
        $error['password']='Password should be longer than 4 characters';
    }
     if(strlen($username) < 4){
        $error['username']='The username should be longer than 4 characters';
    }
    // to check for errors
    foreach($error as $key =>$value){
        if(empty($value)){
            // if the error is empty
            unset($error[$key]);
        }
    }
    if(empty($error)){
        $query="INSERT INTO users (user_firstname,user_lastname,user_name,user_email,password)VALUES(:firstname,:lastname,:username,:email,:password)";
        $arr=[
            ":firstname"=>$first_name,
            ":lastname"=>$last_name,
            ":username"=>$username,
            ":email"=>$email,
            ":password"=>$password,
        ];
        $path="http://localhost/trade/";
        $app->register($query,$arr,$path);
        $balance=0;
        $accountNumber =$app->generateRandomAccountNumber();
        $accountName=$username;
        $query="INSERT INTO accounts(account_name,account_number,account_balance)VALUES(:name,:number,:balance)";
        $arr=[
            ":name"=>$username,
            ":balance"=>$balance,
            ":number"=>$accountNumber,
        ];
        $app->insertWithoutPath($query,$arr);
        
    }
}

?>

<!-- Section: Design Block -->
<section class="container-fluid">
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-center text-lg-start">
        <div class="container">
            <div class="row gx-lg-5 align-items-center" id="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight" id="info-header">
                        The best offer <br />
                        <span id="info-span">for your business</span>
                    </h1>
                    <p id="info-p">
                        "Welcome to our Oaknet Investment &Group! Explore global markets, seize lucrative
                        opportunities, and make confident investment decisions. Stay informed with real-time data and
                        expert insights. Join us today to unlock your financial success. #TradeSmart #InvestWisely"
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-body py-5 px-md-5">


                            <!-- before the form -->
                            <img src="<?php echo APPURL; ?>/assets/images/logoo-removebg-preview.png" alt="">
                            <h1 class="mb-4" id="register">Register</h1>
                            <p class="mb-4" id="register"></p>

                            <form method="post" action="registration.php">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="first_name" id="form3Example1"
                                                class="form-control" />
                                            <label class="form-label" for="form3Example1">First name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="last_name" id="form3Example2"
                                                class="form-control" />
                                            <label class="form-label" for="form3Example2">Last name</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- desired username -->
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <p class="text-danger">
                                        <?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                                    <input type="text" name="username" id="form3Example3" class="form-control" />
                                    <label class="form-label" for="form3Example3">Desired Username</label>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <p class="text-danger"><?php echo isset($error['email']) ? $error['email'] : '' ?>
                                    </p>
                                    <input type="email" name="email" id="form3Example3" class="form-control" />
                                    <label class="form-label" for="form3Example3">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <p class="text-danger">
                                        <?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                                    <input type="password" name="password" id="form3Example4" class="form-control" />
                                    <label class="form-label" for="form3Example4">Password</label>
                                </div>

                                <!-- Checkbox -->
                                <div class="d-flex justify-content-center mb-4">
                                    <p id="span">
                                        Already have an account? <span><a id="register"
                                                href="<?php echo APPURL; ?>">Login
                                            </a></span>




                                    </p>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="submit" class="btn btn-lg mb-4" id="button">
                                    Register
                                </button>
                            </form>
                            <?php 
                            $app=new App;
                                // login with google
                                if($app->validate_session()){

                                }else{
                                
                                require_once '../google-api/vendor/autoload.php';
                                
                                // init configuration
                                $clientID = '824926029870-angnpip22lkeopumajcm1pqtit4slksc.apps.googleusercontent.com';
                                $clientSecret = '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';
                                $redirectUri = 'http://localhost/trade/auth/registration.php';
                                
                                // create Client Request to access Google API
                                $client = new Google_Client();
                                $client->setClientId($clientID);
                                $client->setClientSecret($clientSecret);
                                $client->setRedirectUri($redirectUri);
                                $client->addScope("email");
                                $client->addScope("profile");
                                
                                // authenticate code from Google OAuth Flow
                                if (isset($_GET['code'])) {
                                  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
                                  $client->setAccessToken($token['access_token']);
                                
                                  // get profile info
                                  $google_oauth = new Google_Service_Oauth2($client);
                                  $google_account_info = $google_oauth->userinfo->get();
                                  $email = $google_account_info->email;
                                  $name = $google_account_info->name;
                                  $firstName = $google_account_info->givenName;
                                  $lastName = $google_account_info->familyName;
                                  $picture = $google_account_info->picture;
                                  $token = $google_account_info->id;
                                //   instanciate the object
                                // insert only if username does not exist
                               
                
                                $app=new App;
                                if(!($app->username_exists($name))){
                                //   insert the user to the database
                                  $query="INSERT INTO users (user_firstname,user_lastname,user_name,user_profile,user_email,token)VALUES(:firstname,:lastname,:username,:profile,:email,:token)";
                                       $arr=[
                                           ":firstname"=>$firstName,
                                           ":lastname"=>$lastName,
                                           ":username"=>$name,
                                           ":profile"=>$picture,
                                           ":email"=>$email,
                                           ":token"=>$token,
                                           
                                       ];
                                       $path="http://localhost/trade/home.php";
                                       $app->insert($query,$arr,$path);
                                    //    setting the session
                                       $_SESSION['token']=$token;
                                       $_SESSION['username']=$name;
                                    //    insert the account details
                                     $balance=0;
                                      $accountNumber =$app->generateRandomAccountNumber();
                                      $accountName=$username;
                                      $query="INSERT INTO accounts(account_name,account_number,account_balance)VALUES(:name,:number,:balance)";
                                      $arr=[
                                          ":name"=>$name,
                                          ":balance"=>$balance,
                                          ":number"=>$accountNumber,
                                      ];
                                      $app->insertWithoutPath($query,$arr);
                                                                  //    if the username does not exists
                                    }else{
                                        $_SESSION['token']=$token;
                                        $_SESSION['username']=$name;
                                        echo "<script>window.location.href='http://localhost/trade/home.php'</script>";
                                    }
                                  // now you can use this profile info to create account in your website and make user logged in.
                                } else {
                                 echo "<button onclick=\"window.location='".$client->createAuthUrl()."';\" type='submit' class='btn btn-lg mb-4' id='button'>
                                     Sign Up with Google <i class='uil uil-google'></i>
                                 </button>";

                                }
                            }
                                
                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->



<?php include "../includes/footer_links.php" ?>