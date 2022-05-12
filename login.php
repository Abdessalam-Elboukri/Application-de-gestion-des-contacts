<?php
    
    include('sql/config.php');
    include('sql/user.php');

    if(isset($_POST['submit'])){
        $user = new User();
        $user->login($_POST['email_login'],$_POST['password_login']);
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
        <div class="  d-flex align-items-center mt-5 " style="margin-top:70px !important">
        <div class="container home-page mb-3 shadow_1 p-sm-3 p-2 col-sm-10 col-lg-9 col-11 pt-4 Pb-0">
            <div class="d-flex justify-content-center continr align-items-center flex-wrap-reverse gap-5" >
                <div class="text-section col-12 col-md-6" >
                    <div class="text-center ">
                        <h4 class="fw-bold h2 mb-2">Sign In</h4>
                        <p class="text-muted mb-3">Enter your credentials to access your account</p>
                        <div class="signup d-flex justify-content-center flex-wrap gap-5">
                            <div class="w-100">
                                <form action="login.php" method="POST" id="login-form">
                                    <div class=" d-flex flex-column text-muted align-items-start ">
                                        <label for="">E-mail</label>
                                        <input type="email" name="email_login" id="" value=""  class="email w-100 rounded-3 border p-2 form-control">
                                        <p class="error_style email_error"></p>
                                    </div>
                                    <div class=" d-flex flex-column text-muted mt-3 align-items-start">
                                        <label for="">Password</label>
                                        <input type="password" name="password_login" id="" value=""  class="password w-100 rounded-3 border p-2 form-control">
                                        <p class="error_style pass_error"></p>
                                    </div> 
                                    <div class="d-flex justify-content-end fs-7">
                                        <a href="#">Forgot your password ?</a>
                                    </div>
                                    <div class="oper-buttons d-flex justify-content-center flex-wrap mt-2">
                                        <input type="submit" value="SignIn" name="submit" class="login_btn">
                                    </div>
                                </form>
                                <div class="fs-7 mt-3">
                                    <p>I don't have an account <a href="" class="color-red">Sign Up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
                <div class="img-section col-md-5 col-9 d-flex justify-content-center">
                    <img src="images/Chat With Friends.png">
                </div> 
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>