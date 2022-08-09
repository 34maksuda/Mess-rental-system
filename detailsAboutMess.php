<?php 
session_start();
if(isset($_SESSION["userId"])){
	require_once("header.php");
	require_once("dbConnection.php");
	require_once("navbar.php"); 
	$messId=$_REQUEST["messId"];
	$user=$_SESSION["userId"];
	$selectQuery="SELECT * FROM messinfo12 WHERE messId='$messId'";
	$runSelectQuery=mysqli_query($connection,$selectQuery);
	if($runSelectQuery==true){
		$row=mysqli_fetch_array($runSelectQuery); 
		$messPic=$row["messPic"];?>
		<div id="pWrapper">
			<form id="messProfileForm">
				<div id="messProfileBody">
					<img src="messPictures/<?php echo $messPic;?>">
					<div id="messProfileName1"><h3><?php echo $row["messName"]." Mess"?></h3></div>
					<table id="profile_table">
						<tr>
							<th>Mess Name</th>
							<td>
								<?php echo $row["messName"] ;?>
							</td>
						</tr>
						<tr>
							<th>Is it male/Female mess</th>
							<td><?php echo $row["messType"];?></td>
						</tr>
						<tr>
							<th><?php echo "messLoctaion";?></th>
							<td><?php echo $row["messLocation"] ;?></td>
						</tr>
						<tr>
							<th><?php echo "How many floors in this mess";?></th>
							<td><?php echo $row["numOfFloor"];?></td>
						</tr>
						<tr>
							<th>Is the mess owner live in mess</th>
							<td>
								<?php echo $row["messOwnerStatus"];?>
							</td>
						</tr>
						<tr>
							<th>Is this mess have any security gurd?</th>
							<td>
								<?php echo $row["securityGurdStatus"];?>
							</td>
						</tr>
						<tr>
							<th>Is this mess have any maid-servant?</th>
							<td>
								<?php echo $row["maidStatus"];?>
							</td>
						</tr>
					</tr>
					<tr>
						<th>Is the rooms of the mess is furnished(ready-room)?</th>
						<td>
							<?php echo $row["roomStatus"];?>
						</td>
					</tr>
					<tr>
						<th>special features of the mess</th>
						<td>
							<?php echo $row["specialFeatures"];?>
						</td>
					</tr>
					<tr>
						<th>lease Term for your mess</th>
						<td><?php echo $row["leaseTerm"] ?></td>
					</tr>
					<tr>
						<th>preffered tenant for your mess</th>
						<td> <?php echo $row["tenantType"]; ?>
						</td>
					</tr>
				</table>
			</div>
		</form>
	</div>
<?php //}
} 
else{
	header("location:homepage.php?pleaseLogIn");
}

}

else{
	header("location:homepage.php?pleaseLogIn");
} 
?>

