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
    <div id="preloader">
        <?php include "./includes/loader.php" ?>
    </div>
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
                    <div class="col-xl-12 col-xxl-12 col-lg-12 mt-4 mt-lg-0">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12 col-xxl-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <h2 style="color:white;">ACCOUNTS</h2>
                                        <div class="card-body">
                                            <div class="table-responsive" id="displayAcountsTable">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>




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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
                integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <!-- script here -->
            <script>
            // displaying data
            $(document).ready(() => {
                displayData();
            });

            function displayData() {
                let displayData = "true";
                $.ajax({
                    url: "ajax/displayaccounts.php",
                    type: 'POST',
                    data: {
                        displayData: displayData,
                    },
                    success: function(data, status) {
                        // Update the content of the modal with the retrieved data
                        $('#displayAcountsTable').html(data);
                    },
                });
            }

            function deleteAccount(deleteid) {
                $.ajax({
                    url: "ajax/delete_account.php",
                    type: "POST",
                    data: {
                        deletesend: deleteid
                    },
                    success: function(data, status) {
                        Swal.fire(
                            'Nice one',
                            'Account Deleted successfully!',
                            'success'
                        );
                        displayData();
                    }
                });
            }
            </script>