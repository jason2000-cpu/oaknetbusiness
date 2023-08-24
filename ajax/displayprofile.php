<?php include "../config/config.php"; ?>
<?php include "../libs/App.php"; ?>

<?php include "../includes/header.php" ?>
<?php session_start(); ?>



<?php if(isset($_POST['displayGrid'])): ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?php
                                $app=new App;
                                $username=$_SESSION['username'];
                                $query="SELECT * FROM users WHERE user_name='$username'";
                                $users=$app->select_all($query);           
                                ?>
            <?php foreach($users as $user): ?>
            <div class="me-my-account-profile">
                <div class="me-my-profile-head">
                    <div class="me-profile-name">
                        <h4>My profile:<?php echo $user->user_name ?> </h4>
                        <?php
                                    
                                    $timestamp = $user->created_at; // Replace this with your actual timestamp
                                    
                                    // Convert the timestamp to the desired format
                                    $formattedDate = date("j M Y, g:ia", strtotime($timestamp));

                                    ?>
                        <p>Registration date: <?php echo $formattedDate ?></p>
                        <p><?php $user->user_residence; ?></p>
                    </div>



                    <div class="me-my-profile-img">
                        <div class="me-my-profile-img-main">
                            <img src="assets/images/<?php echo $user->user_profile;?>" class="img-fluid" alt="image">
                            <div class="me-my-profile-svg" data-bs-toggle="modal" data-bs-target="#me-profile-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55.25 55.25">
                                    <path
                                        d="M52.618,2.631c-3.51-3.508-9.219-3.508-12.729,0L3.827,38.693C3.81,38.71,3.8,38.731,3.785,38.749
                                            c-0.021,0.024-0.039,0.05-0.058,0.076c-0.053,0.074-0.094,0.153-0.125,0.239c-0.009,0.026-0.022,0.049-0.029,0.075
                                            c-0.003,0.01-0.009,0.02-0.012,0.03l-3.535,14.85c-0.016,0.067-0.02,0.135-0.022,0.202C0.004,54.234,0,54.246,0,54.259
                                            c0.001,0.114,0.026,0.225,0.065,0.332c0.009,0.025,0.019,0.047,0.03,0.071c0.049,0.107,0.11,0.21,0.196,0.296
                                            c0.095,0.095,0.207,0.168,0.328,0.218c0.121,0.05,0.25,0.075,0.379,0.075c0.077,0,0.155-0.009,0.231-0.027l14.85-3.535
                                            c0.027-0.006,0.051-0.021,0.077-0.03c0.034-0.011,0.066-0.024,0.099-0.039c0.072-0.033,0.139-0.074,0.201-0.123
                                            c0.024-0.019,0.049-0.033,0.072-0.054c0.008-0.008,0.018-0.012,0.026-0.02l36.063-36.063C56.127,11.85,56.127,6.14,52.618,2.631z
                                            M51.204,4.045c2.488,2.489,2.7,6.397,0.65,9.137l-9.787-9.787C44.808,1.345,48.716,1.557,51.204,4.045z M46.254,18.895l-9.9-9.9
                                            l1.414-1.414l9.9,9.9L46.254,18.895z M4.961,50.288c-0.391-0.391-1.023-0.391-1.414,0L2.79,51.045l2.554-10.728l4.422-0.491
                                            l-0.569,5.122c-0.004,0.038,0.01,0.073,0.01,0.11c0,0.038-0.014,0.072-0.01,0.11c0.004,0.033,0.021,0.06,0.028,0.092
                                            c0.012,0.058,0.029,0.111,0.05,0.165c0.026,0.065,0.057,0.124,0.095,0.181c0.031,0.046,0.062,0.087,0.1,0.127
                                            c0.048,0.051,0.1,0.094,0.157,0.134c0.045,0.031,0.088,0.06,0.138,0.084C9.831,45.982,9.9,46,9.972,46.017
                                            c0.038,0.009,0.069,0.03,0.108,0.035c0.036,0.004,0.072,0.006,0.109,0.006c0,0,0.001,0,0.001,0c0,0,0.001,0,0.001,0h0.001
                                            c0,0,0.001,0,0.001,0c0.036,0,0.073-0.002,0.109-0.006l5.122-0.569l-0.491,4.422L4.204,52.459l0.757-0.757
                                            C5.351,51.312,5.351,50.679,4.961,50.288z M17.511,44.809L39.889,22.43c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0
                                            L16.097,43.395l-4.773,0.53l0.53-4.773l22.38-22.378c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0L10.44,37.738
                                            l-3.183,0.354L34.94,10.409l9.9,9.9L17.157,47.992L17.511,44.809z M49.082,16.067l-9.9-9.9l1.415-1.415l9.9,9.9L49.082,16.067z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="me-account-profile-shape">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"
                        height="50" width="100%">
                        <path class="exqute-fill-white"
                            d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3 c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3 c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z">
                        </path>
                    </svg>
                </div>

                <div class="me-my-profile-body">
                    <ul>
                        <li>
                            <div class="me-profile-data">
                                <p>Email:</p>
                            </div>
                            <div class="me-profile-data">
                                <p><?php echo $user->user_email; ?></p>
                            </div>
                        </li>
                        <li>
                            <div class="me-profile-data">
                                <p>phone:</p>
                            </div>
                            <div class="me-profile-data">
                                <p>+2547<?php echo $user->user_phone; ?></p>
                            </div>
                        </li>
                        <li>
                            <div class="me-profile-data">
                                <p>Permanent Address</p>
                            </div>
                            <div class="me-profile-data">
                                <p><?php echo $user->user_residence;?>, <?php echo $user->user_country; ?>
                                </p>
                            </div>
                        </li>

                        <li>
                            <div class="me-profile-data">
                                <p>Account Type</p>
                            </div>
                            <div class="me-profile-data">
                                <p><?php echo $user->user_type; ?></p>
                            </div>
                        </li>
                        <!-- get the usernumber -->
                        <?php
                                    $query="SELECT * FROM accounts WHERE account_name ='{$username}'";
                                    $account_numbers=$app->select_all($query);
                                    
                                    
                                    ?>
                        <?php foreach($account_numbers as $account_number): ?>
                        <li>
                            <div class="me-profile-data">
                                <p>Account Number</p>
                            </div>
                            <div class="me-profile-data">
                                <p><?php echo $account_number->account_number;?></p>
                            </div>
                        </li>
                        <li>
                            <?php
                                        $query="SELECT * FROM subscription WHERE username='{$username}'";
                                        $subscriptions=$app->select_all($query);
                                        $query="SELECT * FROM subscription WHERE username='{$username}'";
                                        $subscription_count=$app->count($query);      
                                        ?>
                            <div class="me-profile-data">
                                <p>Subscription Plans</p>
                            </div>
                            <div class="me-profile-data">
                                <?php if($subscription_count > 0 ):?>
                                <?php foreach($subscriptions as $subscription):?>
                                <p><?php echo $subscription->subscription_name;?></p>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <p>No subscription Yet</p>
                                <?php endif; ?>
                            </div>

                        </li>
                        <?php endforeach; ?>
                        <li><a href="<?php echo APPURL ?>auth/logout.php" class="me-btn"id="profLogoutBtn" >Log Out</a></li>
                        <li><button type="button" onclick="showModal()" class="me-btn" id="profEditBtn" >Edit Profile</button>
                        </li>

                        <p>For more details, click the button above.</p>
                    </ul>
                </div>





            </div>
            <?php endforeach; ?>
        </div>

        <div class="col-lg-6">
            <div class="me-account-summary">
                <div class="me-account-summary-head">
                    <div>
                        <h4>Account detail</h4>
                    </div>
                </div>
                <?php
                            $query="SELECT balance FROM main_account";
                            $balanceResult = $app->select_all($query);

                             // Access the balance value from the result object
                             $balance = isset($balanceResult[0]->balance) ? floatval($balanceResult[0]->balance) : 0;  
                               // investment amount
                             $query="SELECT SUM(transaction_amount) AS total_invest_amount
                             FROM transaction
                             WHERE username ='{$username}'
                             AND transaction_type = 'invest'";
                             $result = $app->select_all($query);

                            // Access the total_invest_amount from the result object
                            $totalInvestAmount = isset($result[0]->total_invest_amount) ? floatval($result[0]->total_invest_amount) : 0;
                            // get the latest withdraw transaction
                            $query="SELECT *
                            FROM transaction
                            WHERE transaction_type = 'withdraw'
                            ORDER BY created_at DESC
                            LIMIT 1
                            ";
                            $latest_transactions=$app->select_all($query);
                            $query="SELECT *
                            FROM transaction
                            WHERE transaction_type = 'invest'
                            ORDER BY created_at DESC
                            LIMIT 1
                            ";
                            $latest_investments=$app->select_all($query);

                            ?>

                <div class="me-account-summary-body me-account-money-detail">
                    <ul>
                        <li>
                            <?php
                                    $query="SELECT * FROM accounts WHERE account_name ='{$username}'";
                                    $account_balance=$app->select_all($query);                     
                                    ?>
                            <div class="me-summary-data">
                                <p>Main Account balance</p>
                                <?php foreach($account_balance as $account): ?>
                                <p><strong><?php echo number_format($account->account_balance, 2);?></strong>
                                </p>
                                <?php endforeach; ?>
                            </div>
                            <div class="me-summary-data-add">
                                <input type="number" id="deposit" placeholder="Add Money" required />
                                <button onclick="addMoney()">Add</button>
                            </div>

                        </li>
                        <li>
                            <div class="me-summary-data">
                                <p>Invest amount</p>
                                <p><strong><?php echo number_format($totalInvestAmount, 2); ?></strong></p>
                            </div>
                            <div class="me-summary-data-add">
                                <input type="number" id="investment" placeholder="Invest Money" required />
                                <button onclick="invest()">Invest</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="me-account-summary">
                <div class="me-account-summary-body">
                    <ul>
                        <li>
                            <div class="me-summary-data-add">
                                <input type="number" id="withdraw" placeholder="withdraw money" required />
                                <button onclick="withdraw()">withdraw</button>
                            </div>
                        </li>
                        <?php foreach($latest_transactions as $latest_transaction): ?>
                        <li>
                            <div class="me-summary-data">
                                <p>Last withdrawal</p>
                                <p><strong>KSH
                                        <?php echo  number_format($latest_transaction->transaction_amount,2) ?></strong>
                                </p>
                            </div>
                            <div class="me-summary-data">
                                <?php if($latest_transaction->transaction_status =="succesiful"): ?>
                                <p class="me-data-success">Successful</p>
                                <?php else: ?>
                                <p class="me-data-warning">Successful</p>
                                <?php endif; ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                        <?php foreach($latest_investments as $latest_investment): ?>
                        <li>
                            <div class="me-summary-data">
                                <p>Last investment</p>
                                <p><strong>KSH
                                        <?php echo number_format($latest_transaction->transaction_amount,2) ?>
                                    </strong></p>
                            </div>
                            <div class="me-summary-data">
                                <?php if($latest_investment->transaction_status =="succesiful"): ?>
                                <p class="me-data-success">Successful</p>
                                <?php else: ?>
                                <p class="me-data-warning">Successful</p>
                                <?php endif; ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>



<?php endif; ?>