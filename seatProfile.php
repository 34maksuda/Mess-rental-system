<?php
session_start();
require_once("header.php");
require_once("dbConnection.php");
if(isset($_SESSION["userId"])){ ?>

	<body>
		<?php
		require_once("navbar.php");
		if(isset($_COOKIE["deleteseat"])){ ?>
			<span id="seatDeleted">your seat has been deleted successfully.</span>
		<?php
		unset($_SESSION["roomId"]);
		setcookie("deleteseat","jklo",time()-(30));
		 }
		$roomId=$_REQUEST["roomId"];
		$userId=$_SESSION["userId"];
		$messRoomQ="SELECT * FROM seatdetails12 WHERE roomId='$roomId' ORDER BY seatNo";
		$runMessRoomQ=mysqli_query($connection,$messRoomQ);
		$numOfRow=mysqli_num_rows($runMessRoomQ);
		if($runMessRoomQ==true && $numOfRow > 0){ ?>
			<div id="messShowHead">seats of this room</div>
			<table id="personMessShow">
				<?php
				$roomSerial=1;
				while($messRoom=mysqli_fetch_array($runMessRoomQ)){ 
					$seatId=$messRoom["seatId"];
					 ?>
					<tr>
						<td>
							<?php echo $roomSerial.". "."seat No. ".$messRoom["seatNo"]; ?>
						</td>
						<td><a href="detailsAboutSeat.php?seatId=<?php echo $seatId; ?>">show details about this seat</a></td>
						<td><a href="editSeatProfile.php?seatId=<?php echo $seatId; ?>">Edit this seat info</a></td>
						<td><a onclick="return confirm('really want to delete this room')" href="deleteSeat.php?seatId=<?php echo $seatId; $_SESSION["roomId"] = $roomId; ?>">Delete this seat</a></td>
						<td><?php echo $messRoom["seatStatus"]; ?></td>
					</tr>
					<?php
					$roomSerial++; 
				} ?>
			</table>
			<div id="seatAdd">
				<a href="seatDetails.php?roomId=<?php echo $roomId; ?>" id="addNew" class="addNew" title="add a new seat">+</a>
			</div>
		<?php }
		else{ ?>
			<div id="seatAdd1">
				<a href="seatDetails.php?roomId=<?php echo $roomId; ?>" id="addNew" class="addNew" title="add a new seat">+</a>
			</div>
			<p id="roomNotReg">you haven't registered any seat for this room</p>

		<?php }
	}
	else{
		header("location:homepage.php?pleaseLogIn");
	}
	?>