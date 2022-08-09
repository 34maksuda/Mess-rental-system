<?php
require_once("dbConnection.php");
if(($_REQUEST["userTID"] == $_REQUEST["cnfrmUserTID"]) && ($_REQUEST["Pstatus"] == "uncheck")){
	if(!empty($_REQUEST["meFromMessOwnerTID"])){
		if($_REQUEST["seatStatus"] == "occupied"){
			$seatId=$_REQUEST["seatId"];
			$seatStatus=$_REQUEST["seatStatus"];
			$Pstatus=$_REQUEST["Pstatus"];
			$meFromMessOwnerTID=$_REQUEST["meFromMessOwnerTID"];
			$PID=$_REQUEST["PID"];
			$updateQuery="UPDATE seatdetails12 set seatStatus='$seatStatus' WHERE seatId='$seatId'";
			$runUpdateQuery=mysqli_query($connection,$updateQuery);
			if($runUpdateQuery==true){
				$updateQuery1="UPDATE payment12 set paymentStatus='checked',meFromMessOwnerTID='$meFromMessOwnerTID' WHERE paymentId='$PID'";
				$runUpdateQuery1=mysqli_query($connection,$updateQuery1);
				if($runUpdateQuery1){
					echo "success";
					setcookie("sucPayment","ahgkyl",time()+(30));
				}
			}
		}
		else{
			echo "please checked the seatStatus as occupied!";
		}
	}
	else{
		echo "please give the trasaction id used for <br>sending seatRent to the mess Owner!" ;
	}

}
else{
	echo "user transaction Id and confirm User Transaction Id is not same!";
}
