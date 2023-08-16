<?php include "../config/config.php" ?>
<?php include "../libs/App.php" ?>
<?php include "./includes/header.php"; ?>
<?php 
$app=new App;

$username=$_SESSION['username'];
$query="SELECT * FROM users WHERE user_name='{$username}'";
$users=$app->select_all($query);
foreach($users as $user){
    $usertype=$user->user_type;
    if($usertype =='investor'){
          echo "<script>window.location.href='http://localhost/trade/admin/404.php'</script>";
        }
    }


?>


<body>
    <style>
    p {
        color: black !important;
    }
    </style>

    <!--*******************
        Preloader start
    ********************-->

    <?php include "./includes/loader.php" ?>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include "./includes/nav-header.php" ?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->


        <?php include "./includes/main-header.php" ?>





        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include "./includes/sidebar.php" ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="breadcrumb-range-picker">
                        <span><i class="icon-calender"></i></span>
                        <!-- make it dynamic so that you can choose to display dashboard from one date to another -->
                        <span class="ml-1">May 08, 2023 - July 03, 2023</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">oaknet.inv</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-between mb-4">
                    <div class="col-xl-3 col-lg-4">
                        <h2 class="page-heading">Hi,Welcome</h2>
                        <p class="mb-0">welcome to dashboard</p>
                    </div>
                    <div class="col-xl-9 col-xxl-9 col-lg-8 mt-4 mt-lg-0">
                    </div>

                </div>
                <?php
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else {
                            $source = '';

                        }



                            switch($source){
                            case 'add_post';

                            include ("./includes/add_post.php");

                            break;

                            case 'update_post';
                            include ("./includes/edit_post.php");
                            break;

                            default:
                                include("./includes/view_all_posts.php");
                            break;
                        }
                        
                        
                        ?>

















            </div>
            <!--**********************************
            Content body end
        ***********************************-->


            <!--**********************************
            Footer start
        ***********************************-->
            <?php include "./includes/footer.php" ?>
            <!--**********************************
            Footer end
        ***********************************-->
            <?php require "./includes/right_sidebar.php"; ?>



            <!-- end of the main wraper -->
        </div>
        <!--**********************************
        Main wrapper end
    ***********************************-->

        <!--**********************************
        Scripts
    ***********************************-->

        <?php include "./includes/footer_links.php" ?>
        <!-- custom links for here only -->