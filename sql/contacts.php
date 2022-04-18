<?php

    class Contacts{
//add constractor of database connection
        public $conn;
        public function __construct($conn){
            $this->conn = $conn;
        }

        public function getContacts(){
            $sql = "SELECT * FROM `contacts` where `id_user` = ? ";
            $pre =$this->conn ->prepare($sql);
            session_start();
            $pre ->bindParam(1,$_SESSION['id_user'],PDO::PARAM_INT);
            var_dump($_SESSION['id_user']);
            $pre ->execute();
            session_write_close();
            $result = $pre->fetchAll(PDO::FETCH_ASSOC);
        }
//get data from database by the admin

}
?>