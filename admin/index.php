<?php include "./includes/header.php"; ?>
<?php include "../config/config.php" ?>
<?php include "../libs/App.php" ?>


<?php 
$app=new App;

$username=$_SESSION['username'];
$query="SELECT * FROM users WHERE user_name='{$username}'";
$users=$app->select_all($query);
foreach($users as $user){
    $usertype=$user->user_type;
    if($usertype =='investor'){
          echo "<script>window.location.href='http://localhost/trade/admin/404.php'</script>";
        }
    }


?>

<!-- perform the crud here -->
<?php
$app=new App;
// geth the total transaction
$total_transactions=$app->table_count_month('transaction');


$totalBalanceMainAccount = $app->getTotalBalanceFromMainAccount();
// deposites
$query = "SELECT SUM(transaction_amount) AS total_deposit_amount
          FROM transaction
          WHERE transaction_type = 'add'";
$result = $app->select_all($query);
$totaldepositAmount = isset($result[0]->total_deposit_amount) ? floatval($result[0]->total_deposit_amount) : 0;
// the withdrwals
$query = "SELECT SUM(transaction_amount) AS total_withdraw_amount
          FROM transaction
          WHERE transaction_type = 'withdraw'";
$withdraw = $app->select_all($query);
$totalWithdrawAmount = isset($withdraw[0]->total_withdraw_amount) ? floatval($withdraw[0]->total_withdraw_amount) : 0;
// the purchases
$query = "SELECT SUM(transaction_amount) AS total_purchase_amount
          FROM transaction
          WHERE transaction_type = 'purchase'";
$purchase = $app->select_all($query);
$totalPurchaseAmount = isset($purchase[0]->total_purchase_amount) ? floatval($purchase[0]->total_purchase_amount) : 0;

// Monthly count for the transaction types
$investmentCounts = $app->countTransactionsByMonthForCurrentYear('invest');
$withdrawCounts = $app->countTransactionsByMonthForCurrentYear('withdraw');
$addCounts = $app->countTransactionsByMonthForCurrentYear('add');

// Define the month names
$monthNames = array(
    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
);

// Generate JavaScript code for the data points of 'add' transactions
$addDataPoints = [];
foreach ($addCounts as $month => $count) {
    $monthName = $monthNames[$month]; // Start from 0, so no need to subtract 1
    $addDataPoints[] = "{ label: '$monthName', y: $count }";
}
$addDataPointsJS = implode(',', $addDataPoints);

// Generate JavaScript code for the data points of 'invest' transactions
$investDataPoints = [];
foreach ($investmentCounts as $month => $count) {
    $monthName = $monthNames[$month]; // Start from 0, so no need to subtract 1
    $investDataPoints[] = "{ label: '$monthName', y: $count }";
}
$investDataPointsJS = implode(',', $investDataPoints);

// Generate JavaScript code for the data points of 'withdraw' transactions
$withdrawDataPoints = [];
foreach ($withdrawCounts as $month => $count) {
    $monthName = $monthNames[$month]; // Start from 0, so no need to subtract 1
    $withdrawDataPoints[] = "{ label: '$monthName', y: $count }";
}
$withdrawDataPointsJS = implode(',', $withdrawDataPoints);


?>


<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <?php include "./includes/loader.php" ?>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include "./includes/nav-header.php" ?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->


        <?php include "./includes/main-header.php" ?>





        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include "./includes/sidebar.php" ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="breadcrumb-range-picker">
                        <!-- <span><i class="icon-calender"></i></span>
                        <span class="ml-1">August 08, 2017 - August 08, 2017</span> -->
                        <!-- will be implemented later -->
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Components</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-between mb-4">
                    <div class="col-xl-3 col-lg-4">
                        <h2 class="page-heading">Hi,Welcome Back!</h2>
                        <p class="mb-0">Your OaknetBusiness admin template</p>
                    </div>
                    <div class="col-xl-9 col-xxl-9 col-lg-8 mt-4 mt-lg-0">

                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-6 col-xxl-12">
                        <div class="row">
                            <div class="col-sm-6 col-xxl-6 col-xl-6">
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <h4 class="text-muted mb-3">Total Money</h4>
                                            </div>
                                            <div class="col-auto">
                                                <h2>KSH<?php echo number_format($totalBalanceMainAccount,2)?></h2>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="text-success"><i class="mdi mdi-arrow-up-bold"></i> Balanced
                                            </span>
                                            <p> Since Start</p>
                                        </div>
                                    </div>
                                    <div class="chart-wrapper">
                                        <div id="chartContainer1" class="home_chart_widget chart-one"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-6 col-xl-6">
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <h4 class="text-muted mb-3">Total Deposits</h4>
                                            </div>
                                            <div class="col-auto">
                                                <h2>KSH <?php echo number_format($totaldepositAmount ,2) ?></h2>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="text-danger"><i class="mdi mdi-arrow-up-bold"></i> Balanced
                                            </span>
                                            <p>From start</p>
                                        </div>
                                    </div>
                                    <div class="chart-wrapper">
                                        <div id="chartContainer2" class="home_chart_widget chart-two"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-6 col-xl-6">
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <h4 class="text-muted mb-3">Total withdrawals</h4>
                                            </div>
                                            <div class="col-auto">
                                                <h2>KSH <?php echo number_format($totalWithdrawAmount,2) ?></h2>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="text-danger"><i class="mdi mdi-arrow-up-bold"></i> Balanced
                                            </span>
                                            <p> Since start</p>
                                        </div>
                                    </div>
                                    <div class="chart-wrapper">
                                        <div id="chartContainer3" class="home_chart_widget chart-three"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-6 col-xl-6">
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <h4 class="text-muted mb-3">Total Subscriptions Money</h4>
                                            </div>
                                            <div class="col-auto">
                                                <h2>KSH <?php echo number_format($totalPurchaseAmount,2) ?></h2>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="text-success"><i class="mdi mdi-arrow-up-bold"></i> Balanced
                                            </span>
                                            <p> Since last month</p>
                                        </div>
                                    </div>
                                    <div class="chart-wrapper">
                                        <div id="chartContainer4" class="home_chart_widget chart-four"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Transactions</h4>
                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                <script type="text/javascript">
                                google.charts.load('current', {
                                    packages: ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = new google.visualization.DataTable();
                                    data.addColumn('string', 'Month');
                                    data.addColumn('number', 'Add');
                                    data.addColumn('number', 'Invest');
                                    data.addColumn('number', 'Withdraw');

                                    data.addRows([
                                        <?php
                                          for ($month = 1; $month <= 12; $month++) {
                                              $monthName = $monthNames[$month - 1];
                                              $addCount = $addCounts[$month - 1];
                                              $investCount = $investmentCounts[$month - 1];
                                              $withdrawCount = $withdrawCounts[$month - 1];
                                              echo "['$monthName', $addCount, $investCount, $withdrawCount],";
                                          }
                                          ?>
                                    ]);

                                    var options = {
                                        title: 'Transaction Made Monthly For Specified Types',
                                        theme: 'light2',
                                        seriesType: 'bars',
                                        vAxes: {
                                            0: {
                                                title: 'Number',
                                                textStyle: {
                                                    fontSize: 12
                                                },
                                                gridlines: {
                                                    count: 5 // Adjust the number of vertical gridlines as desired
                                                },
                                                baselineColor: '#000000', // Add a black line to the y-axis
                                                ticks: <?php echo json_encode(range(0, max(max($addCounts), max($investmentCounts), max($withdrawCounts)))); ?>
                                            }
                                        },
                                        hAxis: {
                                            title: 'Month',
                                            textStyle: {
                                                fontSize: 12
                                            },
                                            gridlines: {
                                                count: null // Let the chart determine the appropriate number of gridlines
                                            },
                                            format: 'MMMM', // Display the full month name
                                        },
                                        chartArea: {
                                            width: '80%',
                                            height: '70%'
                                        },
                                        series: {
                                            0: {
                                                color: '#070606'
                                            },
                                            1: {
                                                color: '#50211F'
                                            },
                                            2: {
                                                color: '#A26D61'
                                            }
                                        }
                                    };

                                    var chart = new google.visualization.ComboChart(document.getElementById(
                                        'transactions'));
                                    chart.draw(data, options);
                                }
                                </script>
                                <div id="transactions" style="height: 300px; width: 100%;"></div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- get the timeline data -->
                <?php 
                $app=new App;
                $table='transaction';
                $transactionType='add';
                $depositsToday=$app->getTableTransactionCountForToday($table,$transactionType);
                // withdraw
                $table='transaction';
                $transactionType='withdraw';
                $withdrawalsToday=$app->getTableTransactionCountForToday($table,$transactionType);
                // invest
                $table='transaction';
                $transactionType='invest';
                $investmentsToday=$app->getTableTransactionCountForToday($table,$transactionType);

              
                // invest
                $table='transaction';
                $transactionType='purchase';
                $purchasesToday=$app->getTableTransactionCountForToday($table,$transactionType);



                ?>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-xxl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Timeline</h4>
                                <div id="timeline-activity">
                                    <ul class="timeline mb-0">
                                        <li>
                                            <div class="timeline-badge bg-primary"></div>
                                            <a href="#" class="timeline-panel">
                                                <span>Today</span>
                                                <h5 class="mt-2"><?php echo $purchasesToday ?> Subscriptions received
                                                </h5>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge bg-success"></div>
                                            <a href="#" class="timeline-panel">
                                                <span>Today</span>
                                                <h5 class="mt-2"><?php echo $depositsToday ?>succesiful deposits</h5>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge bg-warning"></div>
                                            <a href="#" class="timeline-panel">
                                                <span>Today</span>
                                                <h5 class="mt-2"><?php echo $withdrawalsToday ?> Withdraws Made</h5>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge bg-danger"></div>
                                            <a href="#" class="timeline-panel">
                                                <span>Today</span>
                                                <h5 class="mt-2"><?php echo $investmentsToday; ?> New Investments</h5>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge bg-pink"></div>
                                            <a href="#" class="timeline-panel">
                                                <span>Today</span>
                                                <h5 class="mt-2"><?php echo $purchasesToday ?> Additional Purchases</h5>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- last transactions -->
                    <!-- get the last transaction -->
                    <?php
                    $app=new App;
                    $query="SELECT * FROM transaction LIMIT 5";
                    $lastfive=$app->select_all($query);      
                    ?>


                    <div class="col-xl-6 col-lg-6 col-xxl-6">
                        <div class="card top_menu_widget">
                            <div class="card-body">
                                <h4 class="card-title">Last Transactions</h4>
                                <?php foreach($lastfive as $last): ?>
                                <div class="media border-bottom pt-3 pb-3">
                                    <!-- get the users specific  -->
                                    <?php
                                    $username=$last->username;
                                    $query="SELECT * FROM users WHERE user_name='{$username}'";
                                    $users=$app->select_all($query);
                                         
                                    ?>
                                    <?php foreach($users as $user): ?>
                                    <img width="50" height="50" alt="#" class="mr-3"
                                        src="../assets/images/<?php echo $user->user_profile; ?>">
                                    <?php endforeach; ?>
                                    <div class="media-body">
                                        <h5 class="mb-1 mt-sm-1 mt-0" style="color: black;">
                                            <?php echo $last->username; ?></h5>
                                        <?php
                                         $timestamp = $last->created_at; // Replace this with your timestamp variable

                                         $formattedDate = date('M d, Y (h:i A)', strtotime($timestamp));     
                                        ?>
                                        <span style="color: black;"><?php echo $formattedDate ?></span>
                                    </div>
                                    <?php if(!$last->transaction_status =='fail'):?>
                                    <h5 class="badge-lighten-primary" style="color: black;">
                                        <?php echo $last->transaction_amount ?></h5>
                                    <?php else: ?>
                                    <h5 class="badge-lighten-warning" style="color: black;">
                                        <?php echo $last->transaction_amount; ?></h5>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>





                    </div>
                </div>

                <!-- col -lg 6 -->

                <!-- transaciton ratings -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php include "ajax/transactionsgraph.php" ?>

                    </div>
                </div>


                <!-- get the subsctiptions -->
                <?php
                $app=new App;
                $query="SELECT * FROM subscription";
                $subscriptions=$app->select_all($query);   
                $number=1;
                $query="SELECT * FROM subscription";
                $subscription_count=$app->count($query);
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">subsctiption List</h4>
                                <div class="table-responsive">
                                    <table class="table verticle-middle table-responsive-lg mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Subsctiption Package</th>
                                                <th scope="col">Subscriber</th>
                                                <th scope="col">Duration</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Start Date</th>
                                                <th scope="col">End date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($subscription_count >0): ?>
                                            <?php foreach($subscriptions as $subscription): ?>
                                            <tr>
                                                <td><?php echo $number; ?></td>
                                                <td><?php echo $subscription ->subscription_name ?></td>
                                                <td><?php echo $subscription ->username ?></td>
                                                <?php if($subscription->subscription_duration =='monthly'): ?>
                                                <td><span
                                                        class="badge badge-xs badge-primary"><?php echo $subscription->subscription_duration?></span>
                                                </td>
                                                <?php elseif($subscription->subscription_duration =='halfyear'):?>
                                                <td><span
                                                        class="badge badge-xs badge-dark"><?php echo $subscription->subscription_duration?></span>
                                                </td>
                                                <?php else: ?>
                                                <td><span
                                                        class="badge badge-xs badge-success"><?php echo $subscription->subscription_duration?></span>
                                                </td>
                                                <?php endif; ?>

                                                <td>KSH <?php echo $subscription->subscription_amount;?></td>
                                                <?php
                                                 $subscription_start = $subscription->subscription_start;
                                                 $timestamp = strtotime($subscription_start);
                                                 $formattedDate = date('d, m, Y', $timestamp);
                                                 ?>
                                                <td><?php echo $formattedDate;?></td>
                                                <!-- get the  end date -->
                                                <?php 
                                               $subscriptionStartDate = $subscription->subscription_start;
                                               $subscriptionDuration = $subscription->subscription_duration;
                                                                                               
                                               // Calculate subscription end date based on the chosen duration
                                               if ($subscriptionDuration === "monthly") {
                                                   // Monthly Subscription (1 month from the start date)
                                                   $subscriptionEndDate = strtotime("+1 month", strtotime($subscriptionStartDate));
                                               } elseif ($subscriptionDuration === "halfyear") {
                                                   // Half-Year Subscription (6 months from the start date)
                                                   $subscriptionEndDate = strtotime("+6 months", strtotime($subscriptionStartDate));
                                               } elseif ($subscriptionDuration === "year") {
                                                   // One-Year Subscription (1 year from the start date)
                                                   $subscriptionEndDate = strtotime("+1 year", strtotime($subscriptionStartDate));
                                               } else {
                                                   // Invalid subscription duration
                                                   $subscriptionEndDate = null; // or display an error message, etc.
                                               }
                                               
                                               // Format the date (if not null)
                                               $formattedDate = ($subscriptionEndDate !== null) ? date('d, m, Y', $subscriptionEndDate) : "";
                                               
                                               ?>

                                                <td><?php echo $formattedDate; ?></td>

                                            </tr>
                                            <?php $number++ ;?>
                                            <?php endforeach; ?>

                                            <?php else: ?>
                                            <tr>No Subscriptions yet</tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p><a href="#">Joshua</a></p>
        </div>
    </div>
    <!--**********************************
            Footer end
        ***********************************-->
    <?php include "./includes/right_sidebar.php" ?>


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>



    </script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <?php include "./includes/footer_links.php" ?>