<?php 
$app=new App;
$query ="SELECT * FROM posts";
$posts=$app->select_all($query);

?>




<!-- Blog -->
<div class="me-blog me-padder-top-less me-padder-bottom">
    <div class="container">
        <div class="me-heading2">
            <h4>See our</h4>
            <h1>Latest Report Blogs</h1>
        </div>
        <div class="row">
            <?php 
             $app=new App;
             $query ="SELECT * FROM posts";
             $count=$app->select_all($query);
             
             ?>

            <?php if($count > 0): ?>
            <?php foreach ($posts as $post): ?>
            <div class="col-lg-4 col-md-6">
                <div class="me-blog-box">
                    <div class="me-blog-img">
                        <a href="post.php?p_id=<?php echo $post->post_id;?>"><img
                                src="assets/images/<?php echo $post->post_image ?>" alt="image" class="img-fluid" /></a>
                    </div>
                    <div class="me-blog-content">
                        <div class="me-blog-tags">
                            <a href="post.php?p_id=<?php echo $post->post_id;?>"><?php echo $post->post_author ?></a>
                            <!-- format the date first -->
                            <?php
                             $formattedDate = date("Y-m-d", strtotime($post->created_at));
                            
                             ?>

                            <?php echo  $formattedDate;?>
                        </div>
                        <h4 class="me-blog-title">
                            <a href="post.php?p_id=<?php echo $post->post_id;?>"><?php echo $post->post_title ?></a>
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
            <?php endforeach ; ?>
            <?php else: ?>
            <div>
                <h2> Ooops <i class="far fa-sad-cry"></i> No Posts Added Yet</h2>
                <?php endif; ?>

            </div>
        </div>
    </div>