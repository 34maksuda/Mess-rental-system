<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
require_once("dbConnection.php");
function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
if(!empty($_REQUEST["roomNo"]) && !empty($_REQUEST["roomLength"]) && !empty($_REQUEST["roomWidth"]) && !empty($_REQUEST["numOfSeat"]) && !empty($_REQUEST["numOfWindow"]) && !empty($_REQUEST["roomLocation"]) && !empty($_REQUEST["numOfSeatInFloor"]) && !empty($_REQUEST["SF"]) && !empty($_REQUEST["numOfCommonBath"]) && !empty($_REQUEST["besin"])){

	$oldRoomId = $_REQUEST["roomId"];
	$roomNo=clean($_REQUEST["roomNo"]);
	$roomLength=$_REQUEST["roomLength"];
	$roomWidth=$_REQUEST["roomWidth"];
	$numOfSeat=$_REQUEST["numOfSeat"];
	$numOfWindow=$_REQUEST["numOfWindow"];
	$roomLocation=$_REQUEST["roomLocation"];
	$numberOfSeatInFloor=$_REQUEST["numOfSeatInFloor"];
	$specialFeature=$_REQUEST["SF"];
	$commonBath=$_REQUEST["numOfCommonBath"];
	$besin=$_REQUEST["besin"];
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
		$searchMess="SELECT messId FROM roomdetails12 WHERE roomId='$oldRoomId'";
		$runSearchMess=mysqli_query($connection,$searchMess);
		if($runSearchMess==true){
			$messRow=mysqli_fetch_array($runSearchMess);
			$messId=$messRow["messId"];
			$searchMessName="SELECT messName from messinfo12 WHERE messId='$messId'";
			$runSearchMessName=mysqli_query($connection,$searchMessName);
			if($runSearchMessName==true){
				$messNameArray=mysqli_fetch_array($runSearchMessName);
				$messName=$messNameArray["messName"];
				$newRoomId=$userEmail.$messName.$roomNo;
				$updateRoom="UPDATE roomdetails12 SET roomId='$newRoomId',roomNo='$roomNo',roomLength='$roomLength',roomWidth ='$roomWidth',numOfSeat='$numOfSeat',numOfWindow='$numOfWindow',roomLocation='$roomLocation',numOfSeatInFloor='$numberOfSeatInFloor',specialFeatures='$sf',numOfCommonBath='$commonBath',numOfBesin='$besin' WHERE roomId='$oldRoomId'";

				$runUpdateRoom=mysqli_query($connection,$updateRoom);
				if($runUpdateRoom==true){ 
					if(!empty($_FILES["besinPic"]["name"])){
						$besinPic=$_FILES["besinPic"]["tmp_name"];	
						$location="roomPictures/";
						$nameForDb=uniqid();
						move_uploaded_file($besinPic,$location."$nameForDb.jpg");
						$updateBesinPic="UPDATE roomdetails12 SET besinPic='$nameForDb.jpg' WHERE roomId='$newRoomId'";
						$runUpdateBesinPic=mysqli_query($connection,$updateBesinPic);
					}
					if(!empty($_FILES["roomPic"]["name"])){
						for($i=0;$i<3;$i++){
							$roomPic=$_FILES["roomPic"]["tmp_name"][$i];
							$nameForDb1=uniqid();
							$roomPicLocation="roomPictures/"."$nameForDb1.jpg";
							if(move_uploaded_file($roomPic,$roomPicLocation)){
								if($i>0){
									$checkRoomPic = "SELECT roomPic from roomdetails12 WHERE roomId = '$newRoomId' ";
									$runCheckRoomPic = mysqli_query($connection,$checkRoomPic);
									$roomPicSeaechResult=mysqli_fetch_array($runCheckRoomPic);
									$insertingRoomPic = $roomPicSeaechResult["roomPic"].','.
									$nameForDb1.'.jpg' ;
									$updateRoomPic1 = "UPDATE roomdetails12 SET roomPic = '$insertingRoomPic' WHERE roomId='$newRoomId' ";
									$runUpdateRoomPic1 = mysqli_query($connection,$updateRoomPic1);
								}
								else{
									$CroomPic=",".$nameForDb1.".jpg";
									$updateRoomPic2 = "UPDATE roomdetails12 SET roomPic = '$CroomPic' WHERE roomId='$newRoomId' ";
									$runUpdateRoomPic2 = mysqli_query($connection,$updateRoomPic2);

								}
							}
						}
					}
					if(!empty($_FILES["commonBathPic"]["name"])){
						for($i=0;$i<2;$i++){
							$bathPic=$_FILES["commonBathPic"]["tmp_name"][$i];
							$nameForDb2=uniqid();
							$bathPicLocation="roomPictures/"."$nameForDb2.jpg";
							if(move_uploaded_file($bathPic,$bathPicLocation)){
								if($i>0){
									$checkBathPic = "SELECT commonBathPic from roomdetails12 WHERE roomId = '$newRoomId' ";
									$runCheckBathPic = mysqli_query($connection,$checkBathPic);
									$bathPicSearchResult=mysqli_fetch_array($runCheckBathPic);
									$insertingBathPic = $bathPicSearchResult["commonBathPic"].','.
									$nameForDb2.'.jpg' ;
									$updatebathPic1 = "UPDATE roomdetails12 SET commonBathPic = '$insertingBathPic' WHERE roomId='$newRoomId' ";
									$runUpdatebathPic1 = mysqli_query($connection,$updatebathPic1);
								}
								else{
									$CbathPic=",".$nameForDb2.".jpg";
									$updatebathPic2 = "UPDATE roomdetails12 SET commonBathPic = '$CbathPic' WHERE roomId='$newRoomId' ";
									$runUpdatebathPic2 = mysqli_query($connection,$updatebathPic2);

								}
							}
						}
					}
					$selectSeat="SELECT seatId,seatNo FROM seatdetails12 WHERE roomId='$newRoomId'";
					$runSelectSeat=mysqli_query($connection,$selectSeat);
					$numOfSeat=mysqli_num_rows($runSelectSeat);
					if($runSelectSeat==true && $numOfSeat > 0){
						$x=1;
						while($seat=mysqli_fetch_array($runSelectSeat)){
							$oldSeatId=$seat["seatId"];
							$newSeatId=$newRoomId.$seat["seatNo"];
							$updateSeatId="UPDATE seatdetails12 SET seatId='$newSeatId' WHERE seatId='$oldSeatId'";
							$runUpdateSeatId=mysqli_query($connection,$updateSeatId);
							if($runUpdateSeatId==true && $x==1 ){
								echo "success";
							}
							$x++;
						}
					}
					else{
						echo "success";
					}

				}
				else{
					echo "you have already registered a room"."<br>"."using this room number.please give"."<br>"." a unique room number for each room "."<br>"."of your mess!";
				}
				
			}
			else{
				echo "mess name khoja te problem.";
			}
		}
		else{
			echo "room table a mess id khuja te problem";
		}
	}
	else{
		echo "user email khuja te problem.";
	}
	setcookie("roomUp","kkk",time()+(30));

}

else{
	echo "Please fill out all fields.";
}
?>