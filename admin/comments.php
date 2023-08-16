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
                     $app=new App;
                     $query="SELECT * FROM comments";
                     $comments=$app->select_all($query);
                     
                     
                     // count posts
                     $query="SELECT * FROM comments";
                     $comments_count=$app->count($query);

                     
                     
                     
                     
                     
                     ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <h2 style="color:white;">Comments</h2>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display table-responsive-xl"
                                            style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Comment Post Id</th>
                                                    <th scope="col">Comment Content</th>
                                                    <th scope="col">Comment Status</th>
                                                    <th scope="col">Created At</th>
                                                    <th scope="col">In Response To</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($comments_count > 0): ?>
                                                <?php foreach ($comments as $comment ): ?>
                                                <tr>

                                                    <td><?php echo $comment->comment_id; ?></td>
                                                    <td><?php echo $comment->comment_post_id; ?></td>
                                                    <td><?php echo substr($comment->comment_content,0,50); ?></td>
                                                    <!-- color of the badge depending ont he status -->
                                                    <?php if($comment->comment_status =='approved'): ?>
                                                    <td><span class="badge badge-xs badge-success">Approved</span>
                                                        <?php else: ?>
                                                    <td><span class="badge badge-xs badge-primary">Unapproved</span>
                                                        <?php endif; ?>
                                                        <!-- end of the check -->
                                                        <?php  
                                                        $formattedDate = date("Y-m-d", strtotime($comment->created_at));
                                                        ?>
                                                    <td><?php echo $formattedDate ?></td>
                                                    <!-- get the post in the comment is in response to  -->
                                                    <?php 
                                                    $comment_post_id=$comment->comment_post_id;
                                                    $query="SELECT * FROM posts WHERE post_id='$comment_post_id'";
                                                    $posts_related=$app->select_all($query);
                                                    ?>
                                                    <?php foreach($posts_related as $post_related ): ?>
                                                    <td><?php echo $post_related->post_title ?></td>
                                                    <?php endforeach; ?>
                                                    <td>
                                                        <span>
                                                            <a href='comments.php?approve=<?php echo $comment->comment_id;?>'
                                                                class="approve" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Approve"><i
                                                                    class="fa-solid fa-eye"></i></a>
                                                            <a href='comments.php?unaprove=<?php echo $comment->comment_id?>'
                                                                class="unaprove" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Unapprove"><i
                                                                    class="fa-solid fa-eye-slash"></i> </a>
                                                            <a href='comments.php?delete=<?php echo $comment->comment_id ?>'
                                                                data-original-title="Close" class="delete-comment"><i
                                                                    class="fa-solid fa-trash color-danger"></i></a>

                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <td>No comments available Yet.</td>
                                                <?php endif; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if(isset($_GET['approve'])){
                    $comment_id=$_GET['approve'];
                    $status='approved';
                     $app = new App;
                     $query="UPDATE comments SET comment_status = :status WHERE comment_id = :id";
                     $arr=[
                        ":status"=>$status,
                        ":id"=>$comment_id,   
                       ];
                      //  if succesiful
                      $path="http://localhost/trade/admin/comments.php";
                       $app->update($query,$arr,$path);
                    }   
                        // unapprove the comment
                    if(isset($_GET['unaprove'])){
                    $comment_id=$_GET['unaprove'];
                    $status='unapproved';
                     $app = new App;
                     $query="UPDATE comments SET comment_status = :status WHERE comment_id = :id";
                     $arr=[
                        ":status"=>$status,
                        ":id"=>$comment_id,   
                       ];
                      //  if succesiful
                      $path="http://localhost/trade/admin/comments.php";
                       $app->update($query,$arr,$path);
                    }                  
                ?>
                <?php 
                     if (isset($_GET['delete'])) {
                       $comment_id = $_GET['delete'];
                       $app = new App;
                       $query = "DELETE FROM comments WHERE comment_id = '{$comment_id}'";
                       $path='http://localhost/trade/admin//comments.php';
                       $app->delete($query,$path);
                       
                   }
                   
                   ?>
                <script>
                $(document).ready(function() {
                    $('.delete-comment').on('click', function(e) {
                        e.preventDefault();
                        var deleteUrl = $(this).attr('href');

                        // Prompt the user for confirmation
                        if (confirm("Are you sure you want to delete this post?")) {
                            // Make an AJAX request to delete the post
                            $.ajax({
                                url: deleteUrl,
                                method: 'GET',
                                success: function(response) {
                                    // Handle success response, if needed
                                    console.log('Post deleted successfully');
                                    // Reload the page or update the UI as required
                                },
                                error: function(xhr, status, error) {
                                    // Handle error response, if needed
                                    console.log(
                                        'An error occurred while deleting the post');
                                }
                            });
                        }
                    });
                    $('.approve').on('click', function(e) {
                        e.preventDefault();
                        var approveUrl = $(this).attr('href');

                        // Prompt the user for confirmation
                        if (confirm("Are you sure you want to approve this post?")) {
                            // Make an AJAX request to delete the post
                            $.ajax({
                                url: approveUrl,
                                method: 'GET',
                                success: function(response) {
                                    // Handle success response, if needed
                                    console.log('Post aprroved succesifuly');
                                    // Reload the page or update the UI as required
                                },
                                error: function(xhr, status, error) {
                                    // Handle error response, if needed
                                    console.log(
                                        'An error occurred while approving the post');
                                }
                            });
                        }
                    });
                    $('.unaprove').on('click', function(e) {
                        e.preventDefault();
                        var unapproveUrl = $(this).attr('href');

                        // Prompt the user for confirmation
                        if (confirm("Are you sure you want to unapprove this post?")) {
                            // Make an AJAX request to delete the post
                            $.ajax({
                                url: unapproveUrlUrl,
                                method: 'GET',
                                success: function(response) {
                                    // Handle success response, if needed
                                    console.log('Post unapproved successfully');
                                    // Reload the page or update the UI as required
                                },
                                error: function(xhr, status, error) {
                                    // Handle error response, if needed
                                    console.log(
                                        'An error occurred while unapproving the post');
                                }
                            });
                        }
                    });
                });
                </script>
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

        <!-- custom footer links for this page only -->
        <script src="./assets/plugins/common/common.min.js"></script>
        <script src="./assests/js/custom.min.js"></script>
        <script src="./assests/js/settings.js"></script>
        <script src="./assests/js/quixnav.js"></script>
        <script src="./assests/js/styleSwitcher.js"></script>


        <!-- Datatable -->
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
        <!-- pickdate -->
        <script src="./assets/plugins/pickadate/picker.js"></script>
        <script src="./assets/plugins/pickadate/picker.time.js"></script>
        <script src="./assets/plugins/pickadate/picker.date.js"></script>






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