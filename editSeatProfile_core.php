<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
require_once("dbConnection.php");
function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
if(!empty($_REQUEST["seatNo"]) && !empty($_REQUEST["seatRent"]) && !empty($_REQUEST["serviceCharge"]) && !empty($_REQUEST["seatStatus"]) && !empty($_REQUEST["securityDeposit"])){

	$oldSeatId = $_REQUEST["seatId"];
	$seatNo=clean($_REQUEST["seatNo"]);
	$seatRent=$_REQUEST["seatRent"];
	$serviceCharge=$_REQUEST["serviceCharge"];
	$seatStatus = $_REQUEST["seatStatus"];
	$securityDeposit=$_REQUEST["securityDeposit"];
	$searchSeat="SELECT roomId FROM seatdetails12 WHERE seatId='$oldSeatId'";
	$runSearchSeat=mysqli_query($connection,$searchSeat);
	if($runSearchSeat==true){
		$roomRow=mysqli_fetch_array($runSearchSeat);
		$roomId=$roomRow["roomId"];
		$newSeatId=$roomId.$seatNo;
		$updateSeatId="UPDATE seatdetails12 SET seatId='$newSeatId',seatNo='$seatNo',seatRent='$seatRent',serviceCharge='$serviceCharge',seatStatus ='$seatStatus',securityDeposit='$securityDeposit' WHERE seatId='$oldSeatId'";
		$runUpdateSeatId=mysqli_query($connection,$updateSeatId);
		if($runUpdateSeatId==true){
			if(!empty($_FILES["seatPic"]["name"])){
				for($i=0;$i<2;$i++){
					$seatPic=$_FILES["seatPic"]["tmp_name"][$i];
					$nameForDb=uniqid();
					$seatPicLocation="roomPictures/"."$nameForDb.jpg";
					if(move_uploaded_file($seatPic,$seatPicLocation)){
						if($i>0){
							$checkSeatPic = "SELECT seatPic from seatdetails12 WHERE seatId = '$newSeatId' ";
							$runCheckSeatPic = mysqli_query($connection,$checkSeatPic);
							$seatPicSearchResult=mysqli_fetch_array($runCheckSeatPic);
							$insertingSeatPic = $seatPicSearchResult["seatPic"].','.
							$nameForDb.'.jpg' ;
							$updateSeatPic1 = "UPDATE seatdetails12 SET seatPic = '$insertingSeatPic' WHERE seatId='$newSeatId' ";
							$runUpdateSeatPic1 = mysqli_query($connection,$updateSeatPic1);
						}
						else{
							$CSeatPic=",".$nameForDb.".jpg";
							$updateSeatPic2 = "UPDATE seatdetails12 SET seatPic = '$CSeatPic' WHERE seatId='$newSeatId' ";
							$runUpdateSeatPic2 = mysqli_query($connection,$updateSeatPic2);

						}
					}			
				}
			}
			else{
				echo "seatPic nai";
			}
			echo "success";
		}
		else{
			echo "please give a unique seat No. for each room.";
		}
	}
	else{
		echo "seat table a roomId khujate problem";
	}

	setcookie("seatupdated","hgjk",time()+(30));
}
else{
	echo "please fill out all fields.";
}