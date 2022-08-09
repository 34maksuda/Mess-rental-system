<?php
session_start();
require_once("dbConnection.php");
require_once("header.php");
?>

<body>
  <?php
  require_once("navbar.php");
  if(isset($_SESSION["userId"])){
    ?>
    <?php
    $seatId=$_REQUEST["seatId"];
    ?>
    <a href="reviews.php?seatId=<?php echo $seatId; ?>" class="review" id="shareReview">Share Reviews</a>
    <a href="showReviews.php?seatId=<?php echo $seatId; ?>" class="review" id="showReview">show Reviews</a>
    <div id="productDetails">
      <p id="diabtmess">details information about the seat</p>
      <div class="row container allimg">
        <div class="col-md-4">
         <?php 
         $seatSearch = "SELECT * FROM seatdetails12 where seatId = '$seatId'";
         $runSeatSearch = mysqli_query($connection,$seatSearch);
         if($runSeatSearch == true){
          $seatDetails = mysqli_fetch_array($runSeatSearch);
          $roomId = $seatDetails["roomId"];
          $seatPic = $seatDetails["seatPic"];
          $seatIndvPic = explode(',',$seatPic );
          $arraySize = sizeof($seatIndvPic);
          require_once("imageSlider.php");
        } ?>
      </div>
      <div class="col-md-4">
       <?php 
       $roomSearch = "SELECT * FROM roomdetails12 where roomId = '$roomId'";
       $runRoomSearch = mysqli_query($connection,$roomSearch);
       if($runRoomSearch == true){
        $roomDetails = mysqli_fetch_array($runRoomSearch);
        $messId=$roomDetails["messId"];
        $roomPic = $roomDetails["roomPic"];
        $roomIndvPic = explode(',',$roomPic );
        $arraySize1 = sizeof($roomIndvPic);
        require_once("imageSlider2.php");
      } ?>
    </div>
    <div class="col-md-4">
     <?php 
     $messSearch = "SELECT * FROM messinfo12 where messId = '$messId'";
     $runMessSearch = mysqli_query($connection,$messSearch);
     if($runMessSearch == true){
      $messDetails = mysqli_fetch_array($runMessSearch);
      $messPic = $messDetails["messPic"]; ?>
      <img id="mess" src="messPictures/<?php echo $messPic ?>">
      <p id="messText">mess building</p>
    <?php } ?>
  </div>
</div>
<div class="row container secDiv">
  <div class="col-md-2"></div>
  <div class="col-md-4">
    <?php 
    $bathPic=$roomDetails["commonBathPic"];
    $indvBath=explode(',',$bathPic);
    $arraySize2 = sizeof($indvBath);
    require_once("imageSlider3.php");
    ?>
  </div>
  <div class="col-md-4">
    <?php 
    $besinPic = $roomDetails["besinPic"]; ?>
    <img id="mess" src="roomPictures/<?php echo $besinPic ?>">
    <p id="messText"> common besin image</p>
  </div>
  <div class="col-md-2"></div>
</div>

<div id="messOverAllInfo">
  <table id="table1">
    <tr>
      <td>Mess name</td>
      <td><?php echo $messDetails["messName"] ?></td>
    </tr>
    <tr>
      <td>Mess type</td>
      <td><?php echo $messDetails["messType"]." mess" ?></td>
    </tr>
    <tr>
      <td>Mess location</td>
      <td><?php echo $messDetails["messLocation"] ?></td>
    </tr>
    <tr>
      <td>Room No.</td>
      <td><?php echo $roomDetails["roomNo"] ?></td>
    </tr>
    <tr>
      <td>Seat No.</td>
      <td><?php echo $seatDetails["seatNo"] ?></td>
    </tr>
    <tr>
      <td>Seat Rent</td>
      <td><?php echo $seatDetails["seatRent"]." TK/month" ?></td>
    </tr>
    <tr>
      <td>Does this seat is occupied or vacant?</td>
      <td><?php echo $seatDetails["seatStatus"] ?></td>
    </tr>
    <tr>
      <td>Room Length</td>
      <td><?php echo $roomDetails["roomLength"]." feet" ?></td>
    </tr>
    <tr>
      <td>Room width</td>
      <td><?php echo $roomDetails["roomWidth"]." feet" ?></td>
    </tr>
    <tr>
      <td>how many seats in this room</td>
      <td><?php echo $roomDetails["numOfSeat"] ?></td>
    </tr>
    <tr>
      <td>how many windows in this room</td>
      <td><?php echo $roomDetails["numOfWindow"] ?></td>
    </tr>
    <tr>
      <td>In which floor this room is located?</td>
      <td><?php echo $roomDetails["roomLocation"] ?></td>
    </tr>
    <tr>
      <td>number of seat in this floor</td>
      <td><?php echo $roomDetails["numOfSeatInFloor"] ?></td>
    </tr>
  </table>
  <table id="table2">
    <tr>
      <td>Features of this room</td>
      <td><?php echo $roomDetails["specialFeatures"] ?></td>
    </tr>
    <tr>
      <td>Number of common bath in this floor</td>
      <td><?php echo $roomDetails["numOfCommonBath"] ?></td>
    </tr>
    <tr>
      <td>Number of common besin in this floor</td>
      <td><?php echo $roomDetails["numOfBesin"] ?></td>
    </tr>
    <tr>
      <td>service charge for this seat</td>
      <td><?php echo $seatDetails["serviceCharge"]." TK" ?></td>
    </tr>
    <tr>
      <td>security deposit of this seat</td>
      <td><?php echo $seatDetails["securityDeposit"]." Tk" ?></td>
    </tr>
    <tr>
      <td>how many floors in this mess</td>
      <td><?php echo $messDetails["numOfFloor"] ?></td>
    </tr>
    <tr>
      <td>Does mess owner live in mess?</td>
      <td><?php echo $messDetails["messOwnerStatus"] ?></td>
    </tr>
    <tr>
      <td>Does there any security gurd?</td>
      <td><?php echo $messDetails["securityGurdStatus"] ?></td>
    </tr>
    <tr>
      <td>Does this house have a maid?</td>
      <td><?php echo $messDetails["maidStatus"] ?></td>
    </tr>
    <tr>
      <td>Does this room furnished</td>
      <td><?php echo $messDetails["roomStatus"] ?></td>
    </tr>
    <tr>
      <td>special features of this mess</td>
      <td><?php echo $messDetails["specialFeatures"] ?></td>
    </tr>
    <tr>
      <td>lease term for this mess</td>
      <td><?php echo $messDetails["leaseTerm"] ?></td>
    </tr>
    <tr>
      <td>preffered tenant for this mess</td>
      <td><?php echo $messDetails["tenantType"] ?></td>
    </tr>
  </table>
</div>
</div>
<div id="foo"><?php require_once("footer.php"); ?></div>
<?php
}
else{
  setcookie("notLogIn","asdf",time()+(30));
  header("location:index.php?notLogIn1");
} ?>

