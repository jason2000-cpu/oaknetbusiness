<?php 
$app=new App;
$query="SELECT * FROM posts";
$posts=$app->select_all($query);


// count posts
$query="SELECT * FROM posts";
$post_count=$app->count($query);





?>





<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <h2 style="color:white;">All Posts</h2>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table-responsive-xl" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Post Image</th>
                                    <th scope="col">Post Title</th>
                                    <th scope="col">Post Tag</th>
                                    <th scope="col">Post Category</th>
                                    <th scope="col">Post Author</th>
                                    <th scope="col">Post Status</th>
                                    <th scope="col">Comments</th>
                                    <th scope="col">Likes</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($post_count > 0): ?>
                                <?php foreach ($posts as $post ): ?>
                                <tr>
                                    <td><?php echo $post->post_id; ?></td>
                                    <td><img src="http://localhost/trade/assets/images/<?php echo $post->post_image; ?>"
                                            style="width:50px;height:50px;"></td>
                                    <td><?php echo $post->post_title; ?></td>
                                    <td><?php echo $post->post_tags; ?></td>
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
                                    <td><?php echo $category_title; ?></td>
                                    <td><?php echo $post->post_author; ?></td>
                                    <!-- color of the badge depending ont he status -->
                                    <?php if($post->post_status =='published'): ?>
                                    <td><span class="badge badge-xs badge-success">Published</span>
                                        <?php else: ?>
                                    <td><span class="badge badge-xs badge-primary">draft</span>
                                        <?php endif; ?>
                                        <!-- end of the check -->
                                        <!-- selec -->
                                        <?php
                                        $post_id=$post->post_id;
                                        $query="SELECT * FROM comments WHERE comment_post_id='{$post_id}'";
                                        $commentcount=$app->count($query);
                                        
                                        
                                        ?>
                                    <td><?php echo $commentcount; ?></td>
                                    <td><?php echo $post->likes ?></td>
                                    </td>
                                    <td>
                                        <span>
                                            <a href='posts.php?source=update_post&p_id=<?php echo $post->post_id;?>'
                                                class="mr-4" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Edit"><i class="fa fa-pencil color-muted"></i> </a>
                                            <a href='posts.php?delete=<?php echo $post->post_id; ?>'
                                                data-original-title="Close" class="delete-post"><i
                                                    class="fa-solid fa-trash color-danger"></i></a>

                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <td>No posts available</td>
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
if (isset($_GET['delete'])) {
    $post_id = $_GET['delete'];
    $app = new App;
    $query = "DELETE FROM posts WHERE post_id = '{$post_id}'";
    $app->delete_without_path($query);
}

?>
<script>
$(document).ready(function() {
    $('.delete-post').on('click', function(e) {
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
                    console.log('An error occurred while deleting the post');
                }
            });
        }
    });
});
</script>