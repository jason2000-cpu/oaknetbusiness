 <?php include "../includes/header.php"; ?>
 <?php include "../../config/config.php" ?>
 <?php include "../../libs/App.php" ?>
 <?php
 
$app=new App;
$query="SELECT * FROM category";
$categories=$app->select_all($query);
// count categories
$query="SELECT * FROM category";
$category_count=$app->count($query);
 ?>
 <?php  if(isset($_POST['displayData'])): ?>
 <table id="example" class="table table-striped table-responsive-sm">
     <thead>
         <tr>
             <th scope="col">ID</th>
             <th scope="col">Category</th>
             <th scope="col">Action</th>
         </tr>
     </thead>

     <tbody>
         <?php if($category_count > 0): ?>
         <?php
         $query="SELECT * FROM category";
         $categories=$app->select_all($query); 
         $number=1;   
        ?>
         <?php foreach($categories as $category): ?>
         <tr>
             <td><?php echo $number ?></td>
             <td><?php echo $category->cat_title; ?></td>
             <td>
                 <span>
                     <button class="btn btn-dark" type="button" data-bs-toggle="modal"
                         data-bs-target=".updatingModal_<?php echo $category->cat_id ?>">
                         <i class="fa fa-pencil color-muted"></i>
                     </button>

                     <button class="btn btn-dark" type="button"
                         onclick="deleteCategory(<?php echo $category->cat_id ?>)">
                         <i class="fa fa-close color-danger"></i>
                     </button>


                 </span>
             </td>
         </tr>
         <div class="modal fade updatingModal_<?php echo $category->cat_id ?>" tabindex="-1"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h1 class="modal-title fs-5" id="exampleModalLabel">Update Category</h1>
                     </div>
                     <div class="modal-body">
                         <div class="form-group">
                             <label for="UpdateCategory">Name</label>
                             <input class="form-control" type="text" id="UpdateCategory"
                                 placeholder="New Category Name">
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-lg" data-bs-dismiss="modal"
                             style="background-color:black!important;color:white;">Close</button>
                         <button type="button" class="btn btn-lg"
                             style="background-color: #50211F!important;color:white;"
                             onclick="updateCategory(<?php echo $category->cat_id ?>)">Update</button>
                     </div>
                 </div>
             </div>
         </div>
         <?php $number++; ?>
         <?php endforeach; ?>
         <?php else: ?>
         <td>No categories available</td>
         <?php endif; ?>

     </tbody>
 </table>
 <?php endif; ?>