<?php include "../config/config.php" ?>
<?php include "../libs/App.php"; ?>
<?php include "../includes/header.php" ?>
<?php
  if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
         echo "<script>window.location.href='http://localhost/trade/admin/404.php'</script>";
        }
    
?>
<?php session_start(); ?>
<?php

$amount=$_SESSION['withdraw'];
// user
$username=$_SESSION['username'];
$app=new App;

// check if the withdrawal amount is less than the main account balance and the account balance for the specific user
$query="SELECT balance FROM main_account";
$main_account_balance=$app->select_all($query);
 //Access the balance value from the result object
$main_balance= isset($main_account_balance[0]->balance) ? floatval($main_account_balance[0]->balance) : 0;
// user account balance
// Retrieve the current account balance for the account owner
$accountOwner = $username;
$query = "SELECT account_balance FROM accounts WHERE account_name = '{$accountOwner}'";
$AccountBalanceResult = $app->select_all($query);

// Access the balance value from the result object
$accountBalance = isset($AccountBalanceResult[0]->account_balance) ? floatval($AccountBalanceResult[0]->account_balance) : 0;
// now you can perfom the logic
if(($main_balance >=$amount) && ($accountBalance >$amount)){
$amount=$_SESSION['withdraw'];
$transactionAmount=$amount;
$trasactionCode=$app->generateTransactionCode();
$transactionOwner=$_SESSION['username'];
$transactionType='withdraw';
$transactionStatus='succesiful';

$query="INSERT INTO transaction(transcation_code,transaction_amount,transaction_status,username,transaction_type)VALUES(:code,:amount,:status,:owner,:type)";
$arr=[
    ":amount"=>$transactionAmount,
    ":code"=>$trasactionCode,
    ":owner"=>$transactionOwner,
    ":type"=>$transactionType,
    ":status"=>$transactionStatus,
];
$app->insertWithoutPath($query,$arr);
$query = "SELECT balance FROM main_account";
$balanceResult = $app->select_all($query);

// Access the balance value from the result object
$balance = isset($balanceResult[0]->balance) ? floatval($balanceResult[0]->balance) : 0;

// Add money to the main account
$new_balance = $balance - $transactionAmount;

if ($balance === 0) {
    // If the main account balance is zero, insert a new row with the initial balance
    $query = "INSERT INTO main_account (balance) VALUES (:amount)";
    $arr= [
        ":amount" => $new_balance,
    ];

    $app->insertWithoutPath($query, $arr);
} else {
    // Otherwise, update the main_account table with the new balance
    $query = "UPDATE main_account SET balance = :amount";
    $arr = [
        ":amount" => $new_balance,
    ];

    $app->updateToken($query, $arr);
}
header("Location:withdraw_success.php");
}else{
    // the withdraw was not successiful
header("Location:withdrawal_fail.php");

}


?>

<?php include "../includes/footer_links.php" ?>