<?php
    
    include('sql/config.php');
    include('sql/user.php');

    if(isset($_POST['sign_up_user'])){
        $user = new User();
        $user->signup($_POST['f-name'],$_POST['l-name'],$_POST['email'],$_POST['password'],$_POST['c_password']);
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Contact List</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <main class="">
    <?php include 'includes/nav.php'; ?>
        <div class="  d-flex align-items-center mt-4 ">
        <div class="container home-page mb-3 shadow_1 p-sm-3 p-2 col-sm-10 col-lg-9 col-11 pt-4 Pb-0">
            <div class="d-flex justify-content-center continr align-items-center flex-wrap-reverse gap-5" >
                <div class="text-section col-12 col-md-5" >
                    <div class="text-center ">
                        <h4 class="fw-bold h2 mb-2">Sign Up</h4>
                        <p class="text-muted mb-3">Enter your credentials to create your account</p>
                        <div class="signup d-flex justify-content-center flex-wrap gap-2">
                        <form action="signup.php" method="POST" id="signup-form">
                        <div class="d-flex gap-4 pe-sm-4">
                            <div class=" d-flex flex-column text-muted col-sm-6 align-items-start">
                                <label for="">First name</label>
                                <input type="text" name="f-name" id="" value=""  class="fname w-100 rounded-3 border p-2 form-control">
                                <p class="error_style fname_error test"></p>
                            </div>
                            <div class=" d-flex flex-column text-muted col-sm-6 align-items-start">
                                <label for="">Last name</label>
                                <input type="text" name="l-name" id="" value=""  class="lname w-100 rounded-3 border p-2 form-control">
                                <p class="error_style lname_error"></p>
                            </div>
                        </div>
                            <div class=" d-flex flex-column text-muted align-items-start ">
                                <label for="">E-mail</label>
                                <input type="email" name="email" id="" value=""  class="email w-100 rounded-3 border p-2 form-control">
                                <p class="error_style email_error"></p>
                            </div>
                            <div class=" d-flex flex-column text-muted align-items-start">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" value=""  class="password w-100 rounded-3 border p-2 form-control">
                                <p class="error_style pass_error"></p>
                            </div> 
                            <div class=" d-flex flex-column text-muted  align-items-start">
                                <label for="">Comfirm Password</label>
                                <input type="password" name="c_password" id="" value=""  class="password2 w-100 rounded-3 border p-2 form-control">
                                <p class="error_style pass2_error"></p>
                            </div>
                            <div class="oper-buttons d-flex justify-content-center flex-wrap ">
                                <input type="submit" value="SignUp" name="sign_up_user" class="signup_btn">
                            </div>
                            </form>
                            <div class="fs-7 m0">
                                <p>Already have an account <a href="" class="color-red">LogIn</a></p>
                            </div>
                        </div>
                    </div>                   
                </div>
                <div class="img-section col-md-5 col-9 d-none d-md-flex justify-content-center">
                    <img src="images/signup_img.png">
                </div> 
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    </main>


</body>
</html>