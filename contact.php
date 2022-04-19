<?php
session_start();
use LDAP\Result;

    include_once('sql/config.php');
    include_once('sql/user.php');
    include_once('sql/contacts.php');

    //==================get contact===================
    $contact = new Contacts($conn);
    $rst = $contact->getContacts(1);
    echo $_SESSION['id_user'] ;
    //================================================

//    _______add contact___________
if(isset($_POST['sub_add_contact'])){
    $user = new User($conn);
    $user->add_contact('1.png' ,$_POST['f-name'] ,$_POST['l-name'] ,$_POST['email'] ,$_POST['phone'] ,$_POST['address']);
    header('location:./contact.php');
}
//_________end add contact____________
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

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <main class="back">
        <nav class="navbar navbar-expand-lg navbar-light bg-azure px-3 " >
            <div class="container">
                <a class="navbar-brand" href="./index.php">Contact List</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="./login.php">signin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./signup.php">signup</a>
                    </li>

                </ul>
                <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    New Contact
                </button>
                </div>
            </div>
            
        </div>
    </nav>
     <div class="  d-flex align-items-center justify-content-center p-2 mt-4 ">
        <div class=" home-page-contact mb-3 shadow_1  p-2 col-12 col-lg-10" style="overflow:scroll;">
        <div class="row mt-2 px-1 table-responsive" style="height: 75vh;">
                    <table class="table" style="border-collapse: separate; border-spacing: 0 10px;">
                        <thead>
                            <tr class=" text-muted shadow">
                                <th scope="col"></th>
                                <th scope="col" style="font-size:14px;">Name</th>
                                <th scope="col" style="font-size:14px;">Phone</th>
                                <th scope="col" style="font-size:14px;">Email</th>
                                <th scope="col" style="font-size:14px;">address</th>          
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 

                            //  while($row =  $pre->fetch(PDO::FETCH_ASSOC)){ 
                            // $result =  $pre->fetch(PDO::FETCH_ASSOC);                              
                               foreach($rst as $row){
                            ?>
                            <tr class="bg-white shadow text-mutted" style="font-size:13px;">
                                <td class="align-middle">
                                    <img src="images/profiles/<?php echo $row['image']; ?>" width="60" height="60" class="rounded-circle">
                                </td>
                                <td class="align-middle "><?php echo $row['fname'].' ' . $row['lname']; ?></td>
                                <td class="align-middle"><?php echo $row['phone']; ?></td>
                                <td class="align-middle"><?php echo $row['email']; ?></td>
                                <td class="align-middle"><?php echo $row['address']; ?></td>
                                <td class="text-primary align-middle \">
                                    <div class="d-flex align-items-center flex-nowrap gap-3\">
                                        <a href="modify.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></a>
                                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete"><i class="bi bi-trash3 ms-3"></i></a>
                                        <button type="button" class="eye-btn ms-2" data-bs-toggle="modal" data-bs-target="#exampleModaleye">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </td>
                             </tr>   
                            <?php 
                                 } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script>
    //add a function with sweet alert
    $('.delete').click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
                window.location.href = href;
            }
          })
    });
        
       

    </script>



 
 
 <!-- start add contact modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="login-form">
            <div class="d-flex gap-4 mb-3 pe-sm-4">
                <div class=" d-flex flex-column text-muted col-sm-6 align-items-start">
                    <label for="">First name</label>
                    <input type="text" name="f-name" id="" value=""  class="w-100 rounded-3 border p-2 form-control">
                </div>
                <div class=" d-flex flex-column text-muted col-sm-6 align-items-start">
                    <label for="">Last name</label>
                    <input type="text" name="l-name" id="" value=""  class="w-100 rounded-3 border p-2 form-control">
                </div>
            </div>
                <div class=" d-flex flex-column text-muted align-items-start mb-3">
                    <label for="">Contact image</label>
                    <input type="file" name="_image[]" id="" value=""  class="w-100 rounded-3 border p-2 form-control">
                </div>
                <div class=" d-flex flex-column text-muted align-items-start ">
                    <label for="">E-mail</label>
                    <input type="email" name="email" id="" value=""  class="w-100 rounded-3 border p-2 form-control">
                </div>
                
                <div class=" d-flex flex-column text-muted mt-3 align-items-start">
                    <label for="">Phone</label>
                    <input type="phone" name="phone" id="" value=""  class="w-100 rounded-3 border p-2 form-control">
                </div> 
                <div class=" d-flex flex-column text-muted mt-3 align-items-start">
                    <label for="">Address</label>
                    <textarea id="address" name="address" rows="3"  resize ="none" outline="none"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="sub_add_contact" class="btn btn-primary" value="Add">
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
 <!-- end add contact modal -->

  <!-- start view contact modal -->

  <div class="modal fade" id="exampleModaleye" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body show-profile">
        <div class="d-flex justify-content-center mb-3">
            <img src="images/profiles/3.png" alt="" class="profile-img-modal" >
        </div>
        <div class="d-flex">
            <h5>Full Name : </h5>
            <p class="ms-2">Simona Santoro</p>
        </div>
        <div class="d-flex">
            <h5>Phone : </h5>
            <p class="ms-2">0654673428</p>
        </div>
        <div class="d-flex">
            <h5>E-mail : </h5>
            <p class="ms-2">simonasantoro@gmail.com</p>
        </div>
        <div class="d-flex">
            <h5>Address : </h5>
            <p class="ms-2">20hchcj jhscbjqcbq qcbq jqcqc</p>
        </div>
      </div>
    </div>
  </div>
</div>


    <!-- end view contact modal -->

    </body>
</html>