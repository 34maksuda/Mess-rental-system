<?php
session_start();
if(isset($_SESSION["userId"])){
	require_once("dbConnection.php");
	require_once("header.php");
	require_once("navbar.php");
	if(isset($_COOKIE["deleteUser"])){ ?>
		<span id="messDeleted">A user has been deleted successfully!</span>
		<?php
		setcookie("deleteUser","yhrt",time()-(30));

	}
	$selectAllUser="SELECT * FROM feedback12";
	$runSelectAllUser=mysqli_query($connection,$selectAllUser);
	if($runSelectAllUser==true){ ?>
		<div id="userTitle">Users Of Your Website</div>
		<table id="profile_table" class="feedbackTable">
			<tr>
				<th>Serial No.</th>
				<th>Warning for user(who give feedback)</th>
				<th>warning for messOwner's(for whom mess feedback is given)</th>
				<th>delete user's account<br>(who has given feedback)</th>
				<th>Delete mess's account<br>(For which feedback is given)</th>
				<th>Feedback</th>
				<th>Mess Id</th>
				<th>Room Id</th>
				<th>Seat Id</th>
				<th>picture from user who gave feedback</th>

			</tr>
			<?php
			$u=1; 
			while($users=mysqli_fetch_array($runSelectAllUser)){ ?>
				<tr>
					<td><?php echo $u; ?></td>
					<td><?php
					$givenId=$users["givenId"];
					$selectUser0 = "SELECT * FROM registeredperson12 WHERE userId='$givenId'";
					$runSelectUser0 = mysqli_query($connection,$selectUser0);
					$givenUser=mysqli_fetch_array($runSelectUser0);
					echo $givenUser["email"];
					?>
				</td>
				<td>
					<?php
					$takenId=$users["userId"];
					$selectMessOwner0 = "SELECT * FROM registeredperson12 WHERE userId='$takenId'";
					$runSelectMessOwner0 = mysqli_query($connection,$selectMessOwner0);
					$takenUser=mysqli_fetch_array($runSelectMessOwner0);
					echo $takenUser["email"];
					?>
				</td>
				<td><a onclick="return confirm('Really want to delete the user?')" href="deleteUser.php?userId=<?php echo $users["givenId"];?>">Delete user's account</a></td>
				<td><a onclick="return confirm('Really want to delete the mess?')" href="deleteMess.php?messId=<?php echo $users["messId"];?>">Delete mess's account</a></td>
				<td><div class="feebackPicRow"><?php echo $users["feedback"]; ?>
			</div></td>
			<td><?php echo $users["messId"]; ?></td>
			<td><?php echo $users["roomId"]; ?></td>
			<td><?php echo $users["seatId"]; ?></td>
			<td>
				<div class="feebackPicRow">
					<?php 
					$feedbackPic = $users["feedbackPic"];
					if($users["feedbackPic"] != NULL) {
						$feedbackIndvPic=explode(',',$feedbackPic);
						$arraySize=sizeof($feedbackIndvPic); ?>
						<div class="reviewIn12"> <?php
						for($i=1;$i<=$arraySize-1;$i++){ ?>
							<img src="reviewPic/<?php echo $feedbackIndvPic[$i];?>">
						<?php }
					} 
					else{
						echo "Empty";
					} ?>
				</div>
			</div>
		</td>
	</tr>
	<?php  $u++; } ?>
	</table> <?php
}
else{
	echo "query wrong!";
}

}

else{
	header("location:homepage.php?pleaseLogIn");
}

?>
