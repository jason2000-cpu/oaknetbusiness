<?php
if(isset($_GET['p_id'])){
    $post_id=$_GET['p_id'];
    

    // select everything from posts
    $app=new App;
    $query="SELECT * FROM posts WHERE post_id='{$post_id}'";
    $posts=$app->select_all($query);
      // post authors
         $query=" SELECT * FROM users WHERE user_type ='admin'";
         $authors=$app->select_all($query);
         //   category
         $query=" SELECT * FROM category";
         $categories=$app->select_all($query);
    // 
    if(isset($_POST['update_post'])){
        $post_title=$_POST['post_title'];
        $post_tags=$_POST['post_tags'];
        $post_status=$_POST['post_status'];
        $post_author=$_POST['post_author'];
        $post_category_id=$_POST['post_category_id'];
        $post_content=$_POST['post_content'];
        

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($post_image_temp, "../assets/images/$post_image");
        

    //  the query here
            $query = "UPDATE posts SET 
            post_title = :post_title,
            post_tags = :post_tags,
            post_status = :post_status,
            post_author = :post_author,
            post_category_id = :post_category_id,
            post_image=:post_image,
            post_content = :post_content
          WHERE post_id = :post_id";
           $arr = [
               ":post_title" => $post_title,
               ":post_tags" => $post_tags,
               ":post_status" => $post_status,
               ":post_author" => $post_author,
               ":post_category_id" => $post_category_id,
               ":post_image" => $post_image,
               ":post_content" => $post_content,
               ":post_id" => $post_id
           ];
           $path='http://localhost/trade/admin//posts.php';
           
          
           $app->update($query, $arr,$path);



    }

}

?>




<div class="container-fluid">
    <?php foreach($posts as $post): ?>
    <form method="post" action="" enctype="multipart/form-data">
        <h2 style="color:white !important;">Edit Post</h2>
        <div class="row">
            <div class="col-xl-12">
                <h4 class="card-title mt-5" style="color:white !important;">Post Title</h4>
                <div class="form-group">
                    <input type="text" value='<?php echo $post->post_title; ?>' name="post_title"
                        class="form-control input-rounded" placeholder="Post title">
                </div>
                <h4 class="card-title mt-5" style="color:white !important;">Post Tag</h4>
                <div class="form-group">
                    <input name="post_tags" type="text" value='<?php echo $post->post_tags ?>'
                        class="form-control input-rounded" placeholder="post tag">
                </div>
                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">Post Author</h4>
                    <select name="post_author" class="form-control">
                        <?php foreach ($authors as $author) : ?>
                        <option style="width: auto;" value='<?php echo $author->user_name;?>'>
                            <?php echo $author->user_name;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">Post Status</h4>
                    <select name="post_status" class="form-control">

                        <option style="width: auto;" value='published'>published
                        </option>
                        <option style="width: auto;" value='draft'>draft
                        </option>

                    </select>
                </div>


                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">Post Category</h4>
                    <select name="post_category_id" class="form-control">
                        <?php foreach ($categories as $category) : ?>
                        <option style="width: auto;" value='<?php echo $category->cat_id;?>'>
                            <?php echo $category->cat_title;?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">Post Content</h4>

                    <textarea class="form-control " name="post_content" value='' id="body" cols="30" rows="10"
                        style="color:black !important">
                        <?php echo str_replace('\r\n', '</br>', $post->post_content);?>
                    </textarea>
                </div>
                <div class="form-group">
                    <!-- add -->
                    <h4 class="card-title mt-5" style="color:white !important;">Add Picture</h4>

                    <input type="file" name="image" class="dropify" data-default-file="" data-max-file-size="3M" />

                </div>
                <div class="form-group">


                    <button type="submit" name="update_post" class="btn p-3 mb-2"
                        style="color: white !important; background-color:#50211F;">Update Post</button>


                </div>
            </div>
        </div>
        <?php endforeach; ?>
</div>
</form>
</div>

<script>
ClassicEditor
    .create(document.querySelector('#body'))
    .catch(error => {
        console.error(error);
    });
</script>