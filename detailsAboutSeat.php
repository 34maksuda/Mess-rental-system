<?php 
session_start();
if(isset($_SESSION["userId"])){
	require_once("header.php");
	require_once("dbConnection.php");
	require_once("navbar.php"); 
	$seatId=$_REQUEST["seatId"];
	$selectQuery="SELECT * FROM seatdetails12 WHERE seatId='$seatId'";
	$runSelectQuery=mysqli_query($connection,$selectQuery);
	if($runSelectQuery==true){
		$row=mysqli_fetch_array($runSelectQuery); 
		$seatPic = $row["seatPic"];
		$seatIndvPic = explode(',',$seatPic );
		$arraySize = sizeof($seatIndvPic); ?>
		<div class="row roomPicWrapper523">
			<div class="col-md-5"></div>
			<div class="col-md-3"><?php require_once("imageSlider.php"); ?></div>
			<div class="col-md-4"></div>
		</div>
		<div id="pWrapper">
			<form id="messProfileForm">
				<div id="seatProfileBody">
					<div id="roomNo"><h3><?php echo "Seat No. ".$row["seatNo"]; ?></h3></div>
					<table id="profile_table">
						<tr>
							<th>Seat No.</th>
							<td>
								<?php echo $row["seatNo"] ;?>
							</td>
						</tr>
						<tr>
							<th>Is the seat is occupied/vacant?</th>
							<td>
								<?php echo $row["seatStatus"] ;?>
							</td>
						</tr>
						<tr>
							<th>Seat Rent(per month)</th>
							<td><?php echo $row["seatRent"]." TK";?></td>
						</tr>
						<tr>
							<th>Service Charge</th>
							<td><?php echo $row["serviceCharge"]." TK" ;?></td>
						</tr>
						<tr>
							<th><?php echo "Security deposit";?></th>
							<td><?php echo $row["securityDeposit"];?></td>
						</tr>
						<tr>
							<th><?php echo "Seat status";?></th>
							<td><?php echo $row["seatStatus"];?></td>
						</tr>
					</div>
				</form>
			</div>
			<?php 
		} 
		else{
			header("location:homepage.php?pleaseLogIn");
		}

	}

	else{
		header("location:homepage.php?pleaseLogIn");
	} 
	?>

