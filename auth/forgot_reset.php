 <!-- header -->
 <?php include "../config/config.php"; ?>
 <?php include "../libs/App.php"; ?>
 <?php include "../includes/header.php"; ?>





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
 <!-- get the token to update the password according to the token -->
 <?php
 if(isset($_GET['token'])){
    $token=$_GET['token'];
    // instanciate the app
 }

//  update the query
if(isset($_POST['reset'])){
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    $password=password_hash($_POST['password1'],PASSWORD_DEFAULT);

    // then compare to check if they are the same

    $error=[
        'password'=>'',
    ];
    
    if(strlen($password1) < 4){
        $error['password']='Password should be longer than 4 characters';
    }
    if($password1 !==$password2){
          $error['password']='Passwords dont match';
    }
    
    // to check for errors
    foreach($error as $key =>$value){
        if(empty($value)){
            // if the error is empty
            unset($error[$key]);
        }
    }
    if(empty($error)){
        // instanciate the class
        $app=new App;
        //   insert the user to the database
       $query="UPDATE users SET password = :password WHERE reset_token = :token";
       $arr=[
          ":password"=>$password,
          ":token"=>$token,
          
          
         ];
        //  if succesiful
        $path="http://localhost/trade/home.php";
         $app->update($query,$arr,$path);
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
                             <h1 class="mb-4" id="register">Reset Password</h1>
                             <p id="row"> You Can Reset Your Password</p>
                             <p class="text-danger">
                                 <?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                             <form method="POST" action="">
                                 <!-- password input -->
                                 <div class="form-outline mb-4">
                                     <input type="password" id="form3Example3" name="password1" class="form-control" />
                                     <label class="form-label" for="form3Example3">New Password</label>
                                 </div>
                                 <!-- password input2 -->
                                 <div class="form-outline mb-4">
                                     <input type="password" id="form3Example3" name="password2" class="form-control" />
                                     <label class="form-label" for="form3Example3">Confirm Password</label>
                                 </div>


                                 <!-- Submit button -->
                                 <button type="submit" name="reset" class="btn btn-lg align-center mb-4" id="button">
                                     Reset
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



 <?php include "../includes/footer_links.php" ?>