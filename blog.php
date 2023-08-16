<?php include "./config/config.php" ?>
<?php include "./libs/App.php"; ?>
<?php include "./includes/header.php" ?>
<?php
$app=new App;
// select every from the posts
$query ="SELECT * FROM posts";
$posts=$app->select_all($query);
// to count all posts
$query="SELECT * FROM posts";
$post_count=$app->count($query);





?>

<body>
    <div class="me-main-wraper">
        <?php  include "./includes/main_navigation.php" ?>
        <!-- breadcrumb -->
        <div class="me-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="me-breadcrumb-box">
                            <h1>Blog</h1>
                            <p><a href="index-2.html">Home</a> Blog Reports</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog -->
        <div class="me-blog-grid me-padder-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <?php if($post_count > 0): ?>
                            <?php foreach ($posts as $post): ?>
                            <div class="col-md-6">
                                <div class="me-blog-box">
                                    <div class="me-blog-img">
                                        <a href="post.php?p_id=<?php echo $post->post_id;?>"><img
                                                src="assets/images/<?php echo $post->post_image ?>" alt="image"
                                                class="img-fluid" /></a>
                                    </div>
                                    <div class="me-blog-content">
                                        <div class="me-blog-tags">
                                            <a
                                                href="post.php?p_id=<?php echo $post->post_id;?>"><?php echo $post->post_author ?></a>
                                            <!-- format the date first -->
                                            <?php
                                         $formattedDate = date("Y-m-d", strtotime($post->created_at));
                            
                             ?>

                                            <?php echo  $formattedDate;?>
                                        </div>
                                        <h4 class="me-blog-title">
                                            <a
                                                href="post.php?p_id=<?php echo $post->post_id;?>"><?php echo $post->post_title ?></a>
                                        </h4>
                                        <div class="me-blog-category">
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

                                            <?php echo $category_title ?>
                                            <?php 
                                             $post_id=$post->post_id;
                                             $query="SELECT * FROM comments WHERE comment_post_id='{$post_id}'";
                                             $count_comments=$app->count($query);
                                               ?>
                                            <?php echo $count_comments. " "."comments"; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <h2> Ooops <i class="far fa-sad-cry"></i> No Posts Added Yet</h2>
                            <?php endif; ?>
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
                                            href="category.php?category=<?php echo $category->cat_id?>"><?php echo $category->cat_title; ?><span>(<?php echo $posts_count; ?>)</span></a>
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
                                        <a href="post.php?p_id=<?php echo $post->post_id;?>"
                                            class="me-widget-date"><?php echo $formattedDate; ?></a>
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
                                            href="category.php?category=<?php echo $category->cat_id?>"><?php  echo $category->cat_title; ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "./includes/patners.php" ?>
        <?php include "./includes/footer.php" ?>


    </div>
    <?php include "./includes/footer_links.php" ?>
</body>

</html>