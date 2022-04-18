<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "app_contact";
	
				try{
					$conn= new PDO("mysql:host={$servername};dbname={$dbname}",$username,$password);
					// $conn->setAtrebute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				}catch(PDOException $e){
					die("Connection failed: ".$e->getMessage());
					 
				}
				return $conn ;
?>