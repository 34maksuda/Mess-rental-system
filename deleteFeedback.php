<?php
session_start();
require_once("dbConnection.php");
$feedbackId=$_REQUEST["feedbackId"];
$deleteQuery="DELETE FROM feedback12 WHERE feedBackId='$feedbackId'"; 
$runDeleteQuery=mysqli_query($connection,$deleteQuery);
if($runDeleteQuery==true){
	$seatId=$_SESSION["seatId"];
	header("location:showReviews.php?seatId=$seatId");
	setcookie("deleteFeedback","oplkjh",time()+(30));
}
?>