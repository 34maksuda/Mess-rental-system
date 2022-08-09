<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
require_once("dbConnection.php");
if(!empty($_REQUEST["review"])){
	$currentUser=$_SESSION["userId"];
	$seatId=$_REQUEST["seatId"];
	$feedback=$_REQUEST["review"];
	$selectSeat="SELECT roomId from seatdetails12 WHERE seatId='$seatId'";
	$runSelectSeat=mysqli_query($connection,$selectSeat);
	if($runSelectSeat==true){
		$seatRow=mysqli_fetch_array($runSelectSeat);
		$roomId=$seatRow["roomId"];
		$selectRoom="SELECT messId from roomdetails12 WHERE roomId='$roomId'";
		$runSelectRoom=mysqli_query($connection,$selectRoom);
		if($runSelectRoom==true){
			$roomRow=mysqli_fetch_array($runSelectRoom);
			$messId=$roomRow["messId"];
			$selectMess="SELECT userId from messinfo12 WHERE messId='$messId'";
			$runSelectMess=mysqli_query($connection,$selectMess);
			if($runSelectMess==true){
				$messRow=mysqli_fetch_array($runSelectMess);
				$userId=$messRow["userId"];
				$insertQuery="INSERT INTO feedback12(givenId,feedback,seatId,roomId,messId,userId) VALUES('$currentUser','$feedback','$seatId','$roomId','$messId','$userId')";
				$runInsertQuery=mysqli_query($connection,$insertQuery);
				if($runInsertQuery==true){
					$currentId=mysqli_insert_id($connection);
					if(!empty($_FILES["reviewPic"]["name"])){
						for($i=0;$i<5;$i++){
							$reviewPic=$_FILES["reviewPic"]["tmp_name"][$i];
							$nameForDb=uniqid();
							$reviewPicLocation="reviewPic/"."$nameForDb.jpg";
							if(move_uploaded_file($reviewPic,$reviewPicLocation)){
								$checkReviewPic = "SELECT feedbackPic from feedback12 WHERE feedbackId = '$currentId' ";
								$runCheckReviewPic = mysqli_query($connection,$checkReviewPic);
								$feedbackPicSeaechResult=mysqli_fetch_array($runCheckReviewPic);
								$insertingFeedbackPic = $feedbackPicSeaechResult["feedbackPic"].','.$nameForDb.'.jpg' ;
								$insertfeedbackPicImg = "UPDATE feedback12 SET feedbackPic = '$insertingFeedbackPic' WHERE feedbackId='$currentId' ";
								$runInsertfeedbackPicImg = mysqli_query($connection,$insertfeedbackPicImg);
							}
						}
					}
				}
				else{
					echo "error in insertQuery";
				}
			}
			else{
				echo "mess table a userId khuja te problem.";
			}
		}
		else{
			echo "room table a messId khuja te problem.";
		}
	}
	else{
		echo "seat table a roomId khuja te problem.";
	}
	echo "success";
}	
else{
	echo "please give a feedback first!";
}
?>
