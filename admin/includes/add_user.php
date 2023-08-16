<?php
// query to insert
if(isset($_POST['create_user'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $country=$_POST['country'];
    $residence=$_POST['residence'];
    $phone=$_POST['phone'];
    $type=$_POST['user_type'];
    $state=$_POST['user_state'];
    // dealing with  the password
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);

    // dealing with the image
    $profile_image = $_FILES['image']['name'];
    $profile_image_temp = $_FILES['image']['tmp_name'];
    // move the picture to a temporary location
    
// To move the image to the server location from the temporary location
   move_uploaded_file($profile_image_temp, "../assets/images/$profile_image");
//    query here
$query = "INSERT INTO users(user_firstname, user_lastname, user_name,user_email,password,user_country, user_residence, user_phone, user_type, user_state, user_profile) VALUES(:firstname, :lastname, :username,:email,:password, :country, :residence, :phone, :type, :state, :profile)";

 $arr=[
    ":firstname"=>$firstname,
    ":lastname"=>$lastname,
    ":username"=>$username,
    ":email"=>$email,
    ":password"=>$password,
    ":country"=>$country,
    ":residence"=>$residence,
    ":phone"=>$phone,
    ":type"=>$type,
    ":state"=>$state,
    ":profile"=>$profile_image,
    ];
    $app=new App;
    $app->insertWithoutPath($query,$arr);
}

?>
<div class="container-fluid">
    <form action=" " method="post" enctype="multipart/form-data">
        <h2 style="color:white !important;">Add New User</h2>
        <div class="row">
            <div class="col-xl-12">
                <h4 class="card-title mt-5" style="color:white !important;">First Name</h4>
                <div class="form-group">
                    <input type="text" name="firstname" class="form-control input-rounded" placeholder="first Name">
                </div>
                <h4 class="card-title mt-5" style="color:white !important;">Last Name</h4>
                <div class="form-group">
                    <input type="text" name="lastname" class="form-control input-rounded" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">Username</h4>
                    <input type="text" name="username" class="form-control input-rounded"
                        placeholder="Desired Username">

                </div>
                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">email</h4>
                    <input type="text" name="email" class="form-control input-rounded"
                        placeholder="Enter a valid email">

                </div>
                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">Password</h4>
                    <input type="password" name="password" class="form-control input-rounded"
                        placeholder="Enter a good password">

                </div>



                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">Country</h4>
                    <input type="text" name="country" class="form-control input-rounded" placeholder="country">
                </div>
                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">Residence</h4>
                    <input type="text" name="residence" class="form-control input-rounded" placeholder="residence">
                </div>
                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">Phone</h4>
                    <input type="text" name="phone" class="form-control input-rounded" placeholder="phone">
                </div>
                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">User Type</h4>
                    <select name="user_type" id="" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="investor">Investor</option>
                    </select>

                </div>
                <div class="form-group">
                    <h4 class="card-title mt-5" style="color:white !important;">User State</h4>
                    <select name="user_state" id="" class="form-control">
                        <option value="forbidden">Forbiden</option>
                        <option value="allowed">Allowed</option>
                    </select>

                </div>
                <div class="form-group">
                    <!-- add -->
                    <h4 class="card-title mt-5" style="color:white !important;">Add Profile</h4>

                    <input type="file" name="image" class="dropify" data-default-file="" data-max-file-size="3M" />
                </div>
                <div class="form-group">
                    <button type="submit" name="create_user" class="btn p-3 mb-2"
                        style="color: white !important; background-color:#50211F;">Add User</button>
                </div>
            </div>
        </div>
</div>
</form>
</div>