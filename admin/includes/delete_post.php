<?php 

// Check if the order ID is provided in the request
if (isset($_POST['post_id'])) {
   
    $post_id = $_POST['post_id'];
    $app = new App;
    $query = "DELETE FROM posts WHERE post_id= '{$post_id}'";
    
    $path = "posts.php";

    $app->delete($query, $path);

}
?>