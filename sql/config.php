<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "app_contact";
	
				try{
					$conn= new PDO("mysql:host={$servername};dbname={$dbname}",$username,$password);
				}catch(PDOException $e){
					die("Connection failed: ".$e->getMessage());
					 
				}
				return $conn ;

	
?>