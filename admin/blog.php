<?php include "./includes/header.php"; ?>
<?php include "../config/config.php" ?>
<?php include "../libs/App.php" ?>
<?php
if(!isset($_SESSION['username'])){
     echo "<script>window.location.href='http://localhost/trade/index.php'</script>";
}

 ?>

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



<!-- perform the crud here -->
<?php
$app=new App;
// get the counts every month
// Retrieve the monthly post counts
$postCounts = $app->table_count_month('posts');

// Retrieve the monthly comment counts
$commentCounts = $app->table_count_month('comments');

// Define month names
$monthNames = array(
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
);

// Generate JavaScript code for the data points of posts
$postDataPoints = [];
foreach ($postCounts as $key => $count) {
    $monthName = $monthNames[$key];
    $postDataPoints[] = "{ label: '$monthName', y: $count }";
}
$postDataPointsJS = implode(',', $postDataPoints);

// Generate JavaScript code for the data points of comments
$commentDataPoints = [];
foreach ($commentCounts as $key => $count) {
    $monthName = $monthNames[$key];
    $commentDataPoints[] = "{ label: '$monthName', y: $count }";
}
$commentDataPointsJS = implode(',', $commentDataPoints);


?>


<body>

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
                        <p class="mb-0">welcome to dashboard

                            <?php                  
                                    if (isset($_SESSION['username'])) {
                                        // User logged in via normal login
                                        $username = $_SESSION['username'];
                                        echo $username;
                                        // Rest of your code for normal login
                                    } elseif (isset($_SESSION['name'])) {
                                        // User logged in via Google login
                                        $name = $_SESSION['name'];
                                        echo $name;
                                        // Rest of your code for Google login
                                    } else {
                                        // User not logged in
                                        // Handle the case when no session variable is set
                                    }
                                    ?>
                    </div>
                    <div class="col-xl-9 col-xxl-9 col-lg-8 mt-4 mt-lg-0">
                    </div>

                </div>
                <!-- the row to display the grid -->
                <div class="row">
                    <div class="col-xl-6 col-xxl-12" id="displayDataGrid">
                        <!-- the grid data here -->


                    </div>


                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Customer Interactions

                                    <?php
                                include "./includes/post_interaction_graph.php";
                                ?>
                            </div>
                        </div>
                    </div>


                </div>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card" style="background-color: #50211F !important;">
                            <div class="card-body">
                                <h4 class="card-title" style="color:white !important">Content Rating</h4>
                                <div class="custom-tab-1">
                                    <div class="tab-content tab-content-default">
                                        <div class="tab-pane fade active show" id="success1" role="tabpanel">
                                            <div class="row justify-content-between"
                                                style="background-color: #A26D61 !important; color: white;">
                                                <!-- Include Google Charts library -->

                                                <script type="text/javascript"
                                                    src="https://www.gstatic.com/charts/loader.js"></script>
                                                <script type="text/javascript">
                                                google.charts.load('current', {
                                                    packages: ['corechart']
                                                });
                                                google.charts.setOnLoadCallback(drawChart);

                                                function drawChart() {
                                                    var data = new google.visualization.DataTable();
                                                    data.addColumn('string', 'Category');
                                                    data.addColumn('number', 'Comments');

                                                    // Fetch all categories
                                                    var categories = [
                                                        <?php
                                                          $query = "SELECT * FROM category";
                                                          $all_categories = $app->select_all($query);
                                          
                                                          $data_array = [];
                                          
                                                          foreach ($all_categories as $one_category) {
                                                              $category_title = $one_category->cat_title;
                                                              $category_id = $one_category->cat_id;
                                          
                                                              // Get count of comments for the current category's posts
                                                              $query = "SELECT COUNT(*) AS comment_count FROM comments WHERE comment_post_id IN (SELECT post_id FROM posts WHERE post_category_id=:category_id)";
                                                              $params = [':category_id' => $category_id];
                                                              $result = $app->selectOne($query, $params);
                                          
                                                              if ($result) {
                                                                  $comment_count = (int)$result->comment_count;
                                                              } else {
                                                                  $comment_count = 0;
                                                              }
                                          
                                                              $data_array[] = "['$category_title', $comment_count]";
                                                          }
                                          
                                                          echo implode(',', $data_array);
                                                          ?>
                                                    ];

                                                    data.addRows(categories);

                                                    var options = {
                                                        title: 'Customer interactions',
                                                        theme: 'light2',
                                                        vAxes: {
                                                            0: {
                                                                title: 'Number of Comments',
                                                                textStyle: {
                                                                    fontSize: 12 // You can adjust the font size here
                                                                }
                                                            }
                                                        },
                                                        hAxis: {
                                                            title: 'Category',
                                                            textStyle: {
                                                                fontSize: 12 // You can adjust the font size here
                                                            }
                                                        },
                                                        chartArea: {
                                                            width: '80%',
                                                            height: '70%'
                                                        },
                                                        series: {
                                                            0: {
                                                                type: 'bars',
                                                                color: '#50211F'
                                                            } // Bars for Comments
                                                        }
                                                    };

                                                    var chart = new google.visualization.ColumnChart(document
                                                        .getElementById('barchart'));
                                                    chart.draw(data, options);
                                                }
                                                </script>
                                                <div id="barchart" style="height: 300px; width: 100%;"></div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" id="displayUsersOnline">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-xxl-5">
                        <?php
                        $app=new App;
                        $tableName = 'comments';
                        $comments_today = $app->getTableCountForToday($tableName);
                        // messages for today
                         $tableName = 'messages';
                        $messages_today = $app->getTableCountForToday($tableName);
                        // posts added
                         $tableName = 'posts';
                        $posts_today = $app->getTableCountForToday($tableName);
                         $tableName = 'users';
                        $users_today = $app->getTableCountForToday($tableName);
                        $tableName = 'category';
                        $category_today = $app->getTableCountForToday($tableName);
                        

                        
                        
                        
                        ?>
                        <div class="card" style="background-color:#A26D61;">
                            <div class="card-body">
                                <h4 class="card-title" style="color:white !important;">Timeline Comments</h4>
                                <div id="timeline-activity">
                                    <ul class="timeline mb-0">
                                        <li>
                                            <div class="timeline-badge bg-primary"></div>
                                            <a href="#" class="timeline-panel">
                                                <span style="color:whitesmoke !important;">Today</span>
                                                <h5 class="mt-2" style="color:white !important;">
                                                    <?php echo $comments_today ?> comments Recieved
                                                </h5>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge bg-success"></div>
                                            <a href="#" class="timeline-panel">
                                                <span style="color:whitesmoke !important;">Today</span>
                                                <h5 class="mt-2" style="color:white !important;">
                                                    <?php echo $posts_today ?> posts
                                                    created
                                                </h5>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge bg-warning"></div>
                                            <a href="#" class="timeline-panel">
                                                <span style="color:whitesmoke !important;">Today</span>
                                                <h5 class="mt-2" style="color:white !important;">
                                                    <?php echo $messages_today; ?> New Messages</h5>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge bg-warning"></div>
                                            <a href="#" class="timeline-panel">
                                                <span style="color:whitesmoke !important;">Today</span>
                                                <h5 class="mt-2" style="color:white !important;">
                                                    <?php echo $category_today ?> New Categories</h5>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge bg-pink"></div>
                                            <a href="#" class="timeline-panel">
                                                <span style="color:whitesmoke !important;">Today</span>
                                                <h5 class="mt-2" style="color:white !important;">
                                                    <?php echo $users_today ?> Users Registered Today
                                                </h5>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-xxl-7">
                        <?php
                        $query="SELECT * FROM users ORDER BY created_at DESC LIMIT 5";
                        $recent_users=$app->select_all($query);   
                        ?>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Latest User Registrations</h4>
                                <div id="ticket">
                                    <?php foreach($recent_users as $recent_user):?>
                                    <div class="media border-bottom pt-3 pb-3">
                                        <strong>#45458</strong>
                                        <div class="media-body ml-3">
                                            <a href="#">
                                                <h5 class="text-danger"><?php echo $recent_user->user_name?></h5>
                                                <?php 
                                                $timestamp = $recent_user->created_at; // Replace this with your timestamp variable

                                                $formattedDate = date('M d, Y (h:i A)', strtotime($timestamp));
                                                ?>

                                                <p class="mb-0">Registered on:
                                                    <span><?php echo $formattedDate; ?></span>
                                                </p>
                                            </a>
                                        </div>
                                        <!-- user status -->
                                        <?php if($recent_user->user_state =='allowed'):?>
                                        <span class="badge badge-success">Allowed</span>
                                        <?php else: ?>
                                        <span class="badge badge-warning">Forbidden</span>
                                        <?php endif; ?>


                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        $query="SELECT * FROM posts ORDER BY created_at DESC LIMIT 6";
                        $recent_posts=$app->select_all($query);   
                  ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card top_menu_widget bg-dark text-white">
                            <div class="card-body">
                                <h4 class="card-title text-light">Latest Posts</h4>
                                <?php foreach($recent_posts as $recent_post):?>
                                <div class="media border-bottom pt-3 pb-3">
                                    <img width="50" height="50" alt="#" class="mr-3"
                                        src="http://localhost/trade/assets/images/<?php echo $recent_post->post_image;?>">
                                    <div class="media-body">
                                        <h5 class="mb-1 mt-sm-1 mt-0 text-light"><?php echo $recent_post->post_title;?>
                                        </h5>
                                        <?php 
                                        // category id
                                        $cat_id=$recent_post->post_category_id;
                                        // to get he category
                                        $query="SELECT * FROM category WHERE cat_id='$cat_id'";
                                         $categories=$app->select_all($query);
                                        foreach($categories as $category){
                                            $category_title=$category->cat_title;
                                        }
                                      ?>
                                        <span>Category: <?php echo $category_title?></span>
                                    </div>
                                    <?php if($recent_post->post_status =="draft"):?>
                                    <h5 class="badge-lighten-warning">Draft</h5>
                                    <?php  else: ?>
                                    <h5 class="badge-lighten-success">Published</h5>
                                    <?php endif; ?>


                                </div>
                                <?php endforeach; ?>
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
    <div class="footer">
        <div class="copyright">
            <p><a href="#">Joshua</a></p>
        </div>
    </div>
    <!--**********************************
            Footer end
        ***********************************-->


    <!--**********************************
            Right sidebar start
        ***********************************-->
    <?php require "./includes/right_sidebar.php" ?>

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
    // jquery

    // displaying data
    $(document).ready(() => {
        displayData();
        displayUsersOnline()


    });


    function displayData() {
        let displayGrid = "true";
        $.ajax({
            url: "ajax/displaygrid.php",
            type: 'POST',
            data: {
                displayGrid: displayGrid,
            },
            success: function(data, status) {
                // Update the content of the modal with the retrieved data
                $('#displayDataGrid').html(data);
            },
        });
    }

    function displayUsersOnline() {
        let displayUsersOnlinenow = "true";
        $.ajax({
            url: "ajax/function.php",
            type: "POST",
            data: {
                displayUsersOnlinenow: displayUsersOnlinenow
            },
            success: (data, status) => {
                $("#displayUsersOnline").html(data)

            }
        })
    }
    </script>
    <!-- !-- canva js  -->
    <?php include "./includes/footer_links.php" ?>
    <!--  -->