<?php
session_start();
require_once("dbConnection.php");
function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
if(!empty($_REQUEST["messName"]) && !empty($_REQUEST["messType"]) && !empty($_REQUEST["messLocation"]) && !empty($_REQUEST["numOfFloor"]) && !empty($_REQUEST["messOwnerStatus"]) && !empty($_REQUEST["securityGuardStatus"]) && !empty($_REQUEST["specialFeature"]) && !empty($_REQUEST["maidStatus"]) && !empty($_REQUEST["roomStatus"]) && !empty($_REQUEST["leaseTerm"]) && !empty($_REQUEST["tenantType"]) && !empty($_FILES["messPic"])){ 

	$messName=clean(strtolower($_REQUEST["messName"]));
	$messType=$_REQUEST["messType"];
	$messLoc=$_REQUEST["messLocation"];
	$numOfFloor=$_REQUEST["numOfFloor"];
	$messOwnerStatus=$_REQUEST["messOwnerStatus"];
	$securityGuardStatus=$_REQUEST["securityGuardStatus"];
	$maidStatus=$_REQUEST["maidStatus"];
	$roomStatus=$_REQUEST["roomStatus"];
	$specialFeature=$_REQUEST["specialFeature"];
	$leaseTerm=$_REQUEST["leaseTerm"];
	$tenantType=$_REQUEST["tenantType"];
	$messPic=$_FILES["messPic"]["tmp_name"];	
	$messLocation="messPictures/";
	$nameForMessDb=uniqid();
	move_uploaded_file($messPic,$messLocation."$nameForMessDb.jpg");
	$currentUser=$_SESSION["userId"];
	$sf = "";
		foreach ($specialFeature as $sf1) {
			$sf.= $sf1.",";
		}
	$searchQuery="SELECT * FROM registeredperson12 WHERE userId='$currentUser'";
	$runSearchQuery=mysqli_query($connection,$searchQuery);
	if($runSearchQuery==true){
		$row=mysqli_fetch_array($runSearchQuery);
		$userEmail=$row["email"];
		$messId=$userEmail.$messName;
		$selectQuery="SELECT * FROM messinfo12 WHERE messId='$messId'";
		$runSelectQuery=mysqli_query($connection,$selectQuery);
		$numOfRows=mysqli_num_rows($runSelectQuery);
		if($runSelectQuery==true){
			if($numOfRows==0){
				$insertQuery="INSERT INTO messinfo12(messId,userId,messName,messType,messLocation,numOfFloor,messOwnerStatus,securityGurdStatus,maidStatus,roomStatus,specialFeatures,leaseTerm,tenantType,messPic) VALUES('$messId','$currentUser','$messName','$messType','$messLoc','$numOfFloor','$messOwnerStatus','$securityGuardStatus','$maidStatus','$roomStatus','$sf','$leaseTerm','$tenantType','$nameForMessDb.jpg')";
				$runInsertQuery=mysqli_query($connection,$insertQuery);
				if($runInsertQuery==true){
					echo "success";
				}
				else{
					echo "not success";
				}
			}
			else{
				echo "Your Hostle/Mess has already registered!";
			}
		}
	}
}
	
else{
	echo "Please fill out all fields.";
}
?>