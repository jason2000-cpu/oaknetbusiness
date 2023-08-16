 <!-- app and config -->
 <?php require "../config/config.php" ?>
 <?php require "../libs/App.php" ?>
 <!-- header -->
 <?php require "../includes/header.php" ?>
 <?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require '../mailer/src/Exception.php';
require '../mailer/src/PHPMailer.php';
require '../mailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);






?>



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
 <?php 
 $app=new App;
 if(!isset($_GET['forgot'])){

    echo " <script>window.location.href='".APPURL."'</script>";
 }
 if (isset($_POST['submit'])) {
    // Email
    $email = $_POST['email'];

    // Random token
    $length = 50;
    $token = bin2hex(openssl_random_pseudo_bytes($length));

    // Check if email exists in the database
    if ($app->email_exists($email)) {
        // Update token in the database
        $query = "UPDATE users SET reset_token=:token WHERE user_email=:email";
        $arr = [
            ":token" => $token,
            ":email" => $email
        ];

        $app->updateToken($query, $arr);
            // Send email with the password reset link
            $mail->SMTPDebug = 0; // Disable debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'joshujohn03@gmail.com';
            $mail->Password = 'wqrafmyezdivpiom';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($email);
            $mail->addReplyTo('info@example.com', 'Information');

            // Email subject and body
            $mail->Subject = 'Password Reset';
            $email_template = "
                <h2>Hello</h2>
                <h3>Thank you for contacting us to recover your account</h3>
                <br/>
                <br/>
                <a href='http://localhost:/trade/auth/forgot_reset.php?email=".$email."&token=".$token."'>Click Here to reset</a>
            ";
            $mail->Body = $email_template;
            $mail->isHTML(true);

            
            if($mail->send()){
                $emailSent=true;
            }
    } else {
        echo "<script>alert('The email does not exist')</script>";
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
                             <?php if(!isset($emailSent)): ?>
                             <h1 class="mb-4" id="register">Forgot</h1>
                             <p id="row"> Enter Your Email to Reset Your Password</p>
                             <form action="" method="POST">
                                 <!-- Email input -->
                                 <div class="form-outline mb-4">
                                     <input type="email" name="email" id="form3Example3" class="form-control" />
                                     <label class="form-label" for="form3Example3">Email address</label>
                                 </div>

                                 <!-- Submit button -->
                                 <button name="submit" type="submit" class="btn btn-lg align-center mb-4" id="button">
                                     Reset
                                 </button>
                             </form>
                             <!-- if sent -->
                             <?php else: ?>
                             <p class="mb-4"
                                 style=" padding:5px; border-radius: 1.5rem; background-color: #A0363B; color: white;">
                                 An email has been sent to
                                 you!</p>
                             <?php endif; ?>
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