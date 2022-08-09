<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
require_once("dbConnection.php");
if(!empty($_REQUEST["review"])){
	$feedbackId=$_REQUEST["feedbackId"];
	$feedback=$_REQUEST["review"];
	$updateQuery="UPDATE feedback12 SET feedback ='$feedback' WHERE feedBackId='$feedbackId'";
	$runUpdateQuery=mysqli_query($connection,$updateQuery);
	if($runUpdateQuery==true){
		if(!empty($_FILES["reviewPic"]["name"])){
			for($i=0;$i<5;$i++){
				$reviewPic=$_FILES["reviewPic"]["tmp_name"][$i];
				$nameForDb=uniqid();
				$reviewPicLocation="reviewPic/"."$nameForDb.jpg";
				if(move_uploaded_file($reviewPic,$reviewPicLocation)){
					$checkReviewPic = "SELECT feedbackPic from feedback12 WHERE feedbackId = '$feedbackId'";
					$runCheckReviewPic = mysqli_query($connection,$checkReviewPic);
					$feedbackPicSeaechResult=mysqli_fetch_array($runCheckReviewPic);
					if($i==0){
						$insertingFeedbackPic =",".$nameForDb.'.jpg' ;
					}
					else{
						$insertingFeedbackPic = $feedbackPicSeaechResult["feedbackPic"].','.$nameForDb.'.jpg' ;
					}
					$insertfeedbackPicImg = "UPDATE feedback12 SET feedbackPic = '$insertingFeedbackPic' WHERE feedbackId='$feedbackId' ";
					$runInsertfeedbackPicImg = mysqli_query($connection,$insertfeedbackPicImg);
				}
			}
		}
	}
	else{
		echo "error in updateQuery";
	}
	echo "success";
}	
else{
	echo "please give a feedback first!";
}
?>
