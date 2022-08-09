<?php 
session_start();
if(isset($_SESSION["userId"])){
	require_once("header.php");
	require_once("dbConnection.php");
	require_once("navbar.php"); ?>
	<span id="messInfoEditError"></span>
	<?php
	$messId=$_REQUEST["messId"];
	$selectQuery="SELECT * FROM messinfo12 WHERE messId='$messId'";
	$runSelectQuery=mysqli_query($connection,$selectQuery);
	if($runSelectQuery==true){
		$row=mysqli_fetch_array($runSelectQuery); 
		$messPic=$row["messPic"];?>
		<div id="pWrapper">
			<form id="messProfileForm">
				<input type="text" name="messId" value="<?php echo $messId; ?>" hidden>
				<div id="messProfileBody">
					<img src="messPictures/<?php echo $messPic;?>">
					<input id="messProfilePic" type="file" name="messprofilePic" accept="image/*">
					<div id="messProfileName"><h3><?php echo $row["messName"]." Mess"?></h3></div>
					<table id="profile_table">
						<tr>
							<th><?php echo "Mess Name";?></th>
							<td>
								<?php $messName=$row["messName"]; ?>
								<input type="text" class="form-text-input" name="messName" value="<?php echo $messName;?>">
							</td>
						</tr>
						<tr>
							<th><?php echo "messType";?></th>
							<td>
								<?php
								if($row["messType"]== "Male"){?>
									<input type="radio" name="messType" value="Male" checked><?php echo $row["messType"];?>
									<input type="radio" name="messType" value="Female">Female
								<?php }
								else{ ?>
									<input type="radio" name="messType" value="Male">Male
									<input type="radio" name="messType" value="Female" checked><?php echo $row["messType"];?>
									<?php
								}
								?>
							</td>
						</tr>
						<tr>
							<th><?php echo "messLoctaion";?></th>
							<td><input type="text" class="form-text-input" name="messLocation" class="editEmail" value="<?php echo $row["messLocation"] ;?>"></td>
						</tr>
						<tr>
							<th><?php echo "How many floors in this mess";?></th>
							<td><input type="number" class="form-text-input" name="numOfFloor" value="<?php echo $row["numOfFloor"];?>"></td>
						</tr>
						<tr>
							<th><?php echo "Is the mess owner live in mess?";?></th>
							<td>
								<?php
								if($row["messOwnerStatus"]== "Yes"){?>
									<input type="radio" name="messOwnerStatus" value="Yes" checked><?php echo $row["messOwnerStatus"];?>
									<input type="radio" name="messOwnerStatus" value="No">No
								<?php }
								else{ ?>
									<input type="radio" name="messOwnerStatus" value="Yes">Yes
									<input type="radio" name="messOwnerStatus" value="No" checked><?php echo $row["messOwnerStatus"];?>
									<?php
								}
								?>
							</td>
						</tr>
						<tr>
							<th><?php echo "Is this mess have any security gurd?";?></th>
							<td>
								<?php
								if($row["securityGurdStatus"]== "Yes"){?>
									<input type="radio" name="securityGurdStatus" value="Yes" checked><?php echo $row["securityGurdStatus"];?>
									<input type="radio" name="securityGurdStatus" value="No">No
								<?php }
								else{ ?>
									<input type="radio" name="securityGurdStatus" value="Yes">Yes
									<input type="radio" name="securityGurdStatus" value="No" checked><?php echo $row["securityGurdStatus"];?>
									<?php
								}
								?>
							</td>
						</tr>
						<tr>
							<th><?php echo "Is this mess have any maid-servant?";?></th>
							<td>
								<?php
								if($row["maidStatus"]== "Yes"){?>
									<input type="radio" name="maidStatus" value="Yes" checked><?php echo $row["maidStatus"];?>
									<input type="radio" name="maidStatus" value="No">No
								<?php }
								else{ ?>
									<input type="radio" name="maidStatus" value="Yes">Yes
									<input type="radio" name="maidStatus" value="No" checked><?php echo $row["maidStatus"];?>
									<?php
								}
								?>
							</td>
						</tr>
					</tr>
					<tr>
						<th><?php echo "Is the rooms of the mess is furnished(ready-room)?";?></th>
						<td>
							<?php
							if($row["roomStatus"]== "Yes"){?>
								<input type="radio" name="roomStatus" value="Yes" checked><?php echo $row["roomStatus"];?>
								<input type="radio" name="roomStatus" value="No">No
							<?php }
							else{ ?>
								<input type="radio" name="roomStatus" value="Yes">Yes
								<input type="radio" name="roomStatus" value="No" checked><?php echo $row["roomStatus"];?>
								<?php
							}
							?>
						</td>
					</tr>
					<tr>
						<th><?php echo "special features of the mess";?></th>
						<td>
							<?php
							$spFeatures=$row["specialFeatures"];
							$indFeatures=explode(',',$spFeatures );	
							?>
							<input type="checkbox" name="SF[]" value="Wifi"<?php 
							if(in_array("Wifi", $indFeatures)){ echo "checked"; }
							?>>Wifi
							<input type="checkbox" name="SF[]" value="TV"<?php 
							if(in_array("TV", $indFeatures)){ echo "checked"; }
							?>>TV
							<input type="checkbox" name="SF[]" value="Fridge"<?php 
							if(in_array("Fridge", $indFeatures)){ echo "checked"; }
							?>>Fridge
							<input type="checkbox" name="SF[]" value="IPS"<?php 
							if(in_array("IPS", $indFeatures)){ echo "checked"; }
							?>>IPS
							<input type="checkbox"  name="SF[]" value="Dining space"<?php 
							if(in_array("Dining space", $indFeatures)){ echo "checked"; }
							?>>Dining space
						</td>
					</tr>
					<tr>
						<th><?php echo "lease Term for your mess";?></th>
						<td> <?php
							if($row["leaseTerm"] =="N/A"){ ?>
							<select class="form-text-input" name= "leaseTerm">
								<option value="N/A" selected>N/A</option>
								<option value="6 month">6 month</option>
								<option value="1 year">1 year</option>
								<option value="2 year">2 year</option>
							</select>
						<?php } 
						else if($row["leaseTerm"] =="6 month"){ ?>
							<select class="form-text-input" name= "leaseTerm">
								<option value="N/A">N/A</option>
								<option value="6 month" selected>6 month</option>
								<option value="1 year">1 year</option>
								<option value="2 year">2 year</option>
							</select>
						<?php }
						else if($row["leaseTerm"] =="1 year"){ ?>
							<select class="form-text-input" name= "leaseTerm">
								<option value="N/A">N/A</option>
								<option value="6 month">6 month</option>
								<option value="1 year" selected>1 year</option>
								<option value="2 year">2 year</option>
							</select>
						<?php }
						else{ ?>
							<select class="form-text-input" name= "leaseTerm">
								<option value="N/A">N/A</option>
								<option value="6 month">6 month</option>
								<option value="1 year">1 year</option>
								<option value="2 year" selected=>2 year</option>
							</select>
						<?php } ?>
						</td>
					</tr>
					<tr>
						<th><?php echo "preffered tenant for your mess";?></th>
						<td> <?php
							if($row["tenantType"] =="anyone"){ ?>
							<select class="form-text-input" name= "tenantType">
								<option value="anyone" selected>anyone</option>
								<option value="student">student</option>
								<option value="professional">professional</option>
							</select>
						<?php } 
						else if($row["tenantType"] =="student"){ ?>
							<select class="form-text-input" name= "tenantType">
								<option value="anyone">anyone</option>
								<option value="student" selected>student</option>
								<option value="professional">professional</option>
							</select>
						<?php }
						else{ ?>
							<select class="form-text-input" name= "tenantType">
								<option value="anyone">anyone</option>
								<option value="student">student</option>
								<option value="professional" selected>professional</option>
							</select>
						<?php } ?>
						</td>
					</tr>
				</table>
				<input  id="saveUpdateData" type="submit" name="submitBtn" value="save this mess info">
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

