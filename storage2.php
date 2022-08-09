<?php
session_start();
if(isset($_SESSION["userId"])){
	require_once("dbConnection.php");
	function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

if(!empty($_REQUEST["fname"]) && !empty($_REQUEST["lname"]) && !empty($_REQUEST["email"]) && 
	!empty($_REQUEST["pwd"]) && (strlen($_REQUEST["pwd"]) >= 8) && !empty($_REQUEST["gender"])&& !empty($_REQUEST["phone"]) && is_numeric($_REQUEST["phone"]) && !empty($_FILES["profilePic"]["tmp_name"]) && is_uploaded_file($_FILES["profilePic"]["tmp_name"])){
	
	$fname=clean($_REQUEST["fname"]);
$lname=clean($_REQUEST["lname"]);
$email=$_REQUEST["email"];
$pwd=$_REQUEST["pwd"];
$encryptedPwd=md5(sha1($pwd));
$gender=$_REQUEST["gender"];
$phone=$_REQUEST["phone"];
$profilePic=$_FILES["profilePic"]["tmp_name"];
$location="profilePictures/";
$nameForDb=uniqid();
$userId=md5(sha1($email.$pwd));
$currentUser=$_SESSION["userId"];
move_uploaded_file($profilePic, $location."$nameForDb.jpg");
$selectCurrentUser = "SELECT * FROM registeredperson12 WHERE userId='$currentUser'";
$runSelectCurrentUser = mysqli_query($connection,$selectCurrentUser);
$currentUserDetails= mysqli_fetch_array($runSelectCurrentUser);
if($currentUserDetails["userId"] == $userId){
	echo "userIdNotUpdated";
}
$updateQuery="UPDATE registeredperson12 SET firstName='$fname',lastName='$lname',email='$email',password='$encryptedPwd',gender='$gender',contactNumber='$phone',profilePic='$nameForDb.jpg',userId='$userId' WHERE userId='$currentUser'";
$runUpdateQuery=mysqli_query($connection,$updateQuery);
if($runUpdateQuery==true){
	$selectQuerya="SELECT messId,messName from messinfo12 where userId='$userId'";
	$runSelectQuerya = mysqli_query($connection,$selectQuerya);
	$numOfRows=mysqli_num_rows($runSelectQuerya);
	if($runSelectQuerya==true && $numOfRows>0){
		while($messName=mysqli_fetch_array($runSelectQuerya)){
			$oldMessId=$messName["messId"];
			$newMessId= $email.$messName["messName"];
			$updsteQuerya1="UPDATE messinfo12 SET messId='$newMessId' where messId='$oldMessId'";
			$runUpdsteQuerya1=mysqli_query($connection,$updsteQuerya1);
			if($runUpdsteQuerya1 ==true){
				$selectRoomId="SELECT roomId,roomNo from roomdetails12 WHERE messId='$newMessId'";
				$runSelectRoomId=mysqli_query($connection,$selectRoomId);
				$numOfRoom=mysqli_num_rows($runSelectRoomId);
				if($runSelectRoomId==true && $numOfRoom>0){
					while($roomNo=mysqli_fetch_array($runSelectRoomId)){
						$oldRoomId=$roomNo["roomId"];
						$newRoomId=$newMessId.$roomNo["roomNo"];
						$updateRoomId="UPDATE roomdetails12 SET roomId='$newRoomId' WHERE roomId='$oldRoomId'";
						$runUpdateRoomId=mysqli_query($connection,$updateRoomId);
						if($runUpdateRoomId==true){
							$selectSeat="SELECT seatId,seatNo FROM seatdetails12 WHERE roomId='$newRoomId'";
							$runSelectSeat=mysqli_query($connection,$selectSeat);
							$numOfSeat=mysqli_num_rows($runSelectSeat);
							if($runSelectSeat==true && $numOfSeat > 0){
								while($seat=mysqli_fetch_array($runSelectSeat)){
									$oldSeatId=$seat["seatId"];
									$newSeatId=$newRoomId.$seat["seatNo"];
									$updateSeatId="UPDATE seatdetails12 SET seatId='$newSeatId' WHERE seatId='$oldSeatId'";
									$runUpdateSeatId=mysqli_query($connection,$updateSeatId);
								}
							}
						}
						else{
							echo "roomdetailas12 update query is wrong!";
						}
					}
				}
			}
			else{
				echo "updating mess quiery is wrong!";
			}

		}
	}
}
else{
	echo "updating registered person query is wrong!";
}
setcookie("upProfile","asdfg",time()+(60));
echo "successful";
}


else if(!empty($_REQUEST["fname"]) && !empty($_REQUEST["lname"]) && !empty($_REQUEST["email"]) && 
	!empty($_REQUEST["pwd"]) && (strlen($_REQUEST["pwd"]) >= 8) && !empty($_REQUEST["gender"])
	&& !empty($_REQUEST["phone"]) && is_numeric($_REQUEST["phone"])){
	
	$fname=clean($_REQUEST["fname"]);
$lname=clean($_REQUEST["lname"]);
$email=$_REQUEST["email"];
$pwd=$_REQUEST["pwd"];
$encryptedPwd=md5(sha1($pwd));
$gender=$_REQUEST["gender"];
$phone=$_REQUEST["phone"];
$userId=md5(sha1($email.$pwd));
$currentUser=$_SESSION["userId"];
$selectCurrentUser = "SELECT * FROM registeredperson12 WHERE userId='$currentUser'";
$runSelectCurrentUser = mysqli_query($connection,$selectCurrentUser);
$currentUserDetails= mysqli_fetch_array($runSelectCurrentUser);
if($currentUserDetails["userId"] == $userId){
	echo "userIdNotUpdated";
}
$updateQuery="UPDATE registeredperson12 SET firstName='$fname',lastName='$lname',email='$email',password='$encryptedPwd',gender='$gender',contactNumber='$phone',userId='$userId' WHERE userId='$currentUser'";
$runUpdateQuery=mysqli_query($connection,$updateQuery);
if($runUpdateQuery==true){
	$selectQuerya="SELECT messId,messName from messinfo12 where userId='$userId'";
	$runSelectQuerya = mysqli_query($connection,$selectQuerya);
	$numOfRows=mysqli_num_rows($runSelectQuerya);
	if($runSelectQuerya==true && $numOfRows>0){
		while($messName=mysqli_fetch_array($runSelectQuerya)){
			$oldMessId=$messName["messId"];
			$newMessId= $email.$messName["messName"];
			$updsteQuerya1="UPDATE messinfo12 SET messId='$newMessId' where messId='$oldMessId'";
			$runUpdsteQuerya1=mysqli_query($connection,$updsteQuerya1);
			if($runUpdsteQuerya1 ==true){
				$selectRoomId="SELECT roomId,roomNo from roomdetails12 WHERE messId='$newMessId'";
				$runSelectRoomId=mysqli_query($connection,$selectRoomId);
				$numOfRoom=mysqli_num_rows($runSelectRoomId);
				if($runSelectRoomId==true && $numOfRoom>0){
					while($roomNo=mysqli_fetch_array($runSelectRoomId)){
						$oldRoomId=$roomNo["roomId"];
						$newRoomId=$newMessId.$roomNo["roomNo"];
						$updateRoomId="UPDATE roomdetails12 SET roomId='$newRoomId' WHERE roomId='$oldRoomId'";
						$runUpdateRoomId=mysqli_query($connection,$updateRoomId);
						if($runUpdateRoomId==true){
							$selectSeat="SELECT seatId,seatNo FROM seatdetails12 WHERE roomId='$newRoomId'";
							$runSelectSeat=mysqli_query($connection,$selectSeat);
							$numOfSeat=mysqli_num_rows($runSelectSeat);
							if($runSelectSeat==true && $numOfSeat > 0){
								while($seat=mysqli_fetch_array($runSelectSeat)){
									$oldSeatId=$seat["seatId"];
									$newSeatId=$newRoomId.$seat["seatNo"];
									$updateSeatId="UPDATE seatdetails12 SET seatId='$newSeatId' WHERE seatId='$oldSeatId'";
									$runUpdateSeatId=mysqli_query($connection,$updateSeatId);
								}
							}
						}
						else{
							echo "roomdetailas12 update query is wrong!";
						}
					}
				}
			}
			else{
				echo "updating mess quiery is wrong!";
			}

		}
	}
}
else{
	echo "updating registered person query is wrong!";
}
setcookie("upProfile","asdfg",time()+(60));
echo "successful";
}

else{
	echo "please update your information according to the constraints.password will be at least 8 characters long and contact will be numeric!";
}
}
else{
	header("location:homepage.php?pleaseLogIn");
}
?>