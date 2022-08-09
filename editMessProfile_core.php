<?php
session_start();
require_once("dbConnection.php");
function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
if(!empty($_REQUEST["messName"]) && !empty($_REQUEST["messType"]) && !empty($_REQUEST["messLocation"]) && !empty($_REQUEST["numOfFloor"]) && !empty($_REQUEST["messOwnerStatus"]) && !empty($_REQUEST["securityGurdStatus"]) && !empty($_REQUEST["SF"]) && !empty($_REQUEST["maidStatus"]) && !empty($_REQUEST["roomStatus"]) && !empty($_REQUEST["leaseTerm"]) && !empty($_REQUEST["tenantType"]) && !empty($_FILES["messprofilePic"]["tmp_name"])){

	$oldMessId=$_REQUEST["messId"];
	$messName=clean(strtolower($_REQUEST["messName"]));
	$messType=$_REQUEST["messType"];
	$messLoc=$_REQUEST["messLocation"];
	$numOfFloor=$_REQUEST["numOfFloor"];
	$messOwnerStatus=$_REQUEST["messOwnerStatus"];
	$securityGuardStatus=$_REQUEST["securityGurdStatus"];
	$maidStatus=$_REQUEST["maidStatus"];
	$roomStatus=$_REQUEST["roomStatus"];
	$specialFeature=$_REQUEST["SF"];
	$leaseTerm=$_REQUEST["leaseTerm"];
	$tenantType=$_REQUEST["tenantType"];
	$messPic=$_FILES["messprofilePic"]["tmp_name"];
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
		$newMessId=$userEmail.$messName;
		$updateQuery="UPDATE messinfo12 SET messId='$newMessId',userId='$currentUser',messName='$messName',messType='$messType',messLocation='$messLoc',numOfFloor='$numOfFloor',messOwnerStatus='$messOwnerStatus',securityGurdStatus='$securityGuardStatus',maidStatus='$maidStatus',roomStatus='$roomStatus',specialFeatures='$sf',leaseTerm='$leaseTerm',tenantType='$tenantType',messPic='$nameForMessDb.jpg' WHERE messId='$oldMessId'";
		$runUpdateQuery=mysqli_query($connection,$updateQuery);
		if($runUpdateQuery==true){
			$selectRoomId="SELECT roomId,roomNo from roomdetails12 WHERE messId='$newMessId'";
			$runSelectRoomId=mysqli_query($connection,$selectRoomId);
			$numOfRoom=mysqli_num_rows($runSelectRoomId);
			if($runSelectRoomId==true && $numOfRoom>0){
				$m=1;
				while($roomNo=mysqli_fetch_array($runSelectRoomId)){
					$oldRoomId=$roomNo["roomId"];
					$newRoomId=$newMessId.$roomNo["roomNo"];
					$updateRoomId="UPDATE roomdetails12 SET roomId='$newRoomId' WHERE roomId='$oldRoomId'";
					$runUpdateRoomId=mysqli_query($connection,$updateRoomId);
					if($runUpdateRoomId==true){
						$selectSeat="SELECT seatId,seatNo FROM seatdetails12 WHERE roomId='$newRoomId'";
						$runSelectSeat=mysqli_query($connection,$selectSeat);
						$numOfSeat=mysqli_num_rows($runSelectSeat);
						if($runSelectSeat==true && $numOfSeat > 0){
							while($seat=mysqli_fetch_array($runSelectSeat)){
								$oldSeatId=$seat["seatId"];
								$newSeatId=$newRoomId.$seat["seatNo"];
								$updateSeatId="UPDATE seatdetails12 SET seatId='$newSeatId' WHERE seatId='$oldSeatId'";
								$runUpdateSeatId=mysqli_query($connection,$updateSeatId);
							}
						}
					}
					else{
						echo "roomdetails12 update query is wrong!";
					}
					if($m==1){ echo "success"; }
					$m++;
				}
			}
			else{
				echo "success";
			}

		}
		else{
			echo "please use a unique mess name!";
		}
	}
	else{ 
		echo "person khoja te problem";
	}
	setcookie("MPESC","sdfg",time()+(30));
}
else if(!empty($_REQUEST["messName"]) && !empty($_REQUEST["messType"]) && !empty($_REQUEST["messLocation"]) && !empty($_REQUEST["numOfFloor"]) && !empty($_REQUEST["messOwnerStatus"]) && !empty($_REQUEST["securityGurdStatus"]) && !empty($_REQUEST["maidStatus"]) && !empty($_REQUEST["SF"]) && !empty($_REQUEST["roomStatus"]) && !empty($_REQUEST["leaseTerm"]) && !empty($_REQUEST["tenantType"])){

	$oldMessId=$_REQUEST["messId"];
	$messName=clean(strtolower($_REQUEST["messName"]));
	$messType=$_REQUEST["messType"];
	$messLoc=$_REQUEST["messLocation"];
	$numOfFloor=$_REQUEST["numOfFloor"];
	$messOwnerStatus=$_REQUEST["messOwnerStatus"];
	$securityGuardStatus=$_REQUEST["securityGurdStatus"];
	$maidStatus=$_REQUEST["maidStatus"];
	$roomStatus=$_REQUEST["roomStatus"];
	$specialFeature=$_REQUEST["SF"];
	$leaseTerm=$_REQUEST["leaseTerm"];
	$tenantType=$_REQUEST["tenantType"];
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
		$newMessId=$userEmail.$messName;
		$updateQuery="UPDATE messinfo12 SET messId='$newMessId',userId='$currentUser',messName='$messName',messType='$messType',messLocation='$messLoc',numOfFloor='$numOfFloor',messOwnerStatus='$messOwnerStatus',securityGurdStatus='$securityGuardStatus',maidStatus='$maidStatus',roomStatus='$roomStatus',specialFeatures='$sf',leaseTerm='$leaseTerm',tenantType='$tenantType' WHERE messId='$oldMessId'";
$runUpdateQuery=mysqli_query($connection,$updateQuery);
		if($runUpdateQuery==true){
			$selectRoomId="SELECT roomId,roomNo from roomdetails12 WHERE messId='$newMessId'";
			$runSelectRoomId=mysqli_query($connection,$selectRoomId);
			$numOfRoom=mysqli_num_rows($runSelectRoomId);
			if($runSelectRoomId==true && $numOfRoom>0){
				$m=1;
				while($roomNo=mysqli_fetch_array($runSelectRoomId)){
					$oldRoomId=$roomNo["roomId"];
					$newRoomId=$newMessId.$roomNo["roomNo"];
					$updateRoomId="UPDATE roomdetails12 SET roomId='$newRoomId' WHERE roomId='$oldRoomId'";
					$runUpdateRoomId=mysqli_query($connection,$updateRoomId);
					if($runUpdateRoomId==true){
						$selectSeat="SELECT seatId,seatNo FROM seatdetails12 WHERE roomId='$newRoomId'";
						$runSelectSeat=mysqli_query($connection,$selectSeat);
						$numOfSeat=mysqli_num_rows($runSelectSeat);
						if($runSelectSeat==true && $numOfSeat > 0){
							while($seat=mysqli_fetch_array($runSelectSeat)){
								$oldSeatId=$seat["seatId"];
								$newSeatId=$newRoomId.$seat["seatNo"];
								$updateSeatId="UPDATE seatdetails12 SET seatId='$newSeatId' WHERE seatId='$oldSeatId'";
								$runUpdateSeatId=mysqli_query($connection,$updateSeatId);
							}
						}
					}
					else{
						echo "roomdetails12 update query is wrong!";
					}
					if($m==1){ echo "success"; }
					$m++;
				}
			}
			else{
				echo "success";
			}

		}
		else{
			echo "please use a unique mess name!";
		}
	}
	else{ 
		echo "person khoja te problem";
	}
	setcookie("MPESC","sdfg",time()+(30));
}
else{
	echo "Please fill out all fields.";
}
?>