<?php include "./config/config.php" ?>
<?php include "./libs/App.php"; ?>
<?php include "./includes/header.php" ?>
<?php session_start() ?>
<?php
if(!isset($_SESSION['username'])){
     echo "<script>window.location.href='http://localhost/trade/index.php'</script>";
}



 ?>

<?php 
if(isset($_GET['p_id'])){
    $post_id=$_GET['p_id'];
    // echo $post_id;
    // query
    $app=new App;
    $query="SELECT * FROM posts WHERE post_id='{$post_id}'";
    $posts=$app->select_all($query);

    // 
}
// select from users
if(isset($_POST['create_comment'])){
$comment = $_POST['comment'];
$post_id = $_GET['p_id'];
$comment_author = $_SESSION['username'];
$status = "approved";

$query = "INSERT INTO comments(comment_post_id, comment_content, comment_author, comment_status) 
          VALUES(:id, :content, :author, :status)";
$arr = [
    ":id" => $post_id,
    ":content" => $comment,
    ":author" => $comment_author,
    ":status" => $status,
];
$app->insertWithoutPath($query, $arr);

}
$query="SELECT * FROM comments WHERE comment_post_id='{$post_id}'";
$comments=$app->select_all($query);
// count the comments
$query="SELECT * FROM comments WHERE comment_post_id='{$post_id}'";
$count_comments=$app->count($query);

?>

<body>


    <div class="me-main-wraper">

        <!-- main header -->
        <?php include "./includes/main_navigation.php" ?>
        <!-- breadcrumb -->
        <div class="me-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="me-breadcrumb-box">
                            <!-- title here -->
                            <h1> Posts</h1>
                            <p><a href="<?php echo APPURL?>/home.php">Home</a>Post</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Single-->
        <div class="me-blog-single me-padder-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($posts): ?>
                                <?php foreach($posts as $post): ?>
                                <div class="me-blog-box">

                                    <div class="me-blog-img">
                                        <a href="javascript:;"><img src="assets/images/<?php echo $post->post_image ?>"
                                                alt="image" class="img-fluid" /></a>
                                    </div>
                                    <div class="me-blog-single-content">
                                        <!-- get the post_category -->
                                        <?php 
                                        // category id
                                        $cat_id=$post->post_category_id;
                                        // to get he category
                                        $query="SELECT * FROM category WHERE cat_id='$cat_id'";
                                         $categories=$app->select_all($query);
                                        foreach($categories as $category){
                                            $category_title=$category->cat_title;
                                        }
                                      ?>

                                        <div class="me-blog-tags">
                                            <a href="javascript:;"><?php echo $post->post_tags; ?></a>
                                            <a href="javascript:;"><?php echo $category_title; ?></a>
                                            <a href="javascript:;"><?php echo $count_comments ?> Comments</a>
                                            <!-- format the date  -->
                                            <?php
                                               $formattedDate = date("Y-m-d", strtotime($post->created_at));
                            
                                          ?>

                                            <a href="javascript:;"><?php echo $formattedDate; ?></a>
                                        </div>
                                        <h4 class="me-blog-title"><?php echo $post->post_title?></h4>
                                        <div class="me-blog-content-body">
                                            <p><b>Introduction</b></p>

                                            <p><?php echo $post->post_content; ?></p>
                                            <!-- to perfom like and unlike section -->
                                            <blockquote>
                                                <i class="fas fa-quote-left"></i>
                                                <p><?php echo $post->post_tags ?></p>
                                            </blockquote>

                                            <div class="me-blog-social">
                                                <ul>
                                                    <li>comments:</li>
                                                    <li>
                                                        <a href="javascript:;"><?php echo $count_comments; ?>
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="me-blog-post-comment">
                                    <h4>Post your comments here</h4>
                                    <form method="post" action="">
                                        <textarea name="comment" placeholder="Message..."></textarea>
                                        <button type="submit" name="create_comment" class="me-btn">submit</button>
                                    </form>
                                </div>
                                <!-- reformating this div -->
                                <div class="me-bolg-comment">
                                    <h4>Comments</h4>
                                    <ul>
                                        <?php if($count_comments >0): ?>
                                        <?php foreach($comments as $comment):?>
                                        <li>
                                        </li>
                                        <div class="me-comment-main">
                                            <div class="me-comment-user">
                                                <!-- getting the image -->
                                                <!-- getting the image -->
                                                <?php 
                                                         $username = $comment->comment_author;
                                                         $query = "SELECT * FROM users WHERE user_name ='{$username}'";
                                                         $users = $app->select_all($query);
                                                     ?>

                                                <?php foreach($users as $user): ?>
                                                <?php 
                                                         $profilePicture = $user->user_profile;
                                                         
                                                         if (!empty($profilePicture)) {
                                                             if (strpos($profilePicture, 'https://') !== false) {
                                                                 // Profile picture is stored as an HTTPS URL
                                                                 echo '<a href="javascript:;"><img src="' . $profilePicture . '" alt="image" class="img-fluid" /></a>';
                                                             } else {
                                                                 // Profile picture is stored locally as a file path
                                                                 echo '<a href="javascript:;"><img src="assets/images/' . $profilePicture . '" alt="image" class="img-fluid" /></a>';
                                                             }
                                                             
                                                             // Code to display other user details
                                                         } else {
                                                             // No profile picture set, display a dark silhouette or placeholder image
                                                             echo '<a href="javascript:;"><img src="assets/images/dark-silhouette.png" alt="image" class="img-fluid" /></a>';
                                                         }
                                                       ?>
                                                <?php endforeach; ?>
                                            </div>




                                            <div class="me-comment-detail">
                                                <p class="me-comment-head"><a
                                                        href="javascript:;"><?php echo $comment->comment_author; ?>
                                                    </a>
                                                    <?php
                                                        $created_at = $comment->created_at;
                                    
                                                    ?>

                                                    <span><?php echo  $app->formatTimeAgo($created_at); ?></span>
                                                </p>

                                                <p><?php echo $comment->comment_content; ?>
                                                </p>
                                            </div>
                                        </div>
                                        </li>
                                        </li>
                                        <?php endforeach; ?>
                                        <?php endif ?>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="me-blog-sidebar">
                            <div class="me-widget me-widget-search">
                                <form action="search.php" method="post">
                                    <input type="text" name="search" placeholder="what are you looking for?" />
                                    <button type="submit" class="btn"
                                        style="color: white; background-color:#a0363b; margin-top: 0.5rem!important;"
                                        name="submit">search</button>
                                </form>
                            </div>
                            <div class="me-widget me-widget-category">

                                <h4 class="me-widget-title">Category</h4>
                                <!-- gettin all the categories from the db -->


                                <ul>
                                    <?php 
                                    $query=" SELECT * FROM category";
                                    $all_categories=$app->select_all($query);

                                    ?>
                                    <?php foreach($all_categories as $category): ?>

                                    <li>
                                        <?php
                                        $cat_id=$category->cat_id;
                                        // get all posts from this
                                        $query="SELECT * FROM posts WHERE post_category_id='{$cat_id}'";
                                        // then count 
                                        $posts_count=$app->count($query);
                                        
                                        
                                        ?>

                                        <a
                                            href='category.php?category=<?php echo $category->cat_id?>'><?php echo $category->cat_title; ?><span>(<?php echo $posts_count; ?>)</span></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="me-widget me-widget-recent-post">
                                <h4 class="me-widget-title">Recent Posts</h4>
                                <!-- getting the recent posts per created at -->
                                <?php
                                $query = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 2";
                                $all_posts = $app->select_all($query);
                                ?>
                                <ul>
                                    <?php foreach($all_posts as $post): ?>
                                    <li>
                                        <?php
                                        $postContent = $post->post_content;
                                        $truncatedContent = substr($postContent, 0, 100); ?>
                                        <a
                                            href="post.php?p_id=<?php echo $post->post_id;?>"><?php echo $truncatedContent;?></a>
                                        <?php
                                        $timestamp = $post->created_at; // Replace this with your timestamp variable

                                        $formattedDate = date('d M Y', strtotime($timestamp));

                                         ?>
                                        <a href="javascript:;" class="me-widget-date"><?php echo $formattedDate; ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="me-widget me-widget-instagram">
                                <h4 class="me-widget-title">Recent Posts</h4>

                                <?php
                                $query = "SELECT * FROM posts  LIMIT 6";
                                $post_images = $app->select_all($query);     
                                ?>
                                <ul>
                                    <?php foreach($post_images as $image): ?>
                                    <li>
                                        <a href="post.php?p_id=<?php echo $post->post_id;?>"><img
                                                src="assets/images/<?php echo $image->post_image;?>" class="img-fluid"
                                                alt="image"></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="me-widget me-widget-tag">
                                <h4 class="me-widget-title">Tag Cloud</h4>
                                <?php
                                 $query=" SELECT * FROM category";
                                 $all_categories=$app->select_all($query);   
                                ?>
                                <ul>
                                    <?php foreach($all_categories as $category): ?>
                                    <li>
                                        <a
                                            href='category.php?category=<?php echo $category->cat_id?>'><?php  echo $category->cat_title; ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "./includes/patners.php"; ?>

        <?php include "./includes/footer.php" ?>

    </div>
    <?php include "./includes/footer_links.php" ?>

    <?php include "./includes/footer_links.php" ?>
</body>

</html>