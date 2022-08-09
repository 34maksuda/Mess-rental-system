<?php
session_start();
require_once("header.php");
require_once("dbConnection.php");
if(isset($_SESSION["userId"])){ ?>

	<body>
		<?php
		require_once("navbar.php");
		if(isset($_COOKIE["MPESC"])) { ?>
			<span id="messInfoEditSuccess">Your mess information has been updated successfully!</span>
			<?php 
			setcookie("MPESC","sdfg",time()-(30));
		}
		if(isset($_COOKIE["seatupdated"])) { ?>
			<span id="messInfoEditSuccess">Your seat information has been updated successfully!</span>
			<?php 
			setcookie("seatupdated","hgjk",time()-(30));
		}
		if(isset($_COOKIE["roomUp"])){ ?>
			<span id="roomInfoEditS">your room info has been updated successfully.</span>
		<?php
		setcookie("roomUp","kkk",time()-(30));
		 }
		 if(isset($_COOKIE["deleteMess"])){ ?>
			<span id="messDeleted">your mess has been deleted successfully.</span>
		<?php
		setcookie("deleteMess","hjkl",time()-(30));
		 }

		$userId=$_SESSION["userId"];
		$personMessQ="SELECT * FROM messinfo12 WHERE userId='$userId'";
		$runPersonMess=mysqli_query($connection,$personMessQ);
		if($runPersonMess==true){ ?>
			<div id="messShowHead">Your Mess</div>
			<table id="personMessShow">
				<?php
				while($personMess=mysqli_fetch_array($runPersonMess)){ 
					$messId=$personMess["messId"];
					$messSerial=1; ?>
					<tr>
						<td>
							<?php echo $messSerial.". ".$personMess["messName"]; ?>
						</td>
						<td><a href="detailsAboutMess.php?messId=<?php echo $messId; ?>">show details about this mess</a></td>
						<td><a href="roomProfile.php?messId=<?php echo $messId; ?>">show the rooms of this mess</a></td>
						<td><a href="editMessProfile.php?messId=<?php echo $messId; ?>">Edit this mess info</a></td>
						<td><a onclick="return confirm('really want to delete this mess')" href="deleteMess.php?messId=<?php echo $messId; ?>">Delete this mess</a></td>
					</tr>
					<?php
					$messSerial++; 
				} ?>
			</table>
			<div id="messAdd">
				<a href="messInfo.php" id="addNew" title="add a new mess">+</a>
			</div>
		<?php }
	}
	else{
		header("location:homepage.php?pleaseLogIn");
	}
	?>