<!-- app and config -->
<?php require "./config/config.php" ?>
<?php require "./libs/App.php" ?>

<?php include "./includes/header.php" ?>
<!-- to sent an email -->
<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "./mailer/src/Exception.php";
require "./mailer/src/PHPMailer.php";
require "./mailer/src/SMTP.php";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


?>



<body>
    <div class="me-main-wraper">
        <?php include "./includes/main_navigation.php" ?>
        <!-- breadcrumb -->
        <div class="me-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="me-breadcrumb-box">
                            <h1 id="pageTitle">Contact</h1>
                            <p><a href="index-2.html">Home</a>Contact</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact -->
        <div class="me-contact me-padder-top">
            <div class="container">
                <div class="me-contaict-detail">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="me-contact-info">
                                <svg viewBox="-66 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m90 190c0 55.140625 44.859375 100 100 100s100-44.859375 100-100-44.859375-100-100-100-100 44.859375-100 100zm100-80c44.113281 0 80 35.886719 80 80s-35.886719 80-80 80-80-35.886719-80-80 35.886719-80 80-80zm0 0" />
                                    <path
                                        d="m200 10c0 5.523438-4.476562 10-10 10s-10-4.476562-10-10 4.476562-10 10-10 10 4.476562 10 10zm0 0" />
                                    <path
                                        d="m142.871094 5.894531c-84.121094 21.472657-142.871094 97.179688-142.871094 184.105469 0 79.226562 27.214844 111.644531 182 318 1.890625 2.519531 4.851562 4 8 4s6.109375-1.480469 8-4c154.757812-206.316406 182-238.800781 182-318 0-86.925781-58.75-162.632812-142.871094-184.105469-5.351562-1.363281-10.796875 1.863281-12.164062 7.214844-1.363282 5.351563 1.867187 10.796875 7.21875 12.164063 75.253906 19.207031 127.816406 86.949218 127.816406 164.726562 0 70.929688-22.304688 98.535156-170 295.335938-147.636719-196.738282-170-224.339844-170-295.335938 0-77.777344 52.5625-145.519531 127.816406-164.726562 5.355469-1.367188 8.582032-6.8125 7.21875-12.164063-1.367187-5.351563-6.8125-8.582031-12.164062-7.214844zm0 0" />
                                </svg>
                                <h4>Location</h4>
                                <p>Nairobi ,GA insuarance 2nd Floor ,Valley Road</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="me-contact-info">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 349.313 349.313">
                                    <g>
                                        <path d="M333.302,255.092L266.944,225.6c-3.185-1.412-6.993-2.158-11.015-2.158c-8.206,0-16.438,3.052-21.47,7.941l-20.906,20.246
                                        c-3.112,3.017-8.632,5.042-13.751,5.042c-2.188,0-4.107-0.391-5.565-1.122c-14.102-7.068-36.285-21.19-61.847-48.312
                                        c-22.706-24.085-33.474-40.573-38.514-50.163c-2.821-5.38,0.127-14.678,4.55-19.101l18.613-18.598
                                        c7.734-7.718,11.209-21.947,7.924-32.39l-20.919-66.43C100.868,10.458,90.139,0,77.604,0C60.27,0.576,35.946,6.776,18.432,33.045
                                        C-8.625,73.651-6.998,151.813,42.804,207.309c46.332,51.622,115.141,108.612,115.742,109.101
                                        c1.485,1.345,36.971,32.904,88.883,32.904c5.002,0,10.115-0.31,15.213-0.908c56.533-6.835,77.257-43.071,84.579-64.054
                                        C351.4,272.438,343.398,259.602,333.302,255.092z M336.029,280.431c-6.413,18.388-24.663,50.146-74.813,56.203
                                        c-4.565,0.554-9.206,0.828-13.792,0.828c-46.722,0-79.691-28.731-81.158-30.026c-2.829-2.355-69.932-58.233-114.653-108.049
                                        C7.047,149.737,3.564,76.685,28.276,39.608c14.701-22.057,35.279-27.279,49.967-27.777c5.987,0.025,12.695,6.614,14.488,12.279
                                        l20.918,66.43c1.968,6.256-0.371,15.808-5.007,20.447l-18.605,18.595c-7.599,7.592-12.096,22.666-6.652,32.992
                                        c5.396,10.27,16.788,27.759,40.37,52.788c26.749,28.365,50.196,43.27,65.161,50.779c3.062,1.539,6.835,2.356,10.902,2.356
                                        c8.231,0,16.65-3.199,21.967-8.368l20.906-20.262c4.185-4.047,14.076-5.824,19.424-3.453l66.354,29.488
                                        C333.531,268.183,337.933,275.008,336.029,280.431z" />
                                        <path
                                            d="M161.098,102.801c-3.271,0-5.926,2.664-5.926,5.926s2.655,5.923,5.926,5.923c40.827,0,74.037,33.213,74.037,74.032
                                        c0,3.265,2.655,5.926,5.926,5.926s5.926-2.661,5.926-5.926C246.987,141.33,208.46,102.801,161.098,102.801z" />
                                        <path d="M278.303,202.713c3.27,0,5.926-2.661,5.926-5.926c0-72.356-58.879-131.226-131.246-131.226
                                        c-3.27,0-5.923,2.661-5.923,5.924s2.653,5.926,5.923,5.926c65.831,0,119.393,53.555,119.393,119.376
                                        C272.376,200.052,275.038,202.713,278.303,202.713z" />
                                    </g>
                                </svg>
                                <h4>Contact detail</h4>
                                <p>+254759707049</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="me-contact-info">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <g>
                                        <path d="M174.545,302.545H81.455c-6.982,0-11.636,4.655-11.636,11.636s4.655,11.636,11.636,11.636h93.091
                                        c6.982,0,11.636-4.655,11.636-11.636S181.527,302.545,174.545,302.545z" />
                                    </g>
                                    <g>
                                        <path d="M139.636,244.364H46.545c-6.982,0-11.636,4.655-11.636,11.636s4.655,11.636,11.636,11.636h93.091
                                        c6.982,0,11.636-4.655,11.636-11.636S146.618,244.364,139.636,244.364z" />
                                    </g>
                                    <g>
                                        <path d="M104.727,186.182H11.636C4.655,186.182,0,190.836,0,197.818s4.655,11.636,11.636,11.636h93.091
                                        c6.982,0,11.636-4.655,11.636-11.636S111.709,186.182,104.727,186.182z" />
                                    </g>
                                    <g>
                                        <path d="M463.127,155.927c-3.491-4.655-11.636-5.818-16.291-2.327l-123.345,94.255c-12.8,9.309-30.255,9.309-43.055,0
                                        L157.091,153.6c-4.655-3.491-12.8-3.491-16.291,2.327c-3.491,4.655-3.491,12.8,2.327,16.291l124.509,94.255
                                        c10.473,8.145,23.273,11.636,34.909,11.636s25.6-3.491,34.909-11.636L460.8,172.218
                                        C465.455,168.727,466.618,160.582,463.127,155.927z" />
                                    </g>
                                    <g>
                                        <path d="M477.091,104.727H104.727c-6.982,0-11.636,4.655-11.636,11.636S97.745,128,104.727,128h372.364
                                        c6.982,0,11.636,4.655,11.636,11.636v232.727c0,6.982-4.655,11.636-11.636,11.636H104.727c-6.982,0-11.636,4.655-11.636,11.636
                                        c0,6.982,4.655,11.636,11.636,11.636h372.364c19.782,0,34.909-15.127,34.909-34.909V139.636
                                        C512,119.855,496.873,104.727,477.091,104.727z" />
                                    </g>
                                    <g>
                                        <path
                                            d="M461.964,340.945l-69.818-69.818c-4.655-4.655-11.636-4.655-16.291,0s-4.655,11.636,0,16.291l69.818,69.818
                                        c2.327,2.327,5.818,3.491,8.145,3.491s5.818-1.164,8.146-3.491C466.618,352.582,466.618,345.6,461.964,340.945z" />
                                    </g>
                                </svg>
                                <h4>Email</h4>
                                <p>oaknet@gmail.com</p>
                                <p>support.oaknetinv.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sent the information -->
                <?php
                if(isset($_POST['submit'])){
                    $full_name=$_POST['full_name'];
                    $email=$_POST['email'];
                    $subject=$_POST['subject'];
                    $message=$_POST['message'];
                    // check for errors
                    $error=[
                   
                   'email'=>'',
                   'field'=>''
               ];
               $app=new App;
               if(empty($full_name) || empty($email) || empty($subject) || empty($message)){
                   $error['field']='The field cannot be empty';
               }
               if(!$app->email_exists($email)){
                   $error['email']='email does not exist';
               }
               // to check for errors
               foreach($error as $key =>$value){
                   if(empty($value)){
                       // if the error is empty
                       unset($error[$key]);
                   }
               }
               if(empty($error)){
                   $query="INSERT INTO messages(name,email,subject,message)VALUES(:name,:email,:subject,:message)";
                   $arr=[
                       ":name"=>$full_name,
                       ":email"=>$email,
                       ":subject"=>$subject,
                       ":message"=>$message,
                   ];
                //    instaciate the app
                   $app=new APP;
                   $app->insertWithoutPath($query,$arr);
                                     //    fuction to send me email
                                    
                                    
                                               $mail->SMTPDebug = 0; // Disable debug output
                                               $mail->isSMTP();
                                               $mail->Host = 'smtp.gmail.com';
                                               $mail->SMTPAuth = true;
                                               $mail->Username = 'joshujohn03@gmail.com';
                                               $mail->Password = 'wqrafmyezdivpiom';
                                               $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                                               $mail->Port = 465;
                                                                
                                                     // Recipients
                                               $mail->setFrom($email, 'Mailer');
                                               $mail->addAddress('joshujohn03@gmail.com');
                                                $mail->addReplyTo('info@example.com', 'Information');
                                              
                             
                                                 // Email subject and body
                                                    $mail->Subject = $subject;
                                                    $email_template = "
                                                       <!doctype html>
                                                      <html>
                                                      
                                                      <head>
                                                          <meta name='viewport' content='width=device-width, initial-scale=1.0' />
                                                          <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                                                          <title>Contact Form Submission</title>
                                                          <style>
                                                          /* CSS styles */
                                                          /* All the styling goes here */
                                                      
                                                          img {
                                                              border: none;
                                                              -ms-interpolation-mode: bicubic;
                                                              max-width: 100%;
                                                          }
                                                      
                                                          body {
                                                              background-color: #f6f6f6;
                                                              font-family: sans-serif;
                                                              -webkit-font-smoothing: antialiased;
                                                              font-size: 14px;
                                                              line-height: 1.4;
                                                              margin: 0;
                                                              padding: 0;
                                                              -ms-text-size-adjust: 100%;
                                                              -webkit-text-size-adjust: 100%;
                                                          }
                                                      
                                                          table {
                                                              border-collapse: separate;
                                                              mso-table-lspace: 0pt;
                                                              mso-table-rspace: 0pt;
                                                              width: 100%;
                                                          }
                                                      
                                                          table td {
                                                              font-family: sans-serif;
                                                              font-size: 14px;
                                                              vertical-align: top;
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                BODY & CONTAINER
                                                            ------------------------------------- */
                                                      
                                                          .body {
                                                              background-color: #f6f6f6;
                                                              width: 100%;
                                                          }
                                                      
                                                          .container {
                                                              display: block;
                                                              margin: 0 auto !important;
                                                              /* makes it centered */
                                                              max-width: 580px;
                                                              padding: 10px;
                                                              width: 580px;
                                                          }
                                                      
                                                          .content {
                                                              box-sizing: border-box;
                                                              display: block;
                                                              margin: 0 auto;
                                                              max-width: 580px;
                                                              padding: 10px;
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                HEADER, FOOTER, MAIN
                                                            ------------------------------------- */
                                                          .main {
                                                              background: #ffffff;
                                                              border-radius: 3px;
                                                              width: 100%;
                                                          }
                                                      
                                                          .wrapper {
                                                              box-sizing: border-box;
                                                              padding: 20px;
                                                          }
                                                      
                                                          .content-block {
                                                              padding-bottom: 10px;
                                                              padding-top: 10px;
                                                          }
                                                      
                                                          .footer {
                                                              clear: both;
                                                              margin-top: 10px;
                                                              text-align: center;
                                                              width: 100%;
                                                          }
                                                      
                                                          .footer td,
                                                          .footer p,
                                                          .footer span,
                                                          .footer a {
                                                              color: #999999;
                                                              font-size: 12px;
                                                              text-align: center;
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                TYPOGRAPHY
                                                            ------------------------------------- */
                                                          h1,
                                                          h2,
                                                          h3,
                                                          h4 {
                                                              color: #000000;
                                                              font-family: sans-serif;
                                                              font-weight: 400;
                                                              line-height: 1.4;
                                                              margin: 0;
                                                              margin-bottom: 30px;
                                                          }
                                                      
                                                          h1 {
                                                              font-size: 35px;
                                                              font-weight: 300;
                                                              text-align: center;
                                                              text-transform: capitalize;
                                                          }
                                                      
                                                          p,
                                                          ul,
                                                          ol {
                                                              font-family: sans-serif;
                                                              font-size: 14px;
                                                              font-weight: normal;
                                                              margin: 0;
                                                              margin-bottom: 15px;
                                                          }
                                                      
                                                          p li,
                                                          ul li,
                                                          ol li {
                                                              list-style-position: inside;
                                                              margin-left: 5px;
                                                          }
                                                      
                                                          a {
                                                              color: #3498db;
                                                              text-decoration: underline;
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                BUTTONS
                                                            ------------------------------------- */
                                                          .btn {
                                                              box-sizing: border-box;
                                                              width: 100%;
                                                          }
                                                      
                                                          .btn>tbody>tr>td {
                                                              padding-bottom: 15px;
                                                          }
                                                      
                                                          .btn table {
                                                              width: auto;
                                                          }
                                                      
                                                          .btn table td {
                                                              background-color: #ffffff;
                                                              border-radius: 5px;
                                                              text-align: center;
                                                          }
                                                      
                                                          .btn a {
                                                              background-color: #ffffff;
                                                              border: solid 1px #3498db;
                                                              border-radius: 5px;
                                                              box-sizing: border-box;
                                                              color: #3498db;
                                                              cursor: pointer;
                                                              display: inline-block;
                                                              font-size: 14px;
                                                              font-weight: bold;
                                                              margin: 0;
                                                              padding: 12px 25px;
                                                              text-decoration: none;
                                                              text-transform: capitalize;
                                                          }
                                                      
                                                          .btn-primary table td {
                                                              background-color: #3498db;
                                                          }
                                                      
                                                          .btn-primary a {
                                                              background-color: #3498db;
                                                              border-color: #3498db;
                                                              color: #ffffff;
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                OTHER STYLES THAT MIGHT BE USEFUL
                                                            ------------------------------------- */
                                                          .last {
                                                              margin-bottom: 0;
                                                          }
                                                      
                                                          .logo {
                                                              max-width: 200px;
                                                              margin-bottom: 20px;
                                                          }
                                                      
                                                          .first {
                                                              margin-top: 0;
                                                          }
                                                      
                                                          .align-center {
                                                              text-align: center;
                                                          }
                                                      
                                                          .align-right {
                                                              text-align: right;
                                                          }
                                                      
                                                          .align-left {
                                                              text-align: left;
                                                          }
                                                      
                                                          .clear {
                                                              clear: both;
                                                          }
                                                      
                                                          .mt0 {
                                                              margin-top: 0;
                                                          }
                                                      
                                                          .mb0 {
                                                              margin-bottom: 0;
                                                          }
                                                      
                                                          .preheader {
                                                              color: transparent;
                                                              display: none;
                                                              height: 0;
                                                              max-height: 0;
                                                              max-width: 0;
                                                              opacity: 0;
                                                              overflow: hidden;
                                                              mso-hide: all;
                                                              visibility: hidden;
                                                              width: 0;
                                                          }
                                                      
                                                          .powered-by a {
                                                              text-decoration: none;
                                                          }
                                                      
                                                          hr {
                                                              border: 0;
                                                              border-bottom: 1px solid #f6f6f6;
                                                              margin: 20px 0;
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                RESPONSIVE AND MOBILE FRIENDLY STYLES
                                                            ------------------------------------- */
                                                          @media only screen and (max-width: 620px) {
                                                              table[class='body'] h1 {
                                                                  font-size: 28px !important;
                                                                  margin-bottom: 10px !important;
                                                              }
                                                      
                                                              table[class='body'] p,
                                                              table[class='body'] ul,
                                                              table[class='body'] ol,
                                                              table[class='body'] td,
                                                              table[class='body'] span,
                                                              table[class='body'] a {
                                                                  font-size: 16px !important;
                                                              }
                                                      
                                                              table[class='body'] .wrapper,
                                                              table[class='body'] .article {
                                                                  padding: 10px !important;
                                                              }
                                                      
                                                              table[class='body'] .content {
                                                                  padding: 0 !important;
                                                              }
                                                      
                                                              table[class='body'] .container {
                                                                  padding: 0 !important;
                                                                  width: 100% !important;
                                                              }
                                                      
                                                              table[class='body'] .main {
                                                                  border-left-width: 0 !important;
                                                                  border-radius: 0 !important;
                                                                  border-right-width: 0 !important;
                                                              }
                                                      
                                                              table[class='body'] .btn table {
                                                                  width: 100% !important;
                                                              }
                                                      
                                                              table[class='body'] .btn a {
                                                                  width: 100% !important;
                                                              }
                                                      
                                                              table[class='body'] .img-responsive {
                                                                  height: auto !important;
                                                                  max-width: 100% !important;
                                                                  width: auto !important;
                                                              }
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                PRESERVE THESE STYLES IN THE HEAD
                                                            ------------------------------------- */
                                                          @media all {
                                                              .ExternalClass {
                                                                  width: 100%;
                                                              }
                                                      
                                                              .ExternalClass,
                                                              .ExternalClass p,
                                                              .ExternalClass span,
                                                              .ExternalClass font,
                                                              .ExternalClass td,
                                                              .ExternalClass div {
                                                                  line-height: 100%;
                                                              }
                                                      
                                                              .apple-link a {
                                                                  color: inherit !important;
                                                                  font-family: inherit !important;
                                                                  font-size: inherit !important;
                                                                  font-weight: inherit !important;
                                                                  line-height: inherit !important;
                                                                  text-decoration: none !important;
                                                              }
                                                      
                                                              #MessageViewBody a {
                                                                  color: inherit;
                                                                  text-decoration: none;
                                                                  font-size: inherit;
                                                                  font-family: inherit;
                                                                  font-weight: inherit;
                                                                  line-height: inherit;
                                                              }
                                                      
                                                              .btn-primary table td:hover {
                                                                  background-color: #34495e !important;
                                                              }
                                                      
                                                              .btn-primary a:hover {
                                                                  background-color: #34495e !important;
                                                                  border-color: #34495e !important;
                                                              }
                                                          }
                                                          </style>
                                                      </head>
                                                      
                                                      <body class=''>
                                                          <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body'>
                                                              <tr>
                                                                  <td>&nbsp;</td>
                                                                  <td class='container'>
                                                                      <div class='content'>
                                                                          <table role='presentation' class='main'>
                                                                              <tr>
                                                                                  <td class='wrapper'>
                                                                                      <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                                                                                          <tr>
                                                                                              <td>
                                                                                                  

                                                                                                  <h2>New Message</h2>
                                                                                                  <p><strong>Name:</strong> $full_name</p>
                                                                                                  <p><strong>Email:</strong> $email</p>
                                                                                                  <p><strong>Subject:</strong> $subject</p>
                                                                                                  <p><strong>Message:</strong> $message</p>
                                                                                                  </td>
                                                                                                  </tr>
                                                                                                  </table>
                                                                                                  </td>
                                                                                                  </tr>
                                                                                                  </table>
                                                                                                  <div class='footer'>
                                                                                                      <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                                                                                                          <tr>
                                                                                                              <td class='content-block'>
                                                                                                                  <span class='apple-link'>oaknet inv.| Nairobi ,GA insuarance| 2nd Floor ,Valley
                                                                                                                      Road</span>
                                                                                                                  <br />
                                                                                  
                                                                                                              </td>
                                                                                                          </tr>
                                                                                                      </table>
                                                                                                  </div>
                                                                                                      </div>
                                                                                                      </td>
                                                                                                      <td>&nbsp;</td>
                                                                                                      </tr>
                                                                                                      </table>
                                                                                                      </body>
                                                                                                      
                                                                                                      </html>
                                                                                                      ";
                                                                                                      $mail->Body = $email_template;
                                                                                                      $mail->isHTML(true);
                                                                                                      if($mail->send()){
                                                                                                      $emailSent=true;
                                                                                                      }
                                                                                                    //   sent email to the user
                                                                                                    
                                    
                                                                                                $mail->SMTPDebug = 0; // Disable debug output
                                                                                                $mail->isSMTP();
                                                                                                $mail->Host = 'smtp.gmail.com';
                                                                                                $mail->SMTPAuth = true;
                                                                                                $mail->Username = 'joshujohn03@gmail.com';
                                                                                                $mail->Password = 'wqrafmyezdivpiom';
                                                                                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                                                                                                $mail->Port = 465;
                                                                                                                 
                                                                                                      // Recipients
                                                                                             $mail->setFrom('joshujohn03@gmail.com', 'Your Name');
                                                                                             $mail->addAddress($email);
                                                                                             $mail->addReplyTo('info@example.com', 'Information');

                                                                                               
                             
                                                                               // Email subject and body
                                                                                  $mail->Subject = $subject;
                                                                                  $email_template = "
                                                                                     <!doctype html>
                                                                                    <html>
                                                                                    
                                                                                    <head>
                                                                                        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
                                                                                        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                                                                                        <title>Contact Form Submission</title>
                                                                                        <style>
                                                                                        /* CSS styles */
                                                                                        /* All the styling goes here */
                                                                                    
                                                                                        img {
                                                                                            border: none;
                                                                                            -ms-interpolation-mode: bicubic;
                                                                                            max-width: 100%;
                                                                                        }
                                                                                    
                                                                                        body {
                                                                                            background-color: #f6f6f6;
                                                                                            font-family: sans-serif;
                                                                                            -webkit-font-smoothing: antialiased;
                                                                                            font-size: 14px;
                                                                                            line-height: 1.4;
                                                                                            margin: 0;
                                                                                                                             padding: 0;
                                                                                                                             -ms-text-size-adjust: 100%;
                                                                                               -webkit-text-size-adjust: 100%;
                                                                                           }
                                                                                       
                                                                                           table {
                                                                                               border-collapse: separate;
                                                                                               mso-table-lspace: 0pt;
                                                                                               mso-table-rspace: 0pt;
                                                                                               width: 100%;
                                                                                           }
                                                                                       
                                                                                           table td {
                                                                                               font-family: sans-serif;
                                                                                               font-size: 14px;
                                                                                               vertical-align: top;
                                                                                           }
                                                                                       
                                                                                           /* -------------------------------------
                                                                                                 BODY & CONTAINER
                                                                                             ------------------------------------- */
                                                                                       
                                                                                           .body {
                                                                                               background-color: #f6f6f6;
                                                                                               width: 100%;
                                                                                           }
                                                                                       
                                                                                           .container {
                                                                                               display: block;
                                                                                               margin: 0 auto !important;
                                                                                               /* makes it centered */
                                                                                               max-width: 580px;
                                                                                               padding: 10px;
                                                                                               width: 580px;
                                                          }
                                                      
                                                          .content {
                                                              box-sizing: border-box;
                                                              display: block;
                                                              margin: 0 auto;
                                                              max-width: 580px;
                                                              padding: 10px;
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                HEADER, FOOTER, MAIN
                                                            ------------------------------------- */
                                                          .main {
                                                              background: #ffffff;
                                                              border-radius: 3px;
                                                              width: 100%;
                                                          }
                                                      
                                                          .wrapper {
                                                              box-sizing: border-box;
                                                              padding: 20px;
                                                          }
                                                      
                                                          .content-block {
                                                              padding-bottom: 10px;
                                                              padding-top: 10px;
                                                          }
                                                      
                                                          .footer {
                                                              clear: both;
                                                              margin-top: 10px;
                                                              text-align: center;
                                                              width: 100%;
                                                          }
                                                      
                                                          .footer td,
                                                          .footer p,
                                                          .footer span,
                                                          .footer a {
                                                              color: #999999;
                                                              font-size: 12px;
                                                              text-align: center;
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                TYPOGRAPHY
                                                            ------------------------------------- */
                                                          h1,
                                                          h2,
                                                          h3,
                                                          h4 {
                                                              color: #000000;
                                                              font-family: sans-serif;
                                                              font-weight: 400;
                                                              line-height: 1.4;
                                                              margin: 0;
                                                              margin-bottom: 30px;
                                                          }
                                                      
                                                          h1 {
                                                              font-size: 35px;
                                                              font-weight: 300;
                                                              text-align: center;
                                                              text-transform: capitalize;
                                                          }
                                                      
                                                          p,
                                                          ul,
                                                          ol {
                                                              font-family: sans-serif;
                                                              font-size: 14px;
                                                              font-weight: normal;
                                                              margin: 0;
                                                              margin-bottom: 15px;
                                                          }
                                                      
                                                          p li,
                                                          ul li,
                                                          ol li {
                                                              list-style-position: inside;
                                                              margin-left: 5px;
                                                          }
                                                      
                                                          a {
                                                              color: #3498db;
                                                              text-decoration: underline;
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                BUTTONS
                                                            ------------------------------------- */
                                                          .btn {
                                                              box-sizing: border-box;
                                                              width: 100%;
                                                          }
                                                      
                                                          .btn>tbody>tr>td {
                                                              padding-bottom: 15px;
                                                          }
                                                      
                                                          .btn table {
                                                              width: auto;
                                                          }
                                                      
                                                          .btn table td {
                                                              background-color: #ffffff;
                                                              border-radius: 5px;
                                                              text-align: center;
                                                          }
                                                      
                                                          .btn a {
                                                              background-color: #ffffff;
                                                              border: solid 1px #3498db;
                                                              border-radius: 5px;
                                                              box-sizing: border-box;
                                                              color: #3498db;
                                                              cursor: pointer;
                                                              display: inline-block;
                                                              font-size: 14px;
                                                              font-weight: bold;
                                                              margin: 0;
                                                              padding: 12px 25px;
                                                              text-decoration: none;
                                                              text-transform: capitalize;
                                                          }
                                                      
                                                          .btn-primary table td {
                                                              background-color: #3498db;
                                                          }
                                                      
                                                          .btn-primary a {
                                                              background-color: #3498db;
                                                              border-color: #3498db;
                                                              color: #ffffff;
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                OTHER STYLES THAT MIGHT BE USEFUL
                                                            ------------------------------------- */
                                                          .last {
                                                              margin-bottom: 0;
                                                          }
                                                      
                                                          .logo {
                                                              max-width: 200px;
                                                              margin-bottom: 20px;
                                                          }
                                                      
                                                          .first {
                                                              margin-top: 0;
                                                          }
                                                      
                                                          .align-center {
                                                              text-align: center;
                                                          }
                                                      
                                                          .align-right {
                                                              text-align: right;
                                                          }
                                                      
                                                          .align-left {
                                                              text-align: left;
                                                          }
                                                      
                                                          .clear {
                                                              clear: both;
                                                          }
                                                      
                                                          .mt0 {
                                                              margin-top: 0;
                                                          }
                                                      
                                                          .mb0 {
                                                              margin-bottom: 0;
                                                          }
                                                      
                                                          .preheader {
                                                              color: transparent;
                                                              display: none;
                                                              height: 0;
                                                              max-height: 0;
                                                              max-width: 0;
                                                              opacity: 0;
                                                              overflow: hidden;
                                                              mso-hide: all;
                                                              visibility: hidden;
                                                              width: 0;
                                                          }
                                                      
                                                          .powered-by a {
                                                              text-decoration: none;
                                                          }
                                                      
                                                          hr {
                                                              border: 0;
                                                              border-bottom: 1px solid #f6f6f6;
                                                              margin: 20px 0;
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                RESPONSIVE AND MOBILE FRIENDLY STYLES
                                                            ------------------------------------- */
                                                          @media only screen and (max-width: 620px) {
                                                              table[class='body'] h1 {
                                                                  font-size: 28px !important;
                                                                  margin-bottom: 10px !important;
                                                              }
                                                      
                                                              table[class='body'] p,
                                                              table[class='body'] ul,
                                                              table[class='body'] ol,
                                                              table[class='body'] td,
                                                              table[class='body'] span,
                                                              table[class='body'] a {
                                                                  font-size: 16px !important;
                                                              }
                                                      
                                                              table[class='body'] .wrapper,
                                                              table[class='body'] .article {
                                                                  padding: 10px !important;
                                                              }
                                                      
                                                              table[class='body'] .content {
                                                                  padding: 0 !important;
                                                              }
                                                      
                                                              table[class='body'] .container {
                                                                  padding: 0 !important;
                                                                  width: 100% !important;
                                                              }
                                                      
                                                              table[class='body'] .main {
                                                                  border-left-width: 0 !important;
                                                                  border-radius: 0 !important;
                                                                  border-right-width: 0 !important;
                                                              }
                                                      
                                                              table[class='body'] .btn table {
                                                                  width: 100% !important;
                                                              }
                                                      
                                                              table[class='body'] .btn a {
                                                                  width: 100% !important;
                                                              }
                                                      
                                                              table[class='body'] .img-responsive {
                                                                  height: auto !important;
                                                                  max-width: 100% !important;
                                                                  width: auto !important;
                                                              }
                                                          }
                                                      
                                                          /* -------------------------------------
                                                                PRESERVE THESE STYLES IN THE HEAD
                                                            ------------------------------------- */
                                                          @media all {
                                                              .ExternalClass {
                                                                  width: 100%;
                                                              }
                                                      
                                                              .ExternalClass,
                                                              .ExternalClass p,
                                                              .ExternalClass span,
                                                              .ExternalClass font,
                                                              .ExternalClass td,
                                                              .ExternalClass div {
                                                                  line-height: 100%;
                                                              }
                                                      
                                                              .apple-link a {
                                                                  color: inherit !important;
                                                                  font-family: inherit !important;
                                                                  font-size: inherit !important;
                                                                  font-weight: inherit !important;
                                                                  line-height: inherit !important;
                                                                  text-decoration: none !important;
                                                              }
                                                      
                                                              #MessageViewBody a {
                                                                  color: inherit;
                                                                  text-decoration: none;
                                                                  font-size: inherit;
                                                                  font-family: inherit;
                                                                  font-weight: inherit;
                                                                  line-height: inherit;
                                                              }
                                                      
                                                              .btn-primary table td:hover {
                                                                  background-color: #34495e !important;
                                                              }
                                                      
                                                              .btn-primary a:hover {
                                                                  background-color: #34495e !important;
                                                                  border-color: #34495e !important;
                                                              }
                                                          }
                                                          </style>
                                                      </head>
                                                      
                                                      <body class=''>
                                                          <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body'>
                                                              <tr>
                                                                  <td>&nbsp;</td>
                                                                  <td class='container'>
                                                                      <div class='content'>
                                                                          <table role='presentation' class='main'>
                                                                              <tr>
                                                                                  <td class='wrapper'>
                                                                                      <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                                                                                          <tr>
                                                                                              <td>
                                                                                                  

                                                                                                  <h2>Oaknet investment inc.</h2>
                                                                                                  
                                                                                                  <p><strong>Message:</strong>Thank you  for contacting us we have recieved your information.expect a reply very soon</p>
                                                                                                  </td>
                                                                                                  </tr>
                                                                                                  </table>
                                                                                                  </td>
                                                                                                  </tr>
                                                                                                  </table>
                                                                                                  <div class='footer'>
                                                                                                      <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                                                                                                          <tr>
                                                                                                              <td class='content-block'>
                                                                                                                  <span class='apple-link'>oaknet inv.| Nairobi ,GA insuarance| 2nd Floor ,Valley
                                                                                                                      Road</span>
                                                                                                                  <br />
                                                                                  
                                                                                                              </td>
                                                                                                          </tr>
                                                                                                      </table>
                                                                                                  </div>
                                                                                                      </div>
                                                                                                      </td>
                                                                                                      <td>&nbsp;</td>
                                                                                                      </tr>
                                                                                                      </table>
                                                                                                      </body>
                                                                                                      
                                                                                                      </html>
                                                                                                      ";
                                                                                                      $mail->Body = $email_template;
                                                                                                      $mail->isHTML(true);
                                                                                                      if($mail->send()){
                                                                                                      $Sent=true;
                                                                                                      }
                                                                                                    //   sent email to the user
                                                                                                    
                                                                                                      }
                                                                                                      
                                                                                                      }
                                                                                                      

                                                                                                     
                                                                                                      
                                                                                                      ?>









                <div class="row">
                    <div class="col-lg-6">
                        <?php if(!isset($emailSent) || !isset($Sent)): ?>
                        <form method="post" action="">
                            <div class="me-contact-form">
                                <p class="text-danger">
                                    <?php echo isset($error['field']) ? $error['field'] : '' ?></p>
                                <input type="text" placeholder="Name" name="full_name" id="full_name" class="require" />
                                <p class="text-danger">
                                    <?php echo isset($error['field']) ? $error['field'] : '' ?></p>
                                <input type="text" placeholder="Subject" name="subject" id="subject" />
                                <p class="text-danger">
                                    <?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                                <input type="text" placeholder="Email" name="email" id="email" class="require"
                                    data-valid="email" data-error="Email should be valid." />
                                <p class="text-danger">
                                    <?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                                <textarea placeholder="Message" name="message" id="message"></textarea>

                                <button type="submit" class="me-btn submitForm" name="submit">Submit</button>
                                <!-- give two diffrent if email sent or not -->

                            </div>
                        </form>
                        <?php else: ?>
                        <p class="mb-4"
                            style=" padding:5px; border-radius: 1.5rem; background-color: #A0363B; color: white;">
                            We have received your message!</p>
                        <?php endif; ?>

                    </div>
                    <div class="col-lg-6">
                        <div class="me-global-map">
                            <div id="" class="jvmap-smart">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.797572764504!2d36.80510747390067!3d-1.2960731356346629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f116dc0de129d%3A0x47f0c8f214b371a8!2sOaknet%20Business!5e0!3m2!1sen!2ske!4v1686818827526!5m2!1sen!2ske"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Partners -->
        <?php include "./includes/patners.php" ?>
        <!-- footer -->
        <?php include "./includes/footer.php" ?>
    </div>
    <?php include "./includes/footer_links.php" ?>
</body>

</html>