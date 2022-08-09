<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
require_once("dbConnection.php");
function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
if(!empty($_REQUEST["roomNo"]) && !empty($_REQUEST["roomLength"]) && !empty($_REQUEST["roomWidth"]) && !empty($_REQUEST["numOfSeat"]) && !empty($_REQUEST["numOfWindow"]) && !empty($_REQUEST["roomLocation"]) && !empty($_REQUEST["numberOfSeatInFloor"]) && !empty($_REQUEST["specialFeature"]) && !empty($_REQUEST["commonBath"]) && !empty($_REQUEST["besin"]) && !empty($_FILES["roomPic"]["name"]) && !empty($_FILES["commonBathPic"]["name"]) && !empty($_FILES["besinPic"]["name"])){

	$messId = $_REQUEST["messId"];
	$roomNo=clean($_REQUEST["roomNo"]);
	$roomLength=$_REQUEST["roomLength"];
	$roomWidth=$_REQUEST["roomWidth"];
	$numOfSeat=$_REQUEST["numOfSeat"];
	$numOfWindow=$_REQUEST["numOfWindow"];
	$roomLocation=$_REQUEST["roomLocation"];
	$numberOfSeatInFloor=$_REQUEST["numberOfSeatInFloor"];
	$specialFeature=$_REQUEST["specialFeature"];
	$commonBath=$_REQUEST["commonBath"];
	$besin=$_REQUEST["besin"];
	$besinPic=$_FILES["besinPic"]["tmp_name"];	
	$location="roomPictures/";
	$nameForDb=uniqid();
	move_uploaded_file($besinPic,$location."$nameForDb.jpg");
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
		$roomId=$messId.$roomNo;
		$selectQuery="SELECT * FROM roomdetails12 WHERE roomId='$roomId'";
		$runSelectQuery=mysqli_query($connection,$selectQuery);
		if($runSelectQuery==true){
			$numOfRows=mysqli_num_rows($runSelectQuery);
			if($numOfRows==0){
				$insertQuery="INSERT INTO roomdetails12(roomId,messId,roomNo,roomLength,roomWidth,numOfSeat,numOfWindow,roomLocation,numOfSeatInFloor,specialFeatures,numOfCommonBath,numOfBesin,besinPic) VALUES('$roomId','$messId','$roomNo','$roomLength','$roomWidth','$numOfSeat','$numOfWindow','$roomLocation','$numberOfSeatInFloor','$sf','$commonBath','$besin','$nameForDb.jpg')";
				$runInsertQuery=mysqli_query($connection,$insertQuery);
				if($runInsertQuery==true){
					for($i=0;$i<3;$i++){
						$roomPic=$_FILES["roomPic"]["tmp_name"][$i];
						$nameForDb1=uniqid();
						$roomPicLocation="roomPictures/"."$nameForDb1.jpg";
						if(move_uploaded_file($roomPic,$roomPicLocation)){
							$checkRoomPic = "SELECT roomPic from roomdetails12 WHERE roomId = '$roomId' ";
							$runCheckRoomPic = mysqli_query($connection,$checkRoomPic);
							$roomPicSeaechResult=mysqli_fetch_array($runCheckRoomPic);
							$insertingRoomPic = $roomPicSeaechResult["roomPic"].','.
							$nameForDb1.'.jpg' ;
							$insertRoomImg = "UPDATE roomdetails12 SET roomPic = '$insertingRoomPic' WHERE roomId='$roomId' ";
							$runInsertRoomImg = mysqli_query($connection,$insertRoomImg);
						}
					}
					for($i=0;$i<2;$i++){
						$BathPic=$_FILES["commonBathPic"]["tmp_name"][$i];
						$nameForDb2=uniqid();
						$bathPicLocation="roomPictures/"."$nameForDb2.jpg";
						if(move_uploaded_file($BathPic,$bathPicLocation)){
							$checkBathPic = "SELECT commonBathPic from roomdetails12 WHERE roomId = '$roomId' ";
							$runCheckBathPic = mysqli_query($connection,$checkBathPic);
							$bathPicSeaechResult=mysqli_fetch_array($runCheckBathPic);
							$insertingBathPic = $bathPicSeaechResult["commonBathPic"].','.
							$nameForDb2.'.jpg' ;
							$insertBathImg = "UPDATE roomdetails12 SET commonBathPic = '$insertingBathPic' WHERE roomId='$roomId' ";
							$runInsertBathImg = mysqli_query($connection,$insertBathImg);
						}
					}
					echo "success";
				}
				else{

					echo "not success";
				}
			}
			else{
				echo "This room has already registered!";
			}
		}
		else{
			echo "roomId khuja te a problem";
		}

	}
	/*else{
		echo "person khuja r mess khuja query te problem";
	}*/
}

else{
	echo "Please fill out all fields.";
}
?>