 <?php include "../includes/header.php"; ?>
 <?php include "../../config/config.php" ?>
 <?php include "../../libs/App.php" ?>
 <?php
 
$app=new App;
$query="SELECT * FROM accounts";
$accounts=$app->select_all($query);
// count categories
$query="SELECT * FROM accounts";
$accounts_count=$app->count($query);
 ?>
 <?php  if(isset($_POST['displayData'])): ?>
 <table id="example" class="table table-striped table-responsive-sm">
     <thead>
         <tr>
             <th scope="col">ID</th>
             <th scope="col">Name</th>
             <th scope="col"> Number</th>
             <th scope="col"> Balance</th>
             <th scope="col">Create On</th>

             <th scope="col">Action</th>
         </tr>
     </thead>

     <tbody>
         <?php if($accounts_count> 0): ?>
         <?php
         $query="SELECT * FROM accounts";
         $accounts=$app->select_all($query); 
         $number=1;   
        ?>
         <?php foreach($accounts as $account): ?>
         <tr>
             <td><?php echo $number ?></td>
             <td><?php echo $account->account_number; ?></td>
             <td><?php echo $account->account_name; ?></td>
             <td><?php echo $account->account_balance; ?></td>


             <?php
            $opening_date = $account->created_at;
            $timestamp = strtotime($opening_date);
            $formattedDate = date('d, m, Y', $timestamp);
            ?>
             <td><?php echo $formattedDate;?></td>
             <td>
                 <span>

                     <button class="btn btn-dark" type="button"
                         onclick="deleteAccount(<?php echo $account->account_id ?>)">
                         <i class="fa fa-close color-danger"></i>
                     </button>


                 </span>
             </td>
         </tr>

         <?php $number++; ?>
         <?php endforeach; ?>
         <?php else: ?>
         <td>No Accounts Registered Yet</td>
         <?php endif; ?>

     </tbody>
 </table>
 <?php endif; ?>