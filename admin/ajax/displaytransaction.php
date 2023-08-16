 <?php include "../includes/header.php"; ?>
 <?php include "../../config/config.php" ?>
 <?php include "../../libs/App.php" ?>
 <?php
 
$app=new App;
$query="SELECT * FROM transaction";
$transactions=$app->select_all($query);
// count categories
$query="SELECT * FROM transaction";
$transaction_count=$app->count($query);
 ?>
 <?php  if(isset($_POST['displayData'])): ?>
 <table id="example" class="table table-striped table-responsive-sm">
     <thead>
         <tr>
             <th scope="col">ID</th>
             <th scope="col">Code</th>
             <th scope="col"> Owner</th>
             <th scope="col"> Type</th>
             <th scope="col">date</th>
             <th scope="col">Amount</th>
             <th scope="col">Action</th>
         </tr>
     </thead>

     <tbody>
         <?php if($transaction_count > 0): ?>
         <?php
         $query="SELECT * FROM transaction";
         $transactions=$app->select_all($query); 
         $number=1;   
        ?>
         <?php foreach($transactions as $transaction): ?>
         <tr>
             <td><?php echo $number ?></td>
             <td><?php echo $transaction->transcation_code; ?></td>
             <td><?php echo $transaction->username; ?></td>
             <?php if(!$transaction->transaction_status =='fail'):?>
             <td><span class="badge badge-xs badge-success"><?php echo $transaction->transaction_status?></span></td>
             <?php else: ?>
             <td><span class="badge badge-xs badge-warning"><?php echo $transaction->transaction_status?></span></td>
             <?php endif; ?>


             <?php
            $transaction_date = $transaction->created_at;
            $timestamp = strtotime($transaction_date);
            $formattedDate = date('d, m, Y', $timestamp);
            ?>
             <td><?php echo $formattedDate;?></td>
             <td><?php echo $transaction->transaction_amount ?></td>


             <td>
                 <span>

                     <button class="btn btn-dark" type="button"
                         onclick="deleteTransaction(<?php echo $transaction->id ?>)">
                         <i class="fa fa-close color-danger"></i>
                     </button>


                 </span>
             </td>
         </tr>

         <?php $number++; ?>
         <?php endforeach; ?>
         <?php else: ?>
         <td>No Transactions available</td>
         <?php endif; ?>

     </tbody>
 </table>
 <?php endif; ?>