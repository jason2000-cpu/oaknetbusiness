<?php
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
    // get the users data for that id
    $app=new App;
    $query="SELECT * FROM users WHERE user_id='{$user_id}'";
    $users=$app->select_all($query);
}
if(isset($_POST['update'])){
    $user_id=$_GET['user_id'];
    $firstname=$_POST['user_firstname'];
    $lastname=$_POST['user_lastname'];
    $phone=$_POST['user_phone'];
    $residence=$_POST['user_firstname'];
    $country=$_POST['user_country'];
    $type=$_POST['user_type'];
    $state=$_POST['user_state'];
    $email=$_POST['user_email'];
    // dealing with  the password
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);

    // dealing with the image
    $profile_image = $_FILES['user_profile']['name'];
    $profile_image_temp = $_FILES['user_profile']['tmp_name'];

      // move the picture to a temporary location
    
// To move the image to the server location from the temporary location
   move_uploaded_file($profile_image_temp, "../assets/images/$profile_image");

//    perform the update query
                    $query="UPDATE users
                    SET user_firstname =:firstname,
                    user_lastname =:lastname,
                    user_phone =:phone,
                    user_residence =:residence,
                    user_country =:country,
                    user_type =:type,
                    user_state =:state,
                    password =:password,
                    user_profile =:profile,
                    user_email =:email
                    WHERE user_id='{$user_id}';";

                    // array
                    $arr=[
                   ":firstname"=>$firstname,
                   ":lastname"=>$lastname,
                   ":phone"=>$phone,
                   ":residence"=>$residence,
                   ":country"=>$country,
                   ":state"=>$state,
                   ":password"=>$password,
                   ":type"=>$type,
                   ":profile"=>$profile_image,
                   ":email"=>$email,
                     ];
                    //  if succesiful
                    $path="http://localhost/trade/admin/users.php";
                     $app->update($query,$arr,$path);


}



?>

<div class="container-fluid">
    <?php foreach($users as $user): ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h2 style="color:white !important;">Edit User</h2>
        <div class="row">
            <div class="col-xl-12">
                <h4 class="card-title mt-5" style="color:white !important;">Firstname</h4>
                <div class="form-group">
                    <input type="text" class="form-control" name="user_firstname" placeholder="Firstname"
                        value='<?php echo $user->user_firstname ?>'>
                </div>
                <h4 class="card-title mt-5" style="color:white !important;">Lastname</h4>
                <div class="form-group">
                    <input type="text" name="user_lastname" class="form-control" placeholder="Lastname"
                        value='<?php echo $user->user_lastname ?>'>
                </div>
                <h4 class="card-title mt-5" style="color:white !important;">Email</h4>
                <div class="form-group">
                    <input type="email" name="user_email" class="form-control" placeholder="email"
                        value='<?php echo $user->user_email?>'>
                </div>
                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">Password</h4>
                    <input type="password" name="password" class="form-control" placeholder="new password here" value=''
                        required>
                </div>
                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">User Type</h4>
                    <select class="form-control" name="user_type">
                        <option value='<?php echo $user->user_type?>'><?php  echo $user->user_type;?></option>
                        <option value='admin'>Admin</option>
                        <option value='investor'>investor</option>
                    </select>
                </div>

                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">User State</h4>
                    <select class="form-control" name="user_state">
                        <option value='<?php echo $user->user_state?>'><?php echo $user->user_state; ?></option>
                        <option value='allowed'>Allowed</option>
                        <option value='forbidden'>Forbidden</option>
                    </select>
                </div>
                <h4 class="card-title mt-5" style="color:white !important;">Phone Number</h4>
                <div class="form-group">
                    <input type="text" name="user_phone" id="" value='<?php echo $user->user_phone?>'>
                </div>
                <h4 class="card-title mt-5" style="color:white !important;">Residence</h4>
                <div class="form-group">
                    <input type="text" name="user_residence" id="" value='<?php echo $user->user_residence?>'>
                </div>
                <h4 class="card-title mt-5" style="color:white !important;">Country</h4>
                <div class="form-group">
                    <input type="text" name="user_country" id="" value='<?php echo $user->user_country?>'>
                </div>
                <h4 class="card-title mt-5" style="color:white !important;">New Profile Picture</h4>
                <div class="form-group">
                    <!-- add -->
                    <img src="../../assets/images/<?php echo $user->user_profile ?>" style="height: 50px; width:50px;"
                        alt="">
                    <input type="file" name="user_profile" class="dropify" data-default-file=""
                        data-max-file-size="3M" />
                </div>
                <div class="form-group">


                    <button type="submit" name="update" class="btn p-3 mb-2"
                        style="color: white !important; background-color:#50211F;">Update User</button>


                </div>
            </div>
        </div>
</div>
</form>
<?php endforeach; ?>
</div>