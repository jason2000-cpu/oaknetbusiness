 <?php include "../includes/header.php"; ?>
 <?php include "../../config/config.php" ?>
 <?php include "../../libs/App.php" ?>
 <?php
 $app=new App;
 $query="SELECT * FROM users";
 $users=$app->select_all($query);

//  count the users
$query="SELECT * FROM users";
$user_count=$app->count($query);
$number=1; 
 
 ?>
 <?php if(isset($_POST['displayUsers'])): ?>

 <table id="example" class="display table-responsive-xl " style="min-width: 845px">
     <thead>
         <tr>
             <th scope="col">ID</th>
             <th scope="col">User Profile</th>
             <th scope="col">Firstname</th>
             <th scope="col">Lastname</th>
             <th scope="col">Country</th>
             <th scope="col">Phone</th>
             <th scope="col">Residence</th>
             <th scope="col">State</th>
             <th scope="col">User Type</th>
             <th scope="col">ActionS</th>
         </tr>
     </thead>
     <tbody>
         <?php if($user_count > 0): ?>
         <?php foreach($users as $user): ?>
         <tr>
             <td><?php echo $number ?></td>
             <!-- get the image -->
             <?php 
             $profilePicture = $user->user_profile;                       
            ?>
             <td> <img src="../../assets/images/<?php echo $profilePicture ?>" alt="image" class="img-fluid"
                     style="width:50px;height:50px;" /> </td>
             <td><?php echo $user->user_firstname; ?></td>
             <td><?php echo $user->user_lastname; ?></td>
             <td><?php echo $user->user_country ?></td>
             <td><?php echo $user->user_phone ?></td>
             <td><?php echo $user->user_residence; ?></td>
             <!-- take a decsion -->
             <?php if($user->user_state =='allowed'): ?>
             <td>
                 <!-- Assuming $user->user_id is an integer and $user->user_type is a string -->
                 <button class="btn btn-warning"
                     onclick="changeUserState(<?php echo $user->user_id; ?>, '<?php echo $user->user_state; ?>')">Allowed</button>
             </td>
             <?php else: ?>
             <td>
                 <button class="btn btn-dark"
                     onclick="changeUserState(<?php echo $user->user_id; ?>, '<?php echo $user->user_state; ?>')">Forbidden</button>
             </td>

             <?php endif; ?>
             <!-- take a decision is admin -->
             <?php if($user->user_type =='admin'): ?>
             <td>
                 <!-- Assuming $user->user_id is an integer and $user->user_type is a string -->
                 <button class="btn btn-primary"
                     onclick="changeUserType(<?php echo $user->user_id; ?>, '<?php echo $user->user_type; ?>')">Admin</button>
             </td>
             <?php else: ?>
             <td>
                 <button class="btn btn-success"
                     onclick="changeUserType(<?php echo $user->user_id; ?>, '<?php echo $user->user_type; ?>')">User</button>
             </td>
             <?php endif; ?>

             <td>
                 <span>
                     <a href="users.php?source=update_user&user_id=<?php echo $user->user_id;?>" class="mr-4"
                         data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i
                             class="fa fa-pencil color-muted"></i> </a>
                     <button type="button" class="btn btn-dark" onclick="deleteUser(<?php echo $user->user_id; ?>)"><i
                             class="fa fa-close color-danger"></i></a>
                 </span>
             </td>
         </tr>
         <?php $number++; ?>
         <?php endforeach; ?>
         <?php else: ?>
         <tr> No users currently</tr>
         <?php endif; ?>
     </tbody>

 </table>

 <?php endif; ?>