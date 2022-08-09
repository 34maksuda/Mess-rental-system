<?php 
session_start();
if(isset($_SESSION["userId"])){
	require_once("header.php");
	require_once("dbConnection.php");
	require_once("navbar.php");?>
	<span id="updateError"></span>
	<?php
	$user=$_SESSION["userId"];
	$selectQuery="SELECT * FROM registeredperson12 WHERE userId='$user'";
	$runSelectQuery=mysqli_query($connection,$selectQuery);
	if($runSelectQuery==true){
		$row=mysqli_fetch_array($runSelectQuery); 
		$profilePic=$row["profilePic"];?>
		<div id="pWrapper">
			<form id="editProfileForm">
				<div id="profileBody">
					<img src="profilePictures/<?php echo $profilePic;?>">
					<input id="proficePic" type="file" name="profilePic" accept="image/*">
					<div id="profileName"><h3><?php echo $row["firstName"]. " ". $row["lastName"] ?></h3></div>
					<table id="profile_table">
						<tr>
							<th><?php echo "First Name";?></th>
							<td><input type="text" name="fname" value="<?php echo $row["firstName"] ;?>"></td>
						</tr>
						<tr>
							<th><?php echo "Last Name";?></th>
							<td><input type="text" name="lname" value="<?php echo $row["lastName"] ;?>"></td>
						</tr>
						<tr>
							<th><?php echo "email";?></th>
							<td>
								<input type="email" name="email" value="<?php echo $row["email"] ;?>" <?php if($row["email"]== "varateourwebsite34@gmail.com"){?> readonly <?php } ?>>
							</td>
						</tr>
						<tr>
							<th><?php echo "Password";?></th>
							<td><input type="text" name="pwd" value="<?php echo $_SESSION["pass"];?>"></td>
						</tr>
						<tr>
							<th><?php echo "Gender";?></th>
							<td>
								<?php
								if($row["gender"]== "Male"){?>
									<input type="radio" name="gender" value="Male" checked><?php echo $row["gender"];?>
									<input type="radio" name="gender" value="Female">Female
								<?php }
								else{ ?>
									<input type="radio" name="gender" value="Male">Male
									<input type="radio" name="gender" value="Female" checked><?php echo $row["gender"];?>
									<?php
								}
								?>
							</td>
						</tr>
						<tr>
							<th><?php echo "Contact Number";?></th>
							<td><input type="tel" name="phone" value="<?php echo "0".$row["contactNumber"] ;?>"></td>
						</tr>
					</table>
					<input  id="saveUpdateData" type="submit" name="submitBtn" value="save your information">
				</div>
			</form>
		</div>
	<?php } 
	else{
		header("location:index.php?pleaseLogIn");
	}
}
else{
	header("location:homepage.php?pleaseLogIn");
}
require_once("footer.php");
?>

