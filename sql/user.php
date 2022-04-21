<?php
class User {

public $conn;

function __construct($conn) {
    $this->conn = $conn;
    }
//fuction to login
public function login($email,$password){
        if(empty($email) || empty($password)){
            echo "Please fill all the fields";
        }else{  

        $sql = "SELECT * FROM `users` WHERE `email` =? AND `password` =?";
        $stmt = $this->conn ->prepare($sql);
        $stmt -> bindParam(1,$email, PDO::PARAM_STR);
        $stmt -> bindParam(2,$password, PDO::PARAM_STR);
        $stmt ->execute();
        $result = $stmt ->fetch(PDO::FETCH_ASSOC);
        if($result){
            session_start();
            $_SESSION['email'] = $result['email'];
            $_SESSION['fname'] = $result['fname'];
            $_SESSION['lname'] = $result['lname'];
            $_SESSION['id_user'] = $result['id'];
            
            $date = date('Y-m-d');
            $time = date('h:i:sa');
            $l_login = $date." ".$time;
            $_SESSION['lastlogin'] = $l_login;

            //function to set cookie
            // setcookie('email',$email,time()+3600);
            // setcookie('password',$password,time()+3600);

            header('location:./profile.php');
        
        }else{
            echo "Invalid email or password";
        }
    }
}



public function signup($fname, $lname, $email, $password, $c_password){

    if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($c_password)){
        echo "All fields are required";
    }else{
        if($password != $c_password){
            echo "Password does not match";
        }
        else{
            $query = "SELECT * FROM `users` WHERE `email` =?";
            $prep = $this->conn ->prepare($query);
            $prep -> bindParam(1,$email, PDO::PARAM_STR);
            $prep ->execute();
            $result = $prep ->fetch(PDO::FETCH_ASSOC);
            if($result){
                echo'this email is already exist ';
            }else{
                $date = date('Y-m-d');
                $time = date('h:i:sa');
                $signup_time = $date." ".$time;
                

                $sql = "INSERT INTO `users` (`fname`, `lname`, `email`, `password`, `l_signup` )VALUES(?, ?, ?, ?,?)";
                $stmt =$this->conn ->prepare($sql);
                $stmt -> bindParam(1,$fname, PDO::PARAM_STR);
                $stmt -> bindParam(2,$lname, PDO::PARAM_STR);
                $stmt -> bindParam(3,$email, PDO::PARAM_STR);
                $stmt -> bindParam(4,$password, PDO::PARAM_STR);
                $stmt -> bindParam(5,$signup_time, PDO::PARAM_STR);
                $stmt->execute();

                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['fname'] = $result['fname'];
                $_SESSION['lname'] = $result['lname'];
                $_SESSION['id_user'] = $result['id'];
                $_SESSION['signup_time'] = $result['l_signup'];

                header('location:./profile.php');
            }      
        }
    }
}
// _________________function add contact _________-
public function add_contact($image, $fname, $lname, $email, $phone, $address){

    $target = "images/profiles/".basename($image);

    if(empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($address)){//add image for valide
        echo "All fields are required";
    }else{
        $sql = "INSERT  INTO `contacts` (`id_user`,`image`,`fname`, `lname`, `email`, `phone`, `address`)VALUES(?, ?, ?, ?, ?,?,?)";
        $pre =$this->conn ->prepare($sql);
        session_start();
        $pre->bindparam(1,$_SESSION['id_user'], PDO::PARAM_STR);
        $pre->bindparam(2,$image, PDO::PARAM_STR);
        $pre->bindparam(3,$fname, PDO::PARAM_STR);
        $pre->bindparam(4,$lname, PDO::PARAM_STR);
        $pre->bindparam(5,$email, PDO::PARAM_STR);
        $pre->bindparam(6,$phone, PDO::PARAM_STR);
        $pre->bindparam(7,$address, PDO::PARAM_STR);
        $pre ->execute();  
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Image uploaded successfully";
        }else{
            echo"Failed to upload image";
        }     
    }

}


public function ModifyContact($id,$fname, $lname, $phone, $email , $address){

        if(empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($address)){
            echo "All fields are required";
        }else{
            $sql = "UPDATE `contacts` SET `fname`=?,`lname`=?,`email`=?,`phone`=?,`address`=? WHERE `id`=?";
            $stmt =$this->conn ->prepare($sql);
            $stmt -> bindParam(1,$fname, PDO::PARAM_STR);
            $stmt -> bindParam(2,$lname, PDO::PARAM_STR);
            $stmt -> bindParam(3,$email, PDO::PARAM_STR);
            $stmt -> bindParam(4,$phone, PDO::PARAM_STR);
            $stmt -> bindParam(5,$address, PDO::PARAM_STR);
            $stmt -> bindParam(6,$id, PDO::PARAM_INT);
            $stmt->execute();
            header('location:./contact.php');
            }

}


//function to delete contact
public function delete_contact($id){
    $sql = "DELETE FROM `contacts` WHERE `id`=?";
    $stmt = $this->conn ->prepare($sql);
    $stmt -> bindParam(1,$id, PDO::PARAM_INT);
    $stmt ->execute();
    header('location:./profile.php');
}

//function to destroy session
public function logout(){
    session_destroy();
    header('location:./index.php');
}

//function to get user data
public function get_user_data($email){
    $sql = "SELECT * FROM `users` WHERE `email`=?";
    $stmt = $this->conn ->prepare($sql);
    $stmt -> bindParam(1,$email, PDO::PARAM_STR);
    $stmt ->execute();
    $result = $stmt ->fetch(PDO::FETCH_ASSOC);
    return $result;
}

}

$user = new User($conn);
if(isset($_POST['logout'])){
    $user->logout();
}
?>