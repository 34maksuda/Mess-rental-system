<?php 
session_start();
require_once("header.php");
?>
<?php
require_once("navbar.php");
require_once("dbConnection.php");
if(isset($_SESSION["userId"])){

	 if(isset($_COOKIE["upProfile"])) { ?>
        <span id="checkRegis">Your profile has been updated successfully!</span>
        <?php 
        setcookie("upProfile","asdfg",time()-(60));
      }
	$user=$_SESSION["userId"];
	$selectQuery="SELECT * FROM registeredperson12 WHERE userId='$user'";
	$runSelectQuery=mysqli_query($connection,$selectQuery);
	if($runSelectQuery==true){ ?>
		<?php
		$searchQuery1 = "SELECT * FROM messinfo12 WHERE userId = '$user'";
		$runSearchQuery1 = mysqli_query($connection,$searchQuery1);
		$countPMess=mysqli_num_rows($runSearchQuery1);
		if($runSearchQuery1 == true && $countPMess >= 1){ 
			$messSerial=1; ?>
			<div id="profileNav6">
				<div class="row customRow">
					<div class="col-md-3"></div>
					<div class="col-md-4 tabsOP"><a href="profile.php">Your profile</a></div>
					<div class="col-md-4 tabsOP"><a href="messProfile.php">Your mess/hostel profile</a></div>
					<div class="col-md-1"></div>
				</div>
			</div>
		<?php }
		?>
		<?php
		$row=mysqli_fetch_array($runSelectQuery); 
		$profilePic=$row["profilePic"];?>
		<div id="pWrapper">
			<div id="profileBody">
				<img class="profilePic87" src="profilePictures/<?php echo $profilePic;?>">
				<div id="profileName"><h3><?php echo $row["firstName"]. " ". $row["lastName"] ?></h3></div>
				<table id="profile_table">
					<tr>
						<th><?php echo "First Name";?></th>
						<td><?php echo $row["firstName"] ;?></td>
					</tr>
					<tr>
						<th><?php echo "Last Name";?></th>
						<td><?php echo $row["lastName"] ;?></td>
					</tr>
					<tr>
						<th><?php echo "Email Address";?></th>
						<td><?php echo $row["email"];?></td>
					</tr>
					<tr>
						<th><?php echo "Password";?></th>
						<td><input type="password" value="<?php echo $_SESSION["pass"];?>" readonly></td>
					</tr>
					<tr>
						<th><?php echo "Gender";?></th>
						<td><?php echo $row["gender"];?></td>
					</tr>
					<tr>
						<th><?php echo "Contact Number";?></th>
						<td><?php echo "0".$row["contactNumber"];?></td>
					</tr>
				</table>
			</div>

		</div>
		<?php if($row["email"] != "varateourwebsite34@gmail.com"){?>
			<div id="adminSection">
				<ul>
					<li><a href="edit profile.php">Edit Profile</a></li>
					<li><a href="orderedSeat.php">Ordered Seat</a></li>
				</ul>
			</div>
		<?php } 
		else if($row["email"] == "varateourwebsite34@gmail.com"){
			?>
			<p id="adminSite">Admin Site</p>
			<div id="adminSection">
				<ul>
					<li><a href="edit profile.php">Edit Profile</a></li>
					<li><a href="manageUsers.php">Manage Users</a></li>
					<li><a href="managePayment.php">Manage Payment</a></li>
				</ul>
			</div>
		<?php } ?> 
		<?php 
		require_once("footer.php");
	}
}
else{
	setcookie("notLogIn","asdf",time()+(30));
	header("location:homepage.php?");
}

?>



