<?php
session_start();
require_once("dbConnection.php");
require_once("header.php");
require_once("navbar.php");

if(isset($_SESSION["userId"])){ ?>
  <body>
    <?php
    $feedbackId=$_REQUEST["feedbackId"];
    $selectQuery= "SELECT * FROM feedback12 WHERE feedBackId='$feedbackId'";
    $runSelectQuery = mysqli_query($connection,$selectQuery);
    $numOfRows = mysqli_num_rows($runSelectQuery);
    if($runSelectQuery == true && $numOfRows > 0){
      $row = mysqli_fetch_array($runSelectQuery); ?>

      <div id="reviewsDiv">
        <form id="editReviewForm">
          <p>Feel free to say us</p>
          <div id="reviewCnfrmError"></div>
          <input type="text" name="feedbackId" value="<?php echo $feedbackId; ?>" hidden>
          <label>Share your review about this seat here:</label><br>
          <input type="text" class="form-text-input" value="<?php echo $row["feedback"]; ?>" name="review" required>
          <label>Upload at most 5 pictures of your seat and it's sorroundings: </label>
          <input class="form-text-input" type="file" name="reviewPic[]" accept="image/*" multiple><br><br>
          <input type="submit" name="submit" id="reviewSubmitBtn" value="Send">
        </form>
      </div>
    <?php }

  }
  else{
    setcookie("notLogIn","asdf",time()+(30));
    header("location:index.php?notLogIn1");
  }
  ?>