<?php
session_start();
require_once("dbConnection.php");
function clean($string) {
	 return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

if(!empty($_REQUEST["userName"]) && !empty($_REQUEST["userEmail"]) && !empty($_REQUEST["gender"]) && !empty($_REQUEST["userTID"]) && !empty($_REQUEST["userContact"]) &&(strlen($_REQUEST["userContact"]) == 11)){
	$seatId=$_REQUEST["seatId"];
	$totalTk=$_REQUEST["totalTk"];
	$messOwnerContact=$_REQUEST["ownerPhn"];
	$userName=clean($_REQUEST["userName"]);
	$userEmail=$_REQUEST["userEmail"];
	$gender=$_REQUEST["gender"];
	$userTID=$_REQUEST["userTID"];
	$userContact=$_REQUEST["userContact"];
	$insertQuery="INSERT INTO payment12(seatId,userName,userEmail,gender,userTID,userContact,messOwnerContact,totalSeatRent)
	VALUES('$seatId','$userName','$userEmail','$gender','$userTID','$userContact','$messOwnerContact','$totalTk')";
	$runInsertQuery=mysqli_query($connection,$insertQuery);
	if($runInsertQuery==true){
		echo "success";
		setcookie("payRSuccess","plo",time()+(30));
	}
	else{
		echo "problem in insertQuery.";
	}

}
else{
	echo "please fill out all fields with proper constraints!";
 }
?>
