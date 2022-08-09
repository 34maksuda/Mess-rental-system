<?php
session_start();
require_once("header.php");
require_once("dbConnection.php");
if(isset($_SESSION["userId"])){ ?>

	<body>
		<?php
		require_once("navbar.php");
		if(isset($_COOKIE["deleteRoom"])){ ?>
			<span id="roomDeleted">your room has been deleted successfully.</span>
		<?php
		unset($_SESSION["messId"]);
		setcookie("deleteRoom","gfhj",time()-(30));
		 }
		$messId=$_REQUEST["messId"];
		$userId=$_SESSION["userId"];
		$messRoomQ="SELECT * FROM roomdetails12 WHERE messId='$messId' ORDER BY roomNo";
		$runMessRoomQ=mysqli_query($connection,$messRoomQ);
		$numOfRow=mysqli_num_rows($runMessRoomQ);
		if($runMessRoomQ==true && $numOfRow > 0){ ?>
			<div id="messShowHead">room of this mess</div>
			<table id="personMessShow">
				<?php
				while($messRoom=mysqli_fetch_array($runMessRoomQ)){ 
					$roomId=$messRoom["roomId"];
					$roomSerial=1; ?>
					<tr>
						<td>
							<?php echo $roomSerial.". "."Room No. ".$messRoom["roomNo"]; ?>
						</td>
						<td><a href="detailsAboutRoom.php?roomId=<?php echo $roomId; ?>">show details about this room</a></td>
						<td><a href="seatProfile.php?roomId=<?php echo $roomId; ?>">show the seats of this room</a></td>
						<td><a href="editRoomProfile.php?roomId=<?php echo $roomId; ?>">Edit this room info</a></td>
						<td><a onclick="return confirm('really want to delete this room')" href="deleteRoom.php?roomId=<?php echo $roomId; $_SESSION["messId"] = $messId; ?>">Delete this room</a></td>
					</tr>
					<?php
					$roomSerial++; 
				} ?>
			</table>
			<div id="roomAdd">
				<a href="roomDetails.php?messId=<?php echo $messId; ?>" id="addNew" class="addNew" title="add a new room">+</a>
			</div>
		<?php }
		else{ ?>
			<div id="roomAdd1">
				<a href="roomDetails.php?messId=<?php echo $messId; ?>" id="addNew" class="addNew" title="add a new room">+</a>
			</div>
			<p id="roomNotReg">you haven't registered any room for this mess</p>

		<?php }
	}
	else{
		header("location:homepage.php?pleaseLogIn");
	}
	?>