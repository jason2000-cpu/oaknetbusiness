<!-- main header -->


<!-- <?php session_start() ?> -->
<div class="me-main-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-7">
                <div class="me-logo">
                    <a href="home.php"><img src="<?php echo APPURL ?>/assets/images/group__1_-removebg-preview.png"
                            alt="logo" /></a>
                </div>
            </div>
            <div class="col-sm-9 col-5">
                <div class="me-menu">
                    <ul >
                        <li><a href="http://localhost/trade/home.php" id="homeLink">Home</a></li>
                        <li><a href="http://localhost/trade/about.php" id="aboutLink">About</a></li>
                        <li><a href="http://localhost/trade/service.php" id="servicesLink">Services</a></li>
                        <li class="me-menu-children">
                            <a href="javascript:;">Pages</a>
                            <ul class="me-sub-menu">
                                <li><a href="http://localhost/trade/plans.php" id="invstmntLink" >Investment Plan</a></li>
                                <li><a href="http://localhost/trade/faq.php" id="faqLink">Faq</a></li>
                                <li><a href="http://localhost/trade/my-account.php" id="accountLink">My Account</a></li>
                            </ul>
                        </li>
                        <li><a href="http://localhost/trade/Blog.php" id="reportsLink">Reports</a></li>
                        <li><a href="http://localhost/trade/contact.php" id="contactsLink">Contact</a></li>
                        <li class="me-menu-children">
                            <a style="color:#562221!important;"
                                href="javascript:;"><?php echo $_SESSION['username'] ?></a>
                            <ul class="me-sub-menu">
                                <li><a  id="logout" href="http://localhost/trade/auth/logout.php">Logout</a></li>

                            </ul>
                        </li>
                        <!-- <li><a href="contact.php"><?php echo $_SESSION['user_name'] ?></a></li> -->

                    </ul>
                    <div class="me-toggle-nav">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>