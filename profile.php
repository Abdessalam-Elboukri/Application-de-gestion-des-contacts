<?php
include_once('sql/config.php');
include_once('sql/user.php');
include_once('sql/contacts.php');

session_start();


$user = new User($conn);
$rslt=$user->get_user_data($_SESSION['email']);




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
        
    <main class="backprofile"> 
    <nav class="navbar navbar-expand-sm navbar-light bg-azure px-3 " >
                <div class="d-flex  justify-content-between">
                    <a class="navbar-brand" href="profile.php"><img src="./images/E-Contact1.png" width="90px"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto d-flex align-items">
                        <li class="nav-item ">
                            <p class="mt-2"> <?php  echo $_SESSION['fname'] ; ?></abbr></p>
                        </li>
                        <li class="nav-item">
                            <form action="profile.php" method="post">
                                <input type="submit" name="logout" value="Logout" class=" ms-3 btn btn-outline-danger">
                            </form>
                            
                        </li>

                    </ul>
                </div>   
            </div>
        </nav>
        <div class="row align-items-center " style="height: 85vh;">
        <div class="ms-sm-5">
            <div class="col-md-6 col-11 ">
            <div class="text-white profile">
                <h5 class="h3 mb-1">Welcome to  </h5>
                <h1 class="mb-2" style="font-size: 5rem;">E-CONTACT</h1>
                <p style="font-size:19px;">The best platform to manage your Contact</p>
                <div>
                    <ul>
                    <li><a href="contact.php">go to contact</a></li>
                    <li><button type="button" class="eye-btn ms-2" data-bs-toggle="modal" data-bs-target="#exampleModaleye">
                            View Profile
                        </button></li>
                    </ul>
                </div>
            </div>
            <div>
            </div>
            </div>
            </div>
        </div>
    </main>





    <div class="modal fade" id="exampleModaleye" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body show-profile">
        <div class="d-flex justify-content-center mb-3">
            <img src="images/profiles/1.png" alt="" class="profile-img-modal" >
        </div>
        <div class="d-flex">
            <h5>Full Name : </h5>
            <p class="ms-2"><?php echo $rslt['fname'] ." ". $rslt['lname']?></p>
        </div>
        <div class="d-flex">
            <h5>E-mail : </h5>
            <p class="ms-2"><?php echo $rslt['email'] ?></p>
        </div>
        <div class="d-flex">
            <h5>Last SignUp : </h5>
            <p class="ms-2"><?php echo $rslt['l_signup'] ?></p>
        </div>
        <div class="d-flex">
            <h5>Last Login : </h5>
            <p class="ms-2"><?php if(isset($_SESSION['lastlogin'])){
               echo $_SESSION['lastlogin'] ;
            }else{
                echo $rslt['l_signup'];
            } ?></p>

        </div>
      </div>
    </div>
  </div>
</div>

  

