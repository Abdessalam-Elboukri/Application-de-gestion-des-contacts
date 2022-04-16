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
        <?php include 'includes/nav.php'; ?>
            <div class="  d-flex align-items-center mt-4 ">
                <div class="container home-page mb-3 shadow_1 p-sm-3 p-2 col-sm-10 col-lg-9 col-11">
                <form action="" method="POST" id="login-form">
            <div class="d-flex justify-content-between gap-4 mb-3 ">
                <div class=" d-flex flex-column text-muted col-5 align-items-start">
                    <label for="">First name</label>
                    <input type="text" name="f-name" id="" value=""  class="w-100 rounded-3 border p-2 form-control">
                </div>
                <div class=" d-flex flex-column text-muted col-5 align-items-start">
                    <label for="">Last name</label>
                    <input type="text" name="l-name" id="" value=""  class="w-100 rounded-3 border p-2 form-control">
                </div>
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
                    <textarea id="address" name="address" rows="4" cols="" resize ="none" outline="none"></textarea>
                </div>
                <div class="modal-footer">
                    <a href="contact.php" class="btn btn-secondary" data-bs-dismiss="modal">back</a>
                    <input type="submit" class="btn btn-primary" value="Modify">
                </div>
            </form>
        </div>
                </div>
            </div>
    </div>    
    