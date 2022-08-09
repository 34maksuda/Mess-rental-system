<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
require_once("dbConnection.php");
function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
if(!empty($_REQUEST["seatNo"]) && !empty($_REQUEST["rentPerMonth"]) && !empty($_REQUEST["serviceCharge"]) && !empty($_REQUEST["securityDeposit"]) && !empty($_REQUEST["seatStatus"]) && !empty($_FILES["seatPic"]["name"])){

	$roomId = $_REQUEST["roomId"];
	$seatNo=clean($_REQUEST["seatNo"]);
	$rentPerMonth=$_REQUEST["rentPerMonth"];
	$serviceCharge=$_REQUEST["serviceCharge"];
	$securityDeposit=$_REQUEST["securityDeposit"];
	$seatStatus=$_REQUEST["seatStatus"];
	$currentUser=$_SESSION["userId"];
	$searchQuery="SELECT * FROM registeredperson12 WHERE userId='$currentUser'";
	$runSearchQuery=mysqli_query($connection,$searchQuery);
	if($runSearchQuery==true){
		$row=mysqli_fetch_array($runSearchQuery);
		$userEmail=$row["email"];
		$seatId=$roomId.$seatNo;
		$selectQuery="SELECT * FROM seatdetails12 WHERE seatId='$seatId'";
		$runSelectQuery=mysqli_query($connection,$selectQuery);
		if($runSelectQuery==true){
			$numOfRows=mysqli_num_rows($runSelectQuery);
			if($numOfRows==0){
				$insertQuery="INSERT INTO seatdetails12(seatId,roomId,seatNo,seatRent,serviceCharge,securityDeposit,seatStatus) VALUES('$seatId','$roomId','$seatNo','$rentPerMonth','$serviceCharge','$securityDeposit','$seatStatus')";
				$runInsertQuery=mysqli_query($connection,$insertQuery);
				if($runInsertQuery==true){

					for($i=0;$i<2;$i++){
						$seatPic=$_FILES["seatPic"]["tmp_name"][$i];
						$nameForDb1=uniqid();
						$seatPicLocation="roomPictures/"."$nameForDb1.jpg";
						if(move_uploaded_file($seatPic,$seatPicLocation)){
							$checkSeatPic = "SELECT seatPic from seatdetails12 WHERE seatId = '$seatId' ";
							$runCheckSeatPic = mysqli_query($connection,$checkSeatPic);
							$seatPicSearchResult=mysqli_fetch_array($runCheckSeatPic);
							$insertingSeatPic = $seatPicSearchResult["seatPic"].','.
							$nameForDb1.'.jpg' ;
							$insertSeatImg = "UPDATE seatdetails12 SET seatPic = '$insertingSeatPic' WHERE seatId='$seatId' ";
							$runInsertSeatImg = mysqli_query($connection,$insertSeatImg);
						}
					}
					echo "success";

				}
				else{

					echo "not success";
				}
			}

			else{
				echo "This seat has already registered!";
			}
		}

		else{
			echo "seatId khuja te problem";
		}
	}
	else{
		echo "person khuja query te problem";
	}
}
else{
	echo "Please fill out all fields.";
}
?>
