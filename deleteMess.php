<?php 
require_once("dbConnection.php");
$messId=$_REQUEST["messId"];
$deleteQuery="DELETE FROM messinfo12 WHERE messId='$messId'";
$runDeleteQuery=mysqli_query($connection,$deleteQuery);
if($runDeleteQuery==true){
	header("location:messProfile.php");
	setcookie("deleteMess","hjkl",time()+(30));
}
?>