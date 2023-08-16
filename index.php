<!-- INCLUDE -->
<?php require "./config/config.php"; ?>
<?php require "./libs/App.php"; ?>
<!-- header -->
<?php include "./includes/header.php" ?>

<!-- check if validate session -->
<!-- start the sessin -->
<?php session_start() ?>



<style>
* {
    padding: 0;
    margin: 0;
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
    padding: 4px 28px;
    font-size: 18px;
}

#register {
    color: #562221;
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
<?php 
$app=new App;
$app->validate_session();

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];

    // check for errors
    $error=[
        "email" =>'',
        "password"=>''
    ];
    if(!$app->email_exists($email)){
         $error['email']='email does not exist exists';
    }
    if(!$app->password_exists($email,$password)){
         $error['password']='Incorrect password or it does not exist';

    }
    

// to check for errors
foreach($error as $key =>$value){
    if(empty($value)){
        // if error is empty
        unset($error[$key]);
    }
}
if(empty($error)){
    // login in the user
    $query="SELECT * FROM users WHERE user_email='{$email}'";
    $data=[
        "email"=>$email,
        "password"=>$password,
    ];
    $path="http://localhost/trade/home.php";
    $app->login($query,$data,$path);
    
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
                            <img src="./assets/images/logoo-removebg-preview.png" alt="">
                            <h1 class="mb-4" id="register">Login</h1>
                            <form action="" method="POST">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <p class="text-danger">
                                        <?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                                    <input type="email" id="form3Example3" name="email" class="form-control" />
                                    <label class="form-label" for="form3Example3">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <p class="text-danger">
                                        <?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                                    <input type="password" id="form3Example4" name="password" class="form-control" />
                                    <label class="form-label" for="form3Example4">Password</label>
                                </div>

                                <!-- Checkbox -->
                                <div class="d-flex justify-content-center mb-4">
                                    <p id="span"><span><a id="register"
                                                href="auth/forgot.php?forgot=<?php echo uniqid(true);?>">Forgot
                                                Password</a></span>
                                        <br>
                                        or
                                        <br>
                                        dont have and account? <span><a id="register"
                                                href="auth/registration.php">register
                                                now</a></span>
                                    </p>
                                </div>

                                <!-- Submit button -->
                                <button name="submit" type="submit" class="btn btn-lg align-center mb-4" id="button">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

















    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->



<!-- <?php include "./includes/footer_links.php" ?> -->