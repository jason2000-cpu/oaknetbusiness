<?php include "../includes/header.php"; ?>
<?php include "../../config/config.php" ?>
<?php include "../../libs/App.php" ?>
<?php
$app = new App;
$query = "SELECT * FROM posts";
$post_count = $app->count($query);

// comments
$query = "SELECT * FROM comments";
$comment_count = $app->count($query);

// category
$query = "SELECT * FROM category";
$category_count = $app->count($query);

// users
$query = "SELECT * FROM users";
$user_count = $app->count($query);

// growth section
// for comments
$table = 'comments';
$comment_growth = $app->calculateMonthlyGrowth($table);
$commentgrowthPercentage = $comment_growth['growth'];
$commentIncrement = $comment_growth['isIncrement'];
// for posts
$table = 'posts';
$post_growth = $app->calculateMonthlyGrowth($table);
$postgrowthPercentage = $comment_growth['growth'];
$postIncrement = $comment_growth['isIncrement'];
// categories
$table = 'category';
$category_growth = $app->calculateMonthlyGrowth($table);
$categorygrowthPercentage = $comment_growth['growth'];
$categoryIncrement = $comment_growth['isIncrement'];
// users
$table = 'users';
$post_growth = $app->calculateMonthlyGrowth($table);
$usergrowthPercentage = $comment_growth['growth'];
$userIncrement = $comment_growth['isIncrement'];

?>
<?php if(isset($_POST['displayGrid'])): ?>
<div class="row">
    <div class="col-sm-6 col-xxl-6 col-xl-6">
        <div class="card" style=" background-color:#50211F !important;">
            <div class="card-body pb-0">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4 class="text-muted mb-3">Posts</h4>
                    </div>
                    <div class="col-auto">
                        <!-- count the number of posts -->

                        <h2 style="color: white !important;"><span id="post-count"><?php echo $post_count ?></span></h2>
                    </div>
                </div>
                <div>
                    <?php if($postIncrement ===true): ?>
                    <span class="text-success"><i class="mdi mdi-arrow-up-bold"></i>
                        <?php echo  ceil($postgrowthPercentage) . "%"?>

                    </span>
                    <?php elseif($postIncrement===false): ?>
                    <span class="text-warning"><i class="mdi mdi-arrow-down-bold"></i>
                        <?php echo ceil($postgrowthPercentage) ."%"?>
                    </span>

                    <?php endif; ?>
                    <p> Since last month</p>
                </div>
            </div>
            <div class="chart-wrapper">
                <div id="home_chart_widget_4" class="home_chart_widget chart-four"></div>
            </div>

        </div>
    </div>
    <div class="col-sm-6 col-xxl-6 col-xl-6">
        <div class="card" style=" background-color:#070606 !important;">
            <div class="card-body pb-0">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4 class="text-muted mb-3">Comments</h4>
                    </div>
                    <div class="col-auto">
                        <h2 style="color: white !important;"> <span
                                id="comment-count"><?php echo $comment_count ?></span>
                        </h2>
                    </div>
                </div>
                <div>
                    <?php if($commentIncrement ===true): ?>
                    <span class="text-success"><i class="mdi mdi-arrow-up-bold"></i>
                        <?php echo  ceil($commentgrowthPercentage) ."%"?>

                    </span>
                    <?php elseif($commentIncrement===false): ?>
                    <span class="text-warning"><i class="mdi mdi-arrow-down-bold"></i>
                        <?php echo  ceil($commentgrowthPercentage) ."%"?>
                    </span>

                    <?php endif; ?>
                    <p> Since last month</p>
                </div>
            </div>
            <div class="chart-wrapper">
                <div id="home_chart_widget_4" class="home_chart_widget chart-four"></div>
            </div>

        </div>
    </div>
    <div class="col-sm-6 col-xxl-6 col-xl-6">
        <div class="card" style=" background-color:#A26D61  !important;">
            <div class="card-body pb-0">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4 class="text-muted mb-3">Categories</h4>
                    </div>
                    <div class="col-auto">
                        <h2 style="color: white !important;"><span
                                id="category-count"><?php echo $category_count; ?></span>
                        </h2>
                    </div>
                </div>
                <div>
                    <?php if($categoryIncrement ===true): ?>
                    <span class="text-success"><i class="mdi mdi-arrow-up-bold"></i>
                        <?php echo  ceil($categorygrowthPercentage)."%"?>


                    </span>
                    <?php elseif($categoryIncrement===false): ?>
                    <span class="text-warning"><i class="mdi mdi-arrow-down-bold"></i>
                        <?php echo ceil($categorygrowthPercentage) . "%"?>
                    </span>

                    <?php endif; ?>
                    <p> Since last month</p>
                </div>
            </div>
            <div class="chart-wrapper">
                <div id="home_chart_widget_4" class="home_chart_widget chart-four"></div>
            </div>

        </div>
    </div>
    <div class="col-sm-6 col-xxl-6 col-xl-6">
        <div class="card">
            <div class="card-body pb-0">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4 class="text-muted mb-3">users</h4>
                    </div>
                    <div class="col-auto">
                        <h2><span id="user-count"><?php echo $user_count ?></span></h2>
                    </div>
                </div>
                <div>
                    <?php if($userIncrement ===true): ?>
                    <span class="text-success"><i class="mdi mdi-arrow-up-bold"></i>
                        <?php echo ceil($usergrowthPercentage)."%"?>


                    </span>
                    <?php elseif($userIncrement===false): ?>
                    <span class="text-warning"><i class="mdi mdi-arrow-down-bold"></i>
                        <?php echo  ceil($usergrowthPercentage) ."%"?>

                    </span>

                    <?php endif; ?>
                    <p> Since last month</p>
                </div>
            </div>
            <div class="chart-wrapper">
                <div id="home_chart_widget_4" class="home_chart_widget chart-four"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>