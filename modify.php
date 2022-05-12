<?php
include_once('sql/config.php');
include_once('sql/user.php');
include_once('sql/contacts.php');

    session_start();
    $user= new User();;
    $contacts= new Contacts();

    $contact=$contacts->getInputInfo($_GET['id']);

    if(isset($_POST['update'])){
    $user->ModifyContact($_GET['id'],$_POST['f-name'],$_POST['l-name'],$_POST['phone'],$_POST['email'],$_POST['address']);
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
    <main class="back">
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
            <div class="  d-flex align-items-center mt-4 ">
                <div class="container home-page mb-3 shadow_1 p-sm-3 p-2 col-sm-10 col-lg-9 col-11">
                <form action="" method="POST" id="login-form">
            <div class="d-flex justify-content-between gap-4 mb-3 ">
                <div class=" d-flex flex-column text-muted col-5 align-items-start">
                    <label for="">First name</label>
                    <input type="text" name="f-name" id="" value="<?php  echo $contact['fname'];?>"  class="w-100 rounded-3 border p-2 form-control">
                </div>
                <div class=" d-flex flex-column text-muted col-5 align-items-start">
                    <label for="">Last name</label>
                    <input type="text" name="l-name" id="" value="<?php  echo $contact['lname']; ?>"  class="w-100 rounded-3 border p-2 form-control">
                </div>
            </div>
                <div class=" d-flex flex-column text-muted align-items-start ">
                    <label for="">E-mail</label>
                    <input type="email" name="email" id="" value="<?php  echo $contact['email']?>"  class="w-100 rounded-3 border p-2 form-control">
                </div>
                <div class=" d-flex flex-column text-muted mt-3 align-items-start">
                    <label for="">Phone</label>
                    <input type="phone" name="phone" id="" value="<?php  echo $contact['phone'] ?>"  class="w-100 rounded-3 border p-2 form-control">
                </div> 
                <div class=" d-flex flex-column text-muted mt-3 align-items-start">
                    <label for="">Address</label>
                    <textarea id="address" name="address" rows="4" cols="" value="" resize ="none" outline="none"><?php  echo $contact['address']; ?></textarea>
                </div>
                <div class="modal-footer">
                    <a href="contact.php" class="btn btn-secondary" data-bs-dismiss="modal">back</a>
                    <input type="submit" name="update" class="btn btn-primary" value="Modify">
                </div>
            </form>
        </div>
                </div>
            </div>
    </div>    
    