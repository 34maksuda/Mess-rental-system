<?php 
session_start();
if(isset($_SESSION["userId"])){
	require_once("header.php");
	require_once("dbConnection.php");
	require_once("navbar.php"); ?>
	<span id="seatInfoEditError"></span>
	<?php
	$seatId=$_REQUEST["seatId"];
	$selectQuery="SELECT * FROM seatdetails12 WHERE seatId='$seatId'";
	$runSelectQuery=mysqli_query($connection,$selectQuery);
	if($runSelectQuery==true){
		$row=mysqli_fetch_array($runSelectQuery); 
		$seatPic = $row["seatPic"];
		$seatIndvPic = explode(',',$seatPic);
		$arraySize = sizeof($seatIndvPic);
		?>
		<div class="row roomPicWrapper523">
			<div class="col-md-5"></div>
			<div class="col-md-3"><?php require_once("imageSlider.php"); ?></div>
			<div class="col-md-4"></div>
		</div>
		<div class="col-md-1"></div>
	</div>
	<div id="pWrapper">
		<form id="seatProfileForm">
			<input type="text" name="seatId" value="<?php echo $seatId; ?>" hidden>
			<div id="seatProfileBody">
				<div id="roomNo"><h3><?php echo "seat No. ".$row["seatNo"]; ?></h3></div>
				<table id="profile_table">
					<tr>
						<th>seat No.</th>
						<td>
							<input class="form-text-input" type="text" name="seatNo" value="<?php echo $row['seatNo'] ?>">
						</td>
					</tr>
					<tr>
						<th>seat rent(per month)</th>
						<td>
							<input class="form-text-input" type="number" placeholder="seat rent in tk" name="seatRent" value="<?php echo $row['seatRent'] ?>">
						</td>
					</tr>
					<tr>
						<th>Service charge</th>
						<td>
							<input class="form-text-input" type="number" placeholder="service charge in tk" name="serviceCharge" value="<?php echo $row['serviceCharge'] ?>">
						</td>
					</tr>
					<tr>
						<th>Security deposit</th>
						<td>
							<input class="form-text-input" type="number" placeholder="security deposit in tk" name="securityDeposit" value="<?php echo $row['securityDeposit'] ?>">
						</td>
					</tr>
					<tr>
						<th>Seat Status</th>
						<td>
							<?php
								if($row["seatStatus"]== "occupied"){?>
									<input type="radio" name="seatStatus" value="occupied" checked><?php echo $row["seatStatus"];?>
									<input type="radio" name="seatStatus" value="vacant">vacant
								<?php }
								else{ ?>
									<input type="radio" name="seatStatus" value="occupied">occupied
									<input type="radio" name="seatStatus" value="vacant" checked><?php echo $row["seatStatus"];?>
									<?php
								}
								?>
						</td>
					</tr>
					<tr>
						<th>upload 2 pictures of the seat</th>
						<td><input class="form-text-input" type="file" name="seatPic[]" multiple accept="image/*"></td>
					</tr>

				</table>
				<input  id="saveUpdateData" type="submit" name="submitBtn" value="save this seat info">
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

