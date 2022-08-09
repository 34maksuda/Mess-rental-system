<?php 
session_start();
if(isset($_SESSION["userId"])){
	require_once("header.php");
	require_once("dbConnection.php");
	require_once("navbar.php"); 
	$roomId=$_REQUEST["roomId"];
	$selectQuery="SELECT * FROM roomdetails12 WHERE roomId='$roomId'";
	$runSelectQuery=mysqli_query($connection,$selectQuery);
	if($runSelectQuery==true){
	  $row=mysqli_fetch_array($runSelectQuery); 
	  $roomPic = $row["roomPic"];
      $roomIndvPic = explode(',',$roomPic );
      $arraySize1 = sizeof($roomIndvPic);
      $bathPic=$row["commonBathPic"];
      $indvBath=explode(',',$bathPic);
      $arraySize2 = sizeof($indvBath); 
      $besinPic=$row["besinPic"]?>
      <div class="row roomPicWrapper523">
      	<div class="col-md-2"></div>
      	<div class="col-md-3"><?php require_once("imageSlider2.php"); ?></div>
      	<div class="col-md-3"><?php require_once("imageSlider3.php"); ?></div>
      	<div class="col-md-3 besinPic23"><img src="roomPictures/<?php echo $besinPic ; ?>">besin image
      </div>
      <div class="col-md-1"></div>
      </div>
		<div id="pWrapper">
			<form id="messProfileForm">
				<div id="messProfileBody">
					<div id="roomNo"><h3><?php echo "Room No. ".$row["roomNo"]; ?></h3></div>
					<table id="profile_table">
						<tr>
							<th>Room No.</th>
							<td>
								<?php echo $row["roomNo"] ;?>
							</td>
						</tr>
						<tr>
							<th>Room length</th>
							<td><?php echo $row["roomLength"]." foot";?></td>
						</tr>
						<tr>
							<th>Room Width</th>
							<td><?php echo $row["roomWidth"]." foot" ;?></td>
						</tr>
						<tr>
							<th><?php echo "How many seats in this room";?></th>
							<td><?php echo $row["numOfSeat"];?></td>
						</tr>
						<tr>
							<th>How many windows in this room</th>
							<td>
								<?php echo $row["numOfWindow"];?>
							</td>
						</tr>
						<tr>
							<th>In which floor this room is located?</th>
							<td>
								<?php echo $row["roomLocation"];?>
							</td>
						</tr>
						<tr>
							<th>Total number of room in this floor ?</th>
							<td>
								<?php echo $row["numOfSeatInFloor"];?>
							</td>
						</tr>
					</tr>
					<tr>
						<th>special features of this room</th>
						<td>
							<?php echo $row["specialFeatures"];?>
						</td>
					</tr>
					<tr>
						<th>Number of common bath in this floor</th>
						<td>
							<?php echo $row["numOfCommonBath"];?>
						</td>
					</tr>
					<tr>
						<th>Number of besin in this floor</th>
						<td><?php echo $row["numOfBesin"] ?></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
<?php //}
} 
else{
	header("location:homepage.php?pleaseLogIn");
}

}

else{
	header("location:homepage.php?pleaseLogIn");
} 
?>

