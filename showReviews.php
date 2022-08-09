<?php
session_start();
require_once("dbConnection.php");
require_once("header.php");
if(isset($_SESSION["userId"])){
	if(isset($_COOKIE["deleteFeedback"])){ ?>
    <span id="messInfoEditSuccess">Your feedback has been deleted successfully!</span>
  <?php 
  unset($_SESSION["seatId"]);
  setcookie("deleteFeedback","oplkjh",time()-(30));
}
	require_once("navbar.php");
	$currentUser = $_SESSION["userId"];
	$seatId=$_REQUEST["seatId"];
	$selectQuery="SELECT * FROM feedback12 WHERE seatId='$seatId' ORDER BY entryTime desc";
	$runSelectQuery=mysqli_query($connection,$selectQuery);
	$numOfRow=mysqli_num_rows($runSelectQuery); ?>
	<div id="feeback09">
		<?php 
		if($runSelectQuery==true && $numOfRow > 0){
			while($row=mysqli_fetch_array($runSelectQuery)){ 
				$feedbackPic = $row["feedbackPic"];
				$givenUser=$row["givenId"];
				$selectUserRow="SELECT firstName,lastName FROM registeredperson12 WHERE userId='$givenUser'";
				$runSelectUserRow=mysqli_query($connection,$selectUserRow);
				$userRow=mysqli_fetch_array($runSelectUserRow);
				$userName=$userRow["firstName"]." ".$userRow["lastName"];
				?>
				<div class="row">
					<div class="reviewIn">
						<p><?php echo $userName; ?></p><br>
						<?php echo $row["feedback"];?><br><br>
						<?php 
						if($feedbackPic != NULL) {
							$feedbackIndvPic=explode(',',$feedbackPic);
							$arraySize=sizeof($feedbackIndvPic);
							for($i=1;$i<=$arraySize-1;$i++){ ?>
								<img src="reviewPic/<?php echo $feedbackIndvPic[$i];?>">
							<?php }
						} 
						 if($givenUser==$currentUser){ 
						 	$feedbackId= $row["feedbackId"]; ?>
						<div class="editFeedbackOptions">
							<a href="editFeedback.php?feedbackId= <?php echo $feedbackId; 
							$_SESSION["seatId"]=$seatId; ?>">Edit</a>
							<a onclick="return confirm('Really want to delete this feedback!')" href="deleteFeedback.php?feedbackId= <?php echo $feedbackId;$_SESSION["seatId"]=$seatId; ?>">Delete</a>
						</div>
						<?php } ?><br>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
<?php }
else{ ?>
	<div id="noReviews">No reviews yet!</div>
<?php }

}
else{
	setcookie("notLogIn","asdf",time()+(30));
	header("location:index.php?notLogIn1");
} ?>
