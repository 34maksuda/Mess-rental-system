<?php 
session_start();
require_once("dbConnection.php");
$roomId=$_SESSION["roomId"];
$seatId=$_REQUEST["seatId"];
$deleteQuery="DELETE FROM seatdetails12 WHERE seatId='$seatId'";
$runDeleteQuery=mysqli_query($connection,$deleteQuery);
if($runDeleteQuery==true){
	header("location:seatProfile.php?roomId=$roomId");
	setcookie("deleteseat","jklo",time()+(30));
}
?>