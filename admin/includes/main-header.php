<div class="header">
    <div class="header-content clearfix">

        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0" id="basic-addon1"><i
                            class="icon-magnifier"></i></span>
                </div>
                <input type="search" class="border-0" placeholder="Search Dashboard" aria-label="Search Dashboard">
                <div class="drop-down animated flipInX d-md-none">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="header-right">
            <?php
            $app=new App;            
            $query="SELECT * FROM messages";
            $messages_count=$app->count($query);
            // get the messages
            $query="SELECT * FROM messages LIMIT 4";
            $messages=$app->select_all($query);
           ?>
            <ul class="clearfix">
                <li class="icons d-none d-md-flex">
                    <a href="javascript:void(0)" class="window_fullscreen-x">
                        <i class="icon-frame"></i>
                    </a>
                </li>
                <li class="icons">
                    <a href="javascript:void(0)" class="">
                        <i class="icon-envelope"></i>
                        <span class="badge badge-danger"><?php echo $messages_count ?></span>
                    </a>
                    <div class="drop-down animated flipInX">
                        <div class="dropdown-content-body">
                            <ul>
                                <?php foreach($messages as $message):?>
                                <li class="notification-unread">
                                    <a href="javascript:void()">
                                        <?php
                                        $message_email=$message->email;
                                        $query="SELECT * FROM users WHERE user_email='{$message_email}'";
                                        $users=$app->select_all($query);
                                        
                                        
                                        ?>
                                        <?php foreach($users as $user): ?>
                                        <img class="float-left mr-3 avatar-img"
                                            src="http://localhost/trade/assets/images/<?php echo $user->user_profile; ?>"
                                            alt="avatar">
                                        <?php endforeach; ?>
                                        <div class="notification-content">
                                            <div class="notification-text">
                                                <?php echo substr($message->message, 0, 100) ;?>
                                                !!!...</div>
                                            <?php
                                                 $created_at = $message->created_at;
                                                
                                                 ?>
                                            <div class="notification-timestamp">
                                                <?php echo $app->formatTimeAgo($created_at) ?></div>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <a class="d-flex justify-content-center bg-primary px-4 text-white"
                                href="http://localhost/trade/admin//comments.php">
                                <span>See all messagese </span>
                            </a>
                        </div>
                    </div>
                </li>








                <li class="icons">
                    <?php 
                          $app=new App;
                          $username=$_SESSION['username'];
                          $query="SELECT * FROM users WHERE user_name='$username'";
                          $users=$app->select_all($query);        

                        
                        
                        
                        
                      ?>
                    <?php foreach($users as $user): ?>
                    <div class="user-img c-pointer-x">
                        <span class="activity active"></span>
                        <img src="./images/<?php echo $user->user_profile; ?>" height="40" width="40" alt="avatar">
                    </div>
                    <?php endforeach; ?>
                    <div class="drop-down dropdown-profile animated flipInX">
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="http://localhost/trade/admin/index.php"><i class="icon-user"></i> <span>My
                                            Profile</span></a>
                                </li>


                                <li><a href="javascript:void()"><i class="icon-check"></i>
                                        <span>Online</span></a>
                                </li>
                                <li><a href="http://localhost/trade/index.php"><i class="icon-lock"></i> <span>Lock
                                            Screen</span></a>
                                </li>
                                <li><a href="http://localhost/trade/auth/logout.php"><i class="icon-key"></i>
                                        <span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>


    </div>
</div>