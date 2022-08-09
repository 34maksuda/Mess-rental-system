<?php 
session_start();
require_once("dbConnection.php");
$messId=$_SESSION["messId"];
$roomId=$_REQUEST["roomId"];
$deleteQuery="DELETE FROM roomdetails12 WHERE roomId='$roomId'";
$runDeleteQuery=mysqli_query($connection,$deleteQuery);
if($runDeleteQuery==true){
	header("location:roomProfile.php?messId=$messId");
	setcookie("deleteRoom","gfhj",time()+(30));
}
?>