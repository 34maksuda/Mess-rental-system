<?php
session_start();
require_once("dbConnection.php");
function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

if(!empty($_REQUEST["fname"]) && !empty($_REQUEST["lname"]) && !empty($_REQUEST["email"]) && !empty($_REQUEST["pwd"]) && (strlen($_REQUEST["pwd"]) >= 8) && !empty($_REQUEST["gender"]) && !empty($_REQUEST["phone"]) && is_numeric($_REQUEST["phone"]) && (strlen($_REQUEST["phone"]) == 11)){
	
	$fname=clean($_REQUEST["fname"]);
	$lname=clean($_REQUEST["lname"]);
	$email=strtolower($_REQUEST["email"]);
	$pwd=$_REQUEST["pwd"];
	$encryptedPwd=md5(sha1($pwd));
	$gender=$_REQUEST["gender"];
	$phone=$_REQUEST["phone"];
	$userId=md5(sha1($email.$pwd));
	$searchQuery="SELECT * FROM registeredperson12 WHERE email='$email'";
	$runSearchQuery=mysqli_query($connection,$searchQuery);
	$numOfRows=mysqli_num_rows($runSearchQuery);
	if($runSearchQuery==true){
		if($numOfRows==0){
			$insertData="INSERT INTO registeredperson12(userId,firstName,lastName,email,password,gender,contactNumber) VALUES('$userId','$fname','$lname','$email','$encryptedPwd','$gender','$phone')";
			$runInsertQuery=mysqli_query($connection,$insertData);
			if($runInsertQuery==true){
				setcookie("checkRegis","qvgf", time() + (30));
				echo "successful";
			}
			else{
				echo "inserData query vul";
			}
		}
		else{
			echo "wrong";
		}
	}
	else{
		echo "searchQuery error";
	}
}
else{
	echo "please fill out all fields with proper constraints.";
}
?>