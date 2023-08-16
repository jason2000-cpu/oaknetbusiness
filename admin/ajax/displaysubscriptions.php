 <?php include "../includes/header.php"; ?>
 <?php include "../../config/config.php" ?>
 <?php include "../../libs/App.php" ?>
 <?php
 
$app=new App;
$query="SELECT * FROM subscription";
$subscriptions=$app->select_all($query);
// count categories
$query="SELECT * FROM subscription";
$subscriptions_count=$app->count($query);
 ?>
 <?php  if(isset($_POST['displayData'])): ?>
 <table id="example" class="table table-striped table-responsive-sm">
     <thead>
         <tr>
             <th scope="col">ID</th>
             <th scope="col">Subscriber</th>
             <th scope="col">Package</th>
             <th scope="col">Amount</th>
             <th scope="col">Duration</th>
             <th scope="col">Start</th>
             <th scope="col">End</th>
             <th scope="col">Action</th>
         </tr>
     </thead>

     <tbody>
         <?php if($subscriptions_count> 0): ?>
         <?php
         $query="SELECT * FROM subscription";
         $subscriptions=$app->select_all($query); 
         $number=1;   
        ?>
         <?php foreach($subscriptions as $subscription): ?>
         <tr>
             <td><?php echo $number ?></td>
             <td><?php echo $subscription->username; ?></td>
             <td><?php echo $subscription->subscription_name; ?></td>
             <td><?php echo $subscription->subscription_amount; ?></td>
             <?php if($subscription->subscription_duration =='monthly'): ?>
             <td><span class="badge badge-xs badge-primary"><?php echo $subscription->subscription_duration?></span>
             </td>
             <?php elseif($subscription->subscription_duration =='halfyear'):?>
             <td><span class="badge badge-xs badge-dark"><?php echo $subscription->subscription_duration?></span>
             </td>
             <?php else: ?>
             <td><span class="badge badge-xs badge-success"><?php echo $subscription->subscription_duration?></span>
             </td>
             <?php endif; ?>
             <!-- start -->
             <?php
             $subscription_start = $subscription->subscription_start;
             $timestamp = strtotime($subscription_start);
             $formattedDated = date('d, m, Y', $timestamp);
             ?>
             <td><?php echo $formattedDated;?></td>
             <!-- end date -->
             <?php
             $subscription_end = $subscription->subscription_end;
             $timestamp = strtotime($subscription_end);
             $formattedDate = date('d, m, Y', $timestamp);
             ?>
             <td><?php echo $formattedDate;?></td>




             <td>
                 <span>

                     <button class="btn btn-dark" type="button"
                         onclick="deleteSubscription(<?php echo $subscription->id ?>)">
                         <i class="fa fa-close color-danger"></i>
                     </button>


                 </span>
             </td>
         </tr>

         <?php $number++; ?>
         <?php endforeach; ?>
         <?php else: ?>
         <td>No Active Subscriptions Yet</td>
         <?php endif; ?>

     </tbody>
 </table>
 <?php endif; ?>