<?php include "./config/config.php" ?>
<?php include "./libs/App.php"; ?>
<?php include "./includes/header.php" ?>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['username'])){
     echo "<script>window.location.href='http://localhost/trade/index.php'</script>";
}



 ?>

<body>
    <div class="me-main-wraper">
        <?php include "./includes/main_navigation.php" ?>
        <!-- breadcrumb -->
        <div class="me-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="me-breadcrumb-box">
                            <h1>My Account</h1>
                            <p><a href="<?php echo APPURL ?>/home.php">Home</a>my account</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account -->
        <div class="me-my-account me-padder-top" id="displayDataGrid">


        </div>
        <!-- My Account Modal-->

        <div class="modal" id="me-profile-modal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="me-my-profile-head me-my-profile-change">
                        <div class="me-profile-name">
                            <h4>Assist us With this info Please <?php echo $_SESSION['username']; ?></h4>
                        </div>
                        <div class="me-my-profile-img">
                            <div class="me-my-profile-img-main">
                                <img src="assets/images/group__1_-removebg-preview.png" class="img-fluid" alt="image">
                                <div class="me-my-profile-svg">
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
                    <div class="modal-body">
                        <form method="post">
                            <label>
                                <span>Enter the new firstname</span>
                                <input type="text" required id="firstname" />
                            </label>

                            <label>
                                <span>Enter the new lastname</span>
                                <input type="text" required id="lastname" />
                            </label>
                            <label>
                                <span>Enter the new Email</span>
                                <input type="email" required id="email" />
                            </label>
                            <label>
                                <span>Enter the new Password</span>
                                <input type="number" required id="password" />
                            </label>
                            <label>
                                <span>Mobile</span>
                                <input type="number" required id="mobile" />
                            </label>
                            <label>
                                <span>Country</span>
                                <input type="text" required id="country" />
                            </label>
                            <label>
                                <span>Place of Residence</span>
                                <input type="text" id="residence" />
                            </label>
                            <label>
                                <span>Profile Photo</span>
                                <input type="file" id="image" />
                            </label>

                    </div>
                    <div class="modal-footer">
                        <?php
                      $app=new App;
                      $username=$_SESSION['username'];
                      $query="SELECT * FROM users WHERE user_name='$username'";
                      $users=$app->select_all($query);
                     ?>
                        <?php foreach($users as $user): ?>
                        <button class="me-btn" type="button" id="ProfInfBtn"
                            onclick="updateUserdetails(<?php echo $user->user_id ?>);">Save</button>
                        <?php endforeach; ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- My Account Modal-->
        <?php include "./includes/patners.php" ?>

        <!-- Footer -->
        <?php include "./includes/footer.php" ?>
        <!-- sweet alert -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Include jQuery library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
            integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Your addMoney function -->
        <script>
        // Wait for the page to fully load
        $(document).ready(() => {
            displayData();



        });


        function showModal() {

            // Check if the modal exists on the page
            if ($('#me-profile-modal').length) {
                // Show the modal using Bootstrap's modal method
                $('#me-profile-modal').modal('show');
            }

        }

        function displayData() {
            let displayGrid = "true";
            $.ajax({
                url: "ajax/displayprofile.php",
                type: 'POST',
                data: {
                    displayGrid: displayGrid,
                },
                success: function(data, status) {
                    // Update the content of the modal with the retrieved data
                    $('#displayDataGrid').html(data);
                },
            });
        }

        function updateUserdetails(updateId) {

            // Get form data
            let firstnameAdd = $('#firstname').val();
            let lastnameAdd = $('#lastname').val();
            let emailAdd = $('#email').val();
            let passwordAdd = $('#password').val();
            let mobileAdd = $('#mobile').val();
            let countryAdd = $('#country').val();
            let residenceAdd = $('#residence').val();
            let imageAdd = $('#image')[0].files[0]; // Get the selected file (first file from the input)

            // Create a FormData object to handle file uploads
            let formData = new FormData();
            formData.append('firstnameAdd', firstnameAdd);
            formData.append('lastnameAdd', lastnameAdd);
            formData.append('emailAdd', emailAdd);
            formData.append('passwordAdd', passwordAdd);
            formData.append('mobileAdd', mobileAdd);
            formData.append('imageAdd', imageAdd); // Append the file to FormData

            // Append other form data to FormData
            formData.append('updateId', updateId);
            formData.append('countryAdd', countryAdd);
            formData.append('residenceAdd', residenceAdd);

            // Make the AJAX request with FormData to handle file upload
            $.ajax({
                url: "./ajax/update_details.php",
                type: 'POST',
                data: formData,
                contentType: false, // Important! Prevent jQuery from setting the content type
                processData: false, // Important! Prevent jQuery from processing the data
                success: function(data, status) {
                    Swal.fire(
                        'Nice one',
                        'Details updated successfully!',
                        'success'
                    );
                    if ($('#me-profile-modal').length) {
                        // Show the modal using Bootstrap's modal method
                        $('#me-profile-modal').modal('hide');
                    }
                    displayData();
                }
            });
        }

        function addMoney() {
            const depositAmount = $('#deposit').val();

            // Make an AJAX call to deposit.php
            $.ajax({
                type: 'POST',
                url: './ajax/store_deposit_amount.php',
                data: {
                    amount: depositAmount
                },
                success: function(response) {
                    window.location.href = './deposit/deposit_pay.php';
                },
                error: function() {
                    // Handle the error case
                    // Show an error message to the user
                    alert('Error: Unable to deposit. Please try again later.');
                }
            });
        }

        function invest() {
            const investmentAmount = $('#investment').val();

            // Make an AJAX call to deposit.php
            $.ajax({
                type: 'POST',
                url: './ajax/store_inv_amount.php',
                data: {
                    amount: investmentAmount
                },
                success: function(response) {
                    window.location.href = './investment/investment_pay.php';
                },
                error: function() {
                    // Handle the error case
                    // Show an error message to the user
                    alert('Error: Unable to deposit. Please try again later.');
                }
            });
        }

        function withdraw() {
            const withdrawAmount = $('#withdraw').val();

            // Make an AJAX call to deposit.php
            $.ajax({
                type: 'POST',
                url: './ajax/store_withdrawal_amount.php',
                data: {
                    amount: withdrawAmount
                },
                success: function(response) {
                    window.location.href = './withdraw/withdraw.php';
                },
                error: function() {
                    // Handle the error case
                    // Show an error message to the user
                    alert('Error: Unable to deposit. Please try again later.');
                }
            });
        }
        </script>

    </div>
    <?php include "./includes/footer_links.php" ?>
</body>

</html>