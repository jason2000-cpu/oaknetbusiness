<?php 
class App{
    // instance variables
    public $host=HOST;
    public $db_name=DBNAME;
    public $user=USER;
    public $pass=PASS;
    // the global varible for the class
    public $link;

    public function __construct(){
    //   always connect to the database while the app is initialized
        $this->connect();
    }
    // connection to the database 
    public function connect(){
        // establishing the database connection via pdo
         try {
    $dsn = "mysql:host=$this->host;dbname=$this->db_name";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $this->link = new PDO($dsn, $this->user, $this->pass, $options);

    // Connection established successfully
    // You can now execute queries or perform database operations

} catch (PDOException $e) {
    // Connection failed
    echo "Connection failed: " . $e->getMessage();
}
    }
    // if you want to select many rows from the  database
    public function select_all($query){
        $rows=$this->link->query($query);
        $rows->execute();

        $all_rows=$rows->fetchAll(PDO::FETCH_OBJ);
        // check for the rows
        if($all_rows){
            return $all_rows;
        }else{
            return false;
        }

    }
// In App.php
public function selectOne($query, $params = []) {
    try {
        $stmt = $this->link->prepare($query);

        // Bind parameters if they exist
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }

        $stmt->execute();

        // Selecting one row
        $singleRow = $stmt->fetch(PDO::FETCH_OBJ);

        if ($singleRow) {
            return $singleRow;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        // Handle the exception (e.g., log the error, display a message)
        // You can customize the error handling based on your needs
        error_log('Error selecting one row: ' . $e->getMessage());
        return false;
    }
}

    public function insertRecord($query) {
    try {
        $stmt = $this->link->prepare($query);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        // Handle the exception (e.g., log the error, display a message)
        // You can customize the error handling based on your needs
        error_log('Error inserting record: ' . $e->getMessage());
        return false;
    }
}

public function updateRecord($query) {
    try {
        $stmt = $this->link->prepare($query);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        // Handle the exception (e.g., log the error, display a message)
        // You can customize the error handling based on your needs
        error_log('Error updating record: ' . $e->getMessage());
        return false;
    }
}

    // selecting only only one row
    public function select_one($query) {
    try {
        $stmt = $this->link->prepare($query);
        $stmt->execute();

        // Selecting one row
        $singleRow = $stmt->fetch(PDO::FETCH_OBJ);

        if ($singleRow) {
            return $singleRow;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        // Handle the exception (e.g., log the error, display a message)
        // You can customize the error handling based on your needs
        error_log('Error selecting one row: ' . $e->getMessage());
        return false;
    }
}

    // query to validate inputs something inthe database
    public function validate($arr){
        // empty inputs 
        if(in_array("",$arr)){
            echo "empty";
        }

    }
    // insert inthe database
    public function insert($query,$arr,$path){
        // check for validation
        if($this->validate($arr) =="empty"){
           
        }else{
        $insert_record=$this->link->prepare($query);
        $insert_record->execute($arr);
        if ($insert_record) {
            
              echo " <script>window.location.href='".$path."'</script>";
        } else {
            
        }
        }
    }
  public function calculate_monthly_interest($principal, $annual_interest_rate, $created_at) {
    // Convert the annual interest rate to a monthly rate
    $monthly_interest_rate = $annual_interest_rate / 12;

    // Calculate the number of months since the transaction was made
    $current_date = time(); // Current timestamp
    $transaction_date = strtotime($created_at); // Convert created_at to a timestamp
    $months_since_transaction = round(($current_date - $transaction_date) / (30 * 24 * 60 * 60)); // Assuming 30 days per month

    // Calculate the final amount after interest
    $final_amount = $principal * pow(1 + $monthly_interest_rate, $months_since_transaction);

    // Calculate the interest earned
    $interest_earned = $final_amount - $principal;

    return $interest_earned;
}

    // insert without path
    public function insertWithoutPath($query, $arr) {
    // Check for validation
    if ($this->validate($arr) == "empty") {
    
    } else {
        $insert_record = $this->link->prepare($query);
        $insert_record->execute($arr);
    }
}

    // the update query
    public function update($query,$arr,$path){
        // validate first
        if($this->validate($arr) =="empty"){
           

        }else{
            $update_record=$this->link->prepare($query);
            $update_record->execute($arr);
            if ($update_record) {
            
              echo " <script>window.location.href='".$path."'</script>";
        } else {
            
        }
        }
    }
    // update the token
    public function updateToken($query, $arr) {
    $update_record = $this->link->prepare($query);
    $update_record->execute($arr);
    
    if ($update_record) {
        
    } else {
       
    }
}

    // delete 
    public function delete($query,$path){
        // no validation required
        $delete_record=$this->link->prepare($query);
        $delete_record->execute();
        if ($delete_record) {
            
              echo " <script>window.location.href='".$path."'</script>";
        } else {
            
        }
    }
    // delete without path 
    public function delete_without_path($query) {
    // no validation required
    $delete_record = $this->link->prepare($query);
    $delete_record->execute();
    }


    // function to check if email exists user inthe system
    public function email_exists($email){
     $query = "SELECT COUNT(*) FROM users WHERE user_email = :email";
    $stmt = $this->link->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        return true; // Email exists
    } else {
        return false; // Email does not exist
    }

    }
// check if username exists
 public function username_exists($username) {
    $query = "SELECT COUNT(*) FROM users WHERE user_name = :username";
    $stmt = $this->link->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        return true; // Username exists
    } else {
        return false; // Username does not exist
    }
}
// checking it the password exists
public function password_exists($email,$password)
{
    $query = "SELECT password FROM users WHERE user_email = :email";
    $stmt = $this->link->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $hashedPassword = $stmt->fetchColumn();

    if ($hashedPassword && password_verify($password, $hashedPassword)) {
        return true; // Password exists and matches
    } else {
        return false; // Password does not exist or does not match
    }
}

// register the user
public function register($query,$arr,$path){
    // validate against empty input
    if($this->validate($arr)=="empty"){
         echo "<script>
            // Display a failure toastr notification with custom options
            toastr.error('One or more inputs are empty', 'Failure', { timeOut: 1000 });
        </script>";
        
    }else{
        $register_user=$this->link->prepare($query);
        $register_user->execute($arr);
        // show some notifitications
        if ($register_user) {
            echo "<script>
                // Display a success toastr notification with custom options
                toastr.success('Registered successifuly', 'Success', { positionClass: 'toast-top-center' });
                </script>";
              echo " <script>window.location.href='".$path."'</script>";
        } else {
            echo "<script>
                // Display a failure toastr notification with custom options
                toastr.error('Failed', 'Failure', { timeOut: 1000 });
            </script>";
        }

    }
}
// login a user
 public function login($query,$data,$path){
        // email
        $login_user=$this->link->query($query);
        $login_user->execute();

        // fetch
        $fetch=$login_user->fetch(PDO ::FETCH_ASSOC);

        // to count the rows
        if($login_user->rowCount() > 0){
            // validate the password
            if(password_verify($data['password'] , $fetch['password'])){
                // start our session varibles
                $_SESSION['id']=$fetch['user_id '];
                $_SESSION['email']=$fetch['user_email'];
                $_SESSION['username']=$fetch['user_name'];

                // then redirection
               echo "<script>window.location.href='".$path."'</script>";
            }
        }
        
        
    }

// start the session
public function start_session(){
    session_start();
}
// check if someones session exists
public function validate_session(){
    if(isset($_SESSION['user_id'])){
        // to avoid the session redireciton error
          echo "<script>window.location.href='http://localhost/trade/home.php'</script>";
        }
    }
    // google session
public function google_session(){
    if(isset($_SESSION['token']) &&isset($_SESSION['username'])){
        // to avoid the session redireciton error
          echo "<script>window.location.href='http://localhost/trade/home.php'</script>";
        }
    }
public function generateRandomAccountNumber() {
    $capitalLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $randomString = '';

    // Generate 4 random capital letters
    for ($i = 0; $i < 4; $i++) {
        $randomString .= $capitalLetters[rand(0, strlen($capitalLetters) - 1)];
    }

    // Generate 3 random numbers
    for ($i = 0; $i < 3; $i++) {
        $randomString .= $numbers[rand(0, strlen($numbers) - 1)];
    }

    // Shuffle the characters to get a random order
    $randomString = str_shuffle($randomString);

    return $randomString;
}
// generate transaction code
public function generateTransactionCode() {
    $capitalLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $randomString = 'OAK'; // Start with the fixed string "OAK"

    // Generate 3 random integers
    for ($i = 0; $i < 3; $i++) {
        $randomString .= $numbers[rand(0, strlen($numbers) - 1)];
    }

    // Generate 4 random capital letters
    for ($i = 0; $i < 4; $i++) {
        $randomString .= $capitalLetters[rand(0, strlen($capitalLetters) - 1)];
    }

    // Shuffle the characters to get a random order
    $randomString = str_shuffle($randomString);

    return $randomString;
}



// validate session
public function validateSession(){
        if(!isset($_SESSION['id']) || !isset($_SESSION['username'])){
        //   to avoid the session already set
        echo "<script>window.location.href='http://localhost/trade/'</script>";
        }
    }
public function count($query) {
    $stmt = $this->link->query($query);
    $result = $stmt->fetchAll();
    $count = count($result);
    
    return $count;
}
// to calculate the growth
public function calculateMonthlyGrowth($table) {
    $currentMonth = date('m');
    $previousMonth = date('m', strtotime('-1 month'));

    // Query to retrieve the count of items for the previous month
    $query1 = "SELECT COUNT(*) FROM $table WHERE MONTH(created_at) = $previousMonth";
    $stmt1 = $this->link->query($query1);
    $count1 = $stmt1->fetchColumn();

    // Query to retrieve the count of items for the current month
    $query2 = "SELECT COUNT(*) FROM $table WHERE MONTH(created_at) = $currentMonth";
    $stmt2 = $this->link->query($query2);
    $count2 = $stmt2->fetchColumn();

    // Check for zero count to avoid division by zero error
    if ($count1 == 0 || $count2 == 0) {
        return array(
            'growth' => 0,
            'isIncrement' => false
        );
    }

    $growth = ($count2 - $count1) / $count1 * 100;
    $isIncrement = ($growth > 0);

    return array(
        'growth' => $growth,
        'isIncrement' => $isIncrement
    );
}
// transactions sector
public function getTotalBalanceFromMainAccount()
{
    // Construct the SQL query to retrieve the total balance from the main account
    $query = "SELECT balance FROM main_account";

    // Execute the query
    $result = $this->link->query($query);

    // Fetch the result
    $mainAccountData = $result->fetch(PDO::FETCH_ASSOC);

    // Get the total balance from the result
    $totalBalance = isset($mainAccountData['balance']) ? floatval($mainAccountData['balance']) : 0;

    // Return the total balance
    return $totalBalance;
}

// counting the transactions per month
public function countTransactionsByMonthForCurrentYear($transactionType)
{
    try {
        // Get the current year
        $currentYear = date('Y');

        // Create an array to hold the monthly transaction counts and initialize it with default values (0)
        $monthlyCounts = array_fill(0, 12, 0);

        // Iterate through each month of the year
        for ($month = 1; $month <= 12; $month++) {
            // Query to retrieve the count of transactions for the specific month and year
            $query = "SELECT COUNT(*) AS count FROM transaction 
                      WHERE transaction_type = :transactionType 
                      AND MONTH(created_at) = :month AND YEAR(created_at) = :year";

            // Prepare the query
            $stmt = $this->link->prepare($query);

            // Bind the parameter values
            $stmt->bindParam(':transactionType', $transactionType, PDO::PARAM_STR);
            $stmt->bindParam(':month', $month, PDO::PARAM_INT);
            $stmt->bindParam(':year', $currentYear, PDO::PARAM_INT);

            // Execute the query
            $stmt->execute();

            // Fetch the result
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Get the count from the result
            $count = isset($result['count']) ? (int)$result['count'] : 0;

            // Update the monthlyCounts array with the count if it's valid (non-negative)
            if ($count >= 0) {
                $monthlyCounts[$month - 1] = $count;
            }
        }

        return $monthlyCounts;
    } catch (PDOException $e) {
        // Handle the exception (e.g., log the error, display a message)
        // You can customize the error handling based on your needs
        error_log('Error counting transactions: ' . $e->getMessage());
        return array(); // Return an empty array in case of an error
    }
}


// get table count per month
public function table_count_month($table) {
    // Create an array to hold the monthly post counts
    $monthlyCounts = array();

    // Get the current year
    $currentYear = date('Y');

    // Iterate through each month of the year
    for ($month = 1; $month <= 12; $month++) {
        // Query to retrieve the count of items for the specific month and year
        $query = "SELECT COUNT(*) FROM $table WHERE YEAR(created_at) = :year AND MONTH(created_at) = :month";
        $stmt = $this->link->prepare($query);
        $stmt->execute(['year' => $currentYear, 'month' => $month]);
        $count = $stmt->fetchColumn();

        // Add the count to the monthlyCounts array
        $monthlyCounts[] = $count;
    }

    return $monthlyCounts;
}
// get count for today
public function getTableCountForToday($table) {
    // Get the current date in the format 'Y-m-d'
    $currentDate = date('Y-m-d');

    // Query to retrieve the count of records for today
    $query = "SELECT COUNT(*) FROM $table WHERE DATE(created_at) = '$currentDate'";

    // Execute the query and fetch the count
    $count = $this->count($query);

    return $count;
}
public function getTableTransactionCountForToday($table, $transactionType) {
    // Get the current date in the format 'Y-m-d'
    $currentDate = date('Y-m-d');

    // Query to retrieve the count of records for today and the specified transaction type
    $query = "SELECT COUNT(*) FROM $table WHERE DATE(created_at) = '$currentDate' AND transaction_type = '$transactionType'";

    // Execute the query and fetch the count
    $count = $this->count($query);

    return $count;
}

// a function to handle login and give the result
 public function handleLogin() {
    if (isset($_SESSION['username'])) {
        // User logged in via normal login
        $username = $_SESSION['user_name'];
        // Rest of your code for normal login
        return $username;
    } elseif (isset($_SESSION['name'])) {
        // User logged in via Google login
        $name = $_SESSION['name'];
        // Rest of your code for Google login
        return $name;
    } else {
        // User not logged in
        // Handle the case when no session variable is set
        return false;
    }
}
// format time
public function formatTimeAgo($created_at) {
    $timestamp = strtotime($created_at);
    $current_time = time();
    $time_diff = $current_time - $timestamp;

    if ($time_diff < 60) {
        // Less than a minute ago
        $formatted_time = 'Just now';
    } elseif ($time_diff < 3600) {
        // Minutes ago
        $minutes = floor($time_diff / 60);
        $formatted_time = $minutes . ' min ago';
    } elseif ($time_diff < 86400) {
        // Hours ago
        $hours = floor($time_diff / 3600);
        $formatted_time = $hours . ' hours ago';
    } elseif ($time_diff < 2592000) {
        // Days ago
        $days = floor($time_diff / 86400);
        $formatted_time = $days . ' days ago';
    } elseif ($time_diff < 31536000) {
        // Months ago
        $months = floor($time_diff / 2592000);
        $formatted_time = $months . ' months ago';
    } else {
        // Years ago
        $years = floor($time_diff / 31536000);
        $formatted_time = $years . ' years ago';
    }

    return $formatted_time;
}







// check if session was set via google and redirect the user to home page
}


?>