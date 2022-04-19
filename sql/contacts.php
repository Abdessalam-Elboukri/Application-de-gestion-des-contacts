<?php

    class Contacts{
//add constractor of database connection
        public $conn;
        public function __construct($conn){
            $this->conn = $conn;
        }

        public function getContacts($id){
            $sql = "SELECT * FROM `contacts` where `id_user` = ? ";
            $pre =$this->conn ->prepare($sql);
            $pre ->bindParam(1,$id,PDO::PARAM_INT);
            $pre ->execute();
            $result = $pre->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getInputInfo($id){
            $sql = "SELECT * FROM `contacts` where `id_user` = ? ";
            $pre =$this->conn ->prepare($sql);
            $pre ->bindParam(1,$id,PDO::PARAM_INT);
            $pre ->execute();
            $result = $pre->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }


}
?>