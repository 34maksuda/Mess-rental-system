<?php
session_start();
require_once("dbConnection.php");
require_once("header.php");
?>

<body>
  <?php
  $seatId=$_REQUEST["seatId"];
  require_once("navbar.php");
  if(isset($_SESSION["userId"])){ ?>
  	<div id="reviewsDiv">
  		<form id="reviewForm">
  		<p>Feel free to say us</p>
  		<div id="reviewCnfrmError"></div>
  		<input type="text" name="seatId" value="<?php echo $seatId; ?>" hidden>
  		<label>Share your review about this seat here:</label><br>
  		<textarea class="form-text-input" name="review" rows="4" cols="50" required></textarea><br>
  		<label>Upload at most 5 pictures of your seat and it's sorroundings: </label>
  		<input class="form-text-input" type="file" name="reviewPic[]" accept="image/*" multiple><br><br>
  		<input type="submit" name="submit" id="reviewSubmitBtn" value="Send">
  	</form>
  	</div>
  <?php }
  else{
  setcookie("notLogIn","asdf",time()+(30));
  header("location:index.php?notLogIn1");
} ?>