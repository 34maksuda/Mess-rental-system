<?php
session_start();
if(isset($_SESSION["userId"])){
	if(isset($_COOKIE["sucPayment"])){ ?>
		<span id="checkRegis">The seat has been occupied successfully!</span>
		<?php setcookie("sucPayment","ahgkyl",time()-(30));
		 } 
	require_once("dbConnection.php");
	require_once("header.php");
	require_once("navbar.php");
	$selectAllUser="SELECT * FROM payment12 ORDER BY paymentStatus desc";
	$runSelectAllUser=mysqli_query($connection,$selectAllUser);
	if($runSelectAllUser==true){ ?>
		<div id="userTitle">User Payment requests for seats</div>
		<div id="bookinCnfrmError"></div>
		<?php
		$u=1; 
		while($users=mysqli_fetch_array($runSelectAllUser)){ ?>
			<form class="bookingCnfrm">
				<input type="number" name="PID" value="<?php echo $users["paymentId"]; ?>" hidden>
				<table id="profile_table" class="profile_table">
					
					<tr>
						<th>Serial No.</th>
						<th>Seat Id</th>
						<th>userContact</th>
						<th>userTransactionId</th>
						<th>confirmUserTransactionId</th>
						<th>messOwnerContact</th>
						<th>totalSeatRent</th>
						<th>meFromMessOwnerTID </th>
						<th>seatStatus</th>
						<th>Payment Status</th>
						<th>activity1</th>
						<th>activity2</th>
					</tr>
					<tr>
						<td><?php echo $u; ?></td>
						<td>
							<input type="text" name="seatId" value="<?php echo $users["seatId"]; ?>">
						</td>
						<td>
							<input type="email" name="userContact" value="<?php echo "0".$users["userContact"]; ?>" readonly>
						</td>
						<td>
							<input type="text" name="userTID" value="<?php echo $users["userTID"]; ?>" readonly>
						</td>
						<td>
							<input type="text" name="cnfrmUserTID" placeholder="write here the transaction Id">
						</td>
						<td>
							<input type="number" name="messOwnerPhn" value="<?php echo "0".$users["messOwnerContact"]; ?>" readonly>
						</td>
						<td>
							<input type="number" name="totalseatRent" value="<?php echo $users["totalSeatRent"]; ?>" readonly><span> TK</span>
						</td>
							<td>
								<input type="text" name="meFromMessOwnerTID" placeholder="write here the transaction Id">
							</td>
							<?php
							$seatId=$users["seatId"]; 
							$selectSeat="SELECT seatStatus FROM seatdetails12 WHERE seatId='$seatId'";
							$runSelectSeat=mysqli_query($connection,$selectSeat);
							$seatRow=mysqli_fetch_array($runSelectSeat);
							$seatStatus=$seatRow["seatStatus"];
							?>
							<td>
								<?php
								if($seatStatus== "vacant"){?>
									<input type="radio" name="seatStatus" value="vacant" checked><?php echo $seatStatus;?>
									<input type="radio" name="seatStatus" value="occupied">occupied <br>
								<?php }
								else{ ?>
									<input type="radio" name="seatStatus" value="vacant" disabled>vacant
									<input type="radio" name="seatStatus" value="occupied" disabled checked><?php echo $seatStatus; ?> <br>
								<?php }
								?>
							</td>


							<td>
								<?php if($users["paymentStatus"]=="uncheck"){ ?>
									<input type="text"  id="pRStatus" name="Pstatus" value="<?php echo $users["paymentStatus"]; ?>" readonly> <?php
								} 
								else{ ?>
									<input type="text"  id="pGStatus" name="Pstatus" value="<?php echo $users["paymentStatus"]; ?>" readonly>
								<?php } ?>
							</td> 

							<td onclick="return confirm('Really want to occupy the seat?')">
								<input type="submit" name="submit" id="pRSbtn" value="Save">
							</td>
							<td>
								<a href="#">Message</a>
							</td>				

						</tr>
					</table>
				</form>

				<?php $u++;
			} ?>

			<?php
		}
		else{
			echo "query wrong!";
		}

	}

	else{
		header("location:homepage.php?pleaseLogIn");
	}
	?>
