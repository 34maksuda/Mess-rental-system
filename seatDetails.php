<?php
session_start();
require_once("header.php");
if(isset($_SESSION["userId"])){ ?>

    <body>
      <?php
      require_once("navbar.php");
      ?>
      <section class="container" id="messMasterFormWrapper">
       <form id="seatDetailsForm">
        <div id="messFormHeading"><h3>Seat Information</h3></div>
        <div id="seatFormWrgSbmssn"></div>
        <?php 
        if(isset($_REQUEST["roomId"])){ 
          $roomId = $_REQUEST["roomId"]; ?>
          <input type="hidden" name="roomId" value="<?php echo $roomId; ?>">
          <?php
      } ?>
      <label>Enter Seat No:</label><br>
      <input class="form-text-input" type="text" name="seatNo" placeholder="Seat number" required>
      <br>
      <br>
      <label>How much rent of this seat per month(in TK.)?:</label><br>
      <input type="number" name="rentPerMonth" class="form-text-input" placeholder="rent per month" required>
      <br>
      <br>
      <label>How much the service charge(in Tk.)for this seat?:</label><br>
      <input type="number" name="serviceCharge" class="form-text-input" placeholder="service charge" required>
      <br>
      <br>
      <label>How much the security deposit(in Tk.)for this seat?:</label><br>
      <input type="number" name="securityDeposit" class="form-text-input" placeholder="security deposit" required>
      <br>
      <br>
      <label>Is this seat is occupied/vacant:</label><br>
      <input class="form-radio-input" type="radio" name="seatStatus" value="occupied">occupied
      <input class="form-radio-input" type="radio" name="seatStatus" value="vacant">vacant
      <br>
      <br>
      <label>upload 2 pictures that describes overview of this seat:</label><br>
      <input class="form-text-input" name="seatPic[]" type="file" accept="image/*" multiple required>
      <br>
      <br>
      <input id="submitSeatForm" type="submit" value="SAVE">

  </form>
</section>

<?php require_once("footer.php"); }
else{
    header("location:homepage.php?pleaseLogIn");
}
?>
