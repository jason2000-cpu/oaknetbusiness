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
                            case 'add_user';

                            include ("./includes/add_user.php");

                            break;

                            case 'update_user';
                            include ("./includes/edit_user.php");
                            break;
                            

                            default:
                                include("./includes/view_all_users.php");
                            break;
                        }
                        
                        
                        ?>












                <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
                    aria-labelledby="successModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="successModalLabel">Success!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Operation completed successfully.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
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

        <!-- script here -->
        <script>
        // displaying data
        $(document).ready(() => {
            displayData();
            // setInterval(displayData, 1000);
        });


        function displayData() {
            let displayUsers = "true";
            $.ajax({
                url: "ajax/displayusers.php",
                type: 'POST',
                data: {
                    displayUsers: displayUsers,
                },
                success: function(data, status) {
                    // Update the content of the modal with the retrieved data
                    $('#displayUsers').html(data);
                },
            });
        }
        // delete record
        function deleteUser(deleteid) {
            $.ajax({
                url: "ajax/delete_user.php",
                type: "POST",
                data: {
                    deletesend: deleteid
                },
                success: function(data, status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Delete was successful.',
                        confirmButtonColor: '#50211F',
                        confirmButtonText: 'OK',
                    });
                    displayData();
                }
            });
        }

        function changeUserType(userid, type) {
            $.ajax({
                url: "ajax/changeUsertype.php",
                type: "POST",
                data: {
                    userid: userid,
                    type: type,
                },
                success: function(data, status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Operation completed successfully.',
                        confirmButtonColor: '#50211F',
                        confirmButtonText: 'OK',
                    });
                    displayData();
                }
            })
        }

        function changeUserState(userid, state) {
            $.ajax({
                url: "ajax/changeUserState.php",
                type: "POST",
                data: {
                    userid: userid,
                    state: state,
                },
                success: function(data, status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Operation completed successfully.',
                        confirmButtonColor: '#50211F',
                        confirmButtonText: 'OK',
                    });
                    displayData();
                }
            })
        }
        </script>


        <script src="./assets/plugins/datatables/js/jquery.dataTables.min.js"></script>

        <!-- Init files -->
        <script src="./assets/js/plugins-init/datatables.init.js"></script>
        <!-- form plugins -->

        <!-- Jquery Validation -->
        <script src="./assets/plugins/jquery-validation/jquery.validate.min.js"></script>
        <!-- Form step -->
        <script src="./assets/plugins/jquery-steps/build/jquery.steps.min.js"></script>
        <script src="./assets/plugins/jquery-validation/jquery.validate.min.js"></script>
        <!-- Form validate init -->
        <script src="./assets/js/plugins-init/jquery.validate-init.js"></script>
        <!-- Dropify -->
        <script src="./assets/plugins/dropify/dist/js/dropify.min.js"></script>
        <!-- Typeahead -->
        <script src="./assets/plugins/typeahead.js/dist/typeahead.jquery.min.js"></script>
        <script src="./assets/plugins/typeahead.js/dist/typeahead.bundle.min.js"></script>
        <script src="./assets/plugins/typeahead.js/dist/bloodhound.min.js"></script>
        <!-- Tagsinput -->
        <script src="./assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <!-- Switchery -->
        <script src="./assets/plugins/innoto-switchery/dist/switchery.min.js"></script>
        <!-- Select 2 -->
        <script src="./assets/plugins/select2/js/select2.full.min.js"></script>
        <!-- Touchspinner -->
        <script src="./assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
        <!-- Input mask -->
        <script src="./assets/plugins/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
        <!-- x-editable -->
        <script src="./assets/plugins/moment/moment.min.js"></script>
        <script src="./assets/plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <!-- Summernote -->
        <script src="./assets/plugins/summernote/js/summernote.min.js"></script>
        <!-- Daterangepicker -->
        <!-- momment js is must -->
        <!-- <script src="../../assets/plugins/moment/moment.min.js"></script> -->
        <script src="./assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- clockpicker -->
        <script src="./assets/plugins/moment/moment.min.js"></script>
        <script src="./assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <!-- asColorPicker -->
        <!-- momment js is must -->
        <!-- <script src="../../assets/plugins/moment/moment.min.js"></script> -->
        <script src="./assets/plugins/jquery-asColor/jquery-asColor.min.js"></script>
        <script src="./assets/plugins/jquery-asGradient/jquery-asGradient.min.js"></script>
        <script src="./assets/plugins/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
        <!-- Material color picker -->
        <!-- momment js is must -->
        <!-- <script src="../../assets/plugins/moment/moment.min.js"></script> -->
        <script src="./assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
        </script>





        <!--  block ui-->
        <script src="./assets/plugins/block-ui/jquery.blockUI.js"></script>
        <!-- Form step init -->
        <script src="./assets/js/plugins-init/jquery-steps-init.js"></script>
        <!-- Dropify init -->
        <script src="./assets/js/plugins-init/dropify-init.js"></script>
        <!-- Typeahead init -->
        <script src="./assets/js/plugins-init/typehead.js-init.js"></script>
        <!-- Tagsinput init -->
        <script src="./assets/js/plugins-init/bootstrap-tagsinput-init.js"></script>
        <!-- Switchery init -->
        <script src="./assets/js/plugins-init/switchery-init.js"></script>
        <!-- Select 2 init -->
        <script src="./assets/js/plugins-init/select2-init.js"></script>
        <!-- Touchspinner init -->
        <script src="./assets/js/plugins-init/bootstrap-touchpin-init.js"></script>
        <!-- x-editable init -->
        <script src="./assets/js/plugins-init/bootstrap-editable-init.js"></script>
        <!-- Summernote init -->
        <script src="./assets/js/plugins-init/summernote-init.js"></script>
        <!-- Daterangepicker -->
        <script src="./assets/js/plugins-init/bs-daterange-picker-init.js"></script>
        <!-- Clockpicker init -->
        <script src="./assets/js/plugins-init/clock-picker-init.js"></script>
        <!-- asColorPicker init -->
        <script src="./assets/js/plugins-init/jquery-asColorPicker.init.js"></script>
        <!-- Material color picker init -->
        <script src="./assets/js/plugins-init/material-date-picker-init.js"></script>
        <!-- Pickdate -->
        <script src="./assets/js/plugins-init/pickadate-init.js"></script>


        <!-- all init -->
        <!-- All init script -->
        <script src="./assets/js/plugins-init/components-init.js"></script>