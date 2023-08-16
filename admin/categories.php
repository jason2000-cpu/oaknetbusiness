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
                                <div class="col-xl-9 col-xxl-9 col-md-9 col-sm-12">
                                    <div class="card">
                                        <h2 style="color:white;">All Posts</h2>
                                        <div class="card-body">
                                            <div class="table-responsive" id="displayDataTable">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-xxl-3 col-md-3 col-sm-12">
                                    <button class="btn btn-lg"
                                        style="color:white!important;background-color:#50211F!important;"
                                        data-bs-toggle="modal" data-bs-target="#addingModal">Add
                                        category</button>
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- add item modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="addingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="category"
                                            placeholder="Add Category">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-lg" data-bs-dismiss="modal"
                                        style="background-color:black!important;color:white;">Close</button>
                                    <button type="button" class="btn btn-lg"
                                        style="background-color: #50211F!important;color:white;"
                                        onclick="addCategory()">Add category</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- update modal -->


                    <!-- The modal form for updating data -->




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
                    url: "ajax/displaycategories.php",
                    type: 'POST',
                    data: {
                        displayData: displayData,
                    },
                    success: function(data, status) {
                        // Update the content of the modal with the retrieved data
                        $('#displayDataTable').html(data);
                    },
                });
            }
            // delete record
            function deleteCategory(deleteid) {
                $.ajax({
                    url: "ajax/delete_category.php",
                    type: "POST",
                    data: {
                        deletesend: deleteid
                    },
                    success: function(data, status) {
                        Swal.fire(
                            'Nice one',
                            'Category Deleted successfully!',
                            'success'
                        );
                        displayData();
                    }
                });
            }

            function updateCategory(updateid) {
                let categoryupdate = $('#UpdateCategory').val();
                let modalClass = ".updatingModal_" + updateid;

                $.ajax({
                    url: "ajax/update_category.php",
                    type: "POST",
                    data: {
                        updatesend: updateid,
                        categoryupdate: categoryupdate
                    },
                    success: function(data, status) {
                        // Use the unique modal ID to hide the correct modal
                        $(modalClass).modal('hide');
                        Swal.fire(
                            'Nice one',
                            'Category updated successfully!',
                            'success'
                        );
                        displayData();
                    }
                });
            }

            function addCategory() {
                let categoryAdd = $('#category').val();
                $.ajax({
                    url: "ajax/add_category.php",
                    type: 'POST',
                    data: {
                        categoryAdd: categoryAdd,
                    },
                    success: function(data, status) {
                        $('#addingModal').modal('hide');
                        Swal.fire(
                            'Nice one',
                            'Category added successfully!',
                            'success'
                        );
                        displayData();
                    }
                });
            }
            </script>