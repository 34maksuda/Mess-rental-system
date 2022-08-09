<?php
	session_start();
	require_once("dbConnection.php");
	$email=strtolower($_REQUEST["email_addr"]);
	$pwd=$_REQUEST["password"];
	$userId=md5(sha1($email.$pwd));
	$searchQuery="SELECT * FROM registeredperson12 WHERE userId='$userId'";
	$runSearchQuery=mysqli_query($connection,$searchQuery);
	$numOfRows=mysqli_num_rows($runSearchQuery);
	if($runSearchQuery=true){
		if($numOfRows==1){
			$_SESSION["userId"] =$userId;
			$_SESSION["pass"] = $pwd;
			$_SESSION["start"] = time();
			$_SESSION["expire"] = $_SESSION["start"] + (86400*30);
			setcookie("checkLogIn","asdf",time()+(30));
			echo "successful";
		}
		else{
			echo "invalid email or password combination!";
		}
	}
?>