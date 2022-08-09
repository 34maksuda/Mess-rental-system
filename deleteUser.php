<?php 
session_start();
require_once("dbConnection.php");
$userId=$_REQUEST["userId"];
$deleteQuery="DELETE FROM registeredperson12 WHERE userId='$userId'";
$runDeleteQuery=mysqli_query($connection,$deleteQuery);
if($runDeleteQuery==true){
	header("location:manageUsers.php");
	setcookie("deleteUser","yhrt",time()+(30));
}

?>