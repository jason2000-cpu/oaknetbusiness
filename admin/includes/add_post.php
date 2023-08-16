<?php
$app= new App;
// post authors
$query=" SELECT * FROM users WHERE user_type ='admin'";
$authors=$app->select_all($query);
//   category
$query=" SELECT * FROM category";
$categories=$app->select_all($query);
// query to insert
if(isset($_POST['create_post'])){
    $post_title=$_POST['post_title'];
    $post_tags=$_POST['post_tags'];
    $post_author=$_POST['post_author'];
    $post_category_id=$_POST['post_category_id'];
    $post_status='draft';
    $post_content=$_POST['post_content'];
    $post_comment_count=0;
    $post_likes=0;
    // dealing with the image
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    // move the picture to a temporary location
    
// To move the image to the server location from the temporary location
   move_uploaded_file($post_image_temp, "../assets/images/$post_image");
//    query here
$query = "INSERT INTO posts(post_title, post_tags, post_author,post_category_id,post_status,post_content,post_comment_count,likes,post_image)VALUES(:post_title,:post_tags,:post_author,:post_category_id,:post_status,:post_content,:post_comment_count,:post_likes,:post_image)";
 $arr=[
    ":post_title"=>$post_title,
    ":post_tags"=>$post_tags,
    ":post_author"=>$post_author,
    ":post_category_id"=>$post_category_id,
    ":post_status"=>$post_status,
    ":post_content"=>$post_content,
    ":post_comment_count"=>$post_comment_count,
    ":post_likes"=>$post_likes,
    ":post_image"=>$post_image,
    ];
    $app->insertWithoutPath($query,$arr);
}

?>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <h2 style="color:white !important;">Add Post</h2>
        <div class="row">
            <div class="col-xl-12">
                <h4 class="card-title mt-5" style="color:white !important;">Post Title</h4>
                <div class="form-group">
                    <input type="text" name="post_title" class="form-control input-rounded" placeholder="Post title">
                </div>
                <h4 class="card-title mt-5" style="color:white !important;">Post Tag</h4>
                <div class="form-group">
                    <input type="text" name="post_tags" class="form-control input-rounded" placeholder="post tag">
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

                    <textarea class="form-control " name="post_content" id="body" style="color:black !important">
                    </textarea>
                </div>
                <div class="form-group">
                    <!-- add -->
                    <h4 class="card-title mt-5" style="color:white !important;">Add Picture</h4>

                    <input type="file" name="image" class="dropify" data-default-file="" data-max-file-size="3M" />
                </div>
                <div class="form-group">
                    <button type="submit" name="create_post" class="btn p-3 mb-2"
                        style="color: white !important; background-color:#50211F;">Create Post</button>
                </div>
            </div>
        </div>
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