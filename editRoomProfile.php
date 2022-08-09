<?php 
session_start();
if(isset($_SESSION["userId"])){
	require_once("header.php");
	require_once("dbConnection.php");
	require_once("navbar.php"); ?>
	<span id="roomInfoEditError"></span>
	<?php
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
			<form id="roomProfileForm">
				<input type="text" name="roomId" value="<?php echo $roomId; ?>" hidden>
				<div id="messProfileBody">
					<div id="roomNo"><h3><?php echo "Room No. ".$row["roomNo"]; ?></h3></div>
					<table id="profile_table">
						<tr>
							<th>Room No.</th>
							<td>
								<input class="form-text-input" type="text" name="roomNo" value="<?php echo $row['roomNo'] ?>">
							</td>
						</tr>
						<tr>
							<th>Room length</th>
							<td>
							<input class="form-text-input" type="number" name="roomLength" value="<?php echo $row['roomLength'] ?>">
						    </td>
						</tr>
						<tr>
							<th>Room Width</th>
							<td><input class="form-text-input" type="number" name="roomWidth" value="<?php echo $row['roomWidth'] ?>"></td>
						</tr>
						<tr>
							<th><?php echo "Number of seat in this room";?></th>
							<td><input class="form-text-input" type="number" name="numOfSeat" value="<?php echo $row['numOfSeat'] ?>"></td>
						</tr>
						<tr>
							<th>number of window in this room</th>
							<td>
								<input class="form-text-input" type="number" name="numOfWindow" value="<?php echo $row['numOfWindow'] ?>">
							</td>
						</tr>
						<tr>
							<th>In which floor this room is located?</th>
							<td>
								<input class="form-text-input" type="text" name="roomLocation" value="<?php echo $row['roomLocation'] ?>">
							</td>
						</tr>
						<tr>
							<th>Total number of seat in this floor ?</th>
							<td>
								<input class="form-text-input" type="number" name="numOfSeatInFloor" value="<?php echo $row['numOfSeatInFloor'] ?>">
							</td>
						</tr>
					</tr>
					<tr>
						<th>special features of this room</th>
						<td>
							<?php
							$spFeatures=$row["specialFeatures"];
							$indFeatures=explode(',',$spFeatures );	
							?>
							<input type="checkbox" name="SF[]" value="Bed"<?php 
							if(in_array("Bed", $indFeatures)){ echo "checked"; }
							?>>Bed
							<input type="checkbox" name="SF[]" value="chair-table."<?php 
							if(in_array("chair-table.", $indFeatures)){ echo "checked"; }
							?>>chair-table.
							<input type="checkbox" name="SF[]" value="mattress."<?php 
							if(in_array("mattress.", $indFeatures)){ echo "checked"; }
							?>>mattress.
							<input type="checkbox" name="SF[]" value="Light"<?php 
							if(in_array("Light", $indFeatures)){ echo "checked"; }
							?>>Light
							<input type="checkbox"  name="SF[]" value="Fan"<?php 
							if(in_array("Fan", $indFeatures)){ echo "checked"; }
							?>>Fan
							<input type="checkbox"  name="SF[]" value="AC"<?php 
							if(in_array("AC", $indFeatures)){ echo "checked"; }
							?>>AC
							<input type="checkbox"  name="SF[]" value="Tiles"<?php 
							if(in_array("Tiles", $indFeatures)){ echo "checked"; }
							?>>Tiles
							<input type="checkbox"  name="SF[]" value="Balcony"<?php 
							if(in_array("Balcony", $indFeatures)){ echo "checked"; }
							?>>Balcony
							<input type="checkbox"  name="SF[]" value="attached bath"<?php 
							if(in_array("attached bath", $indFeatures)){ echo "checked"; }
							?>>attached bath
						</td>
					</tr>
					<tr>
						<th>Number of common bath in this floor</th>
						<td>
							<input class="form-text-input" type="number" name="numOfCommonBath" value="<?php echo $row['numOfCommonBath'] ?>">
						</td>
					</tr>
					<tr>
						<th>Number of besin in this floor</th>
						<td><input class="form-text-input" type="number" name="besin" value="<?php echo $row['numOfBesin'] ?>"></td>
					</tr>
					<tr>
						<th>upload 3 pictures of this room</th>
						<td><input class="form-text-input" type="file" name="roomPic[]" multiple accept="image/*"></td>
					</tr>
					<tr>
						<th>upload 2 pictures of common bath of this floor</th>
						<td><input class="form-text-input" type="file" name="commonBathPic[]" multiple accept="image/*"></td>
					</tr>
					<tr>
						<th>upload a picture of  besin of this floor</th>
						<td><input class="form-text-input" type="file" name="besinPic" accept="image/*"></td>
					</tr>

				</table>
				<input  id="saveUpdateData" type="submit" name="submitBtn" value="save this room info">
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

