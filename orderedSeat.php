<?php
session_start();
require_once("header.php");
require_once("dbConnection.php");
if(isset($_SESSION["userId"])){ ?>
	<body>
		<?php
		require_once("navbar.php");
		$userId=$_SESSION["userId"];
		$userEmailQ="SELECT email FROM registeredPerson12 WHERE userId='$userId' ";
		$runUserEmailQ=mysqli_query($connection,$userEmailQ);
		$numOfRow=mysqli_num_rows($runUserEmailQ);
		if($runUserEmailQ==true && $numOfRow == 1){ 
			$userEmailArray= mysqli_fetch_array($runUserEmailQ);
			$userEmail = $userEmailArray["email"];
			$paymentDetails = "SELECT * FROM payment12 WHERE userEmail ='$userEmail'";
			$runPaymentDetails = mysqli_query($connection,$paymentDetails);
			$numOfProw= mysqli_num_rows($runPaymentDetails);
			if($numOfProw > 0){
				?>
				<div id="messShowHead">Your Registered Seat(s)</div>
				<table id="orderedSeat">
					<?php
					$seatSerial=1;
					while($seat=mysqli_fetch_array($runPaymentDetails)){
						?>
						<tr>
							<td>
								<a title="seat details" href="productDetails.php?seatId=<?php echo $seat["seatId"]; ?>"><?php echo $seatSerial.". ".$seat["seatId"];?></a>
							</td>
							<td><?php if($seat["paymentStatus"] == 'uncheck'){
								echo "Requesting...";
							}
							else if($seat["paymentStatus"] == 'checked'){
								echo "registered";
							} ?></td>
						</tr>
						<?php
						$seatSerial++; 
					} 
				} 
				else{ ?>
					<p id="orderText">you have no ordered seat!</p>
					<?php } ?>
				</table> 
				<?php
			} 
		}
		else{
			header("location:homepage.php?pleaseLogIn");
		}
		?>