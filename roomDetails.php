<?php
session_start();
require_once("header.php");
if(isset($_SESSION["userId"])){
  ?>

  <body>
    <?php
    session_start();
    require_once("header.php");
    require_once("navbar.php");
    ?>
    <section class="container" id="roomDetailsFormWrapper">
     <form id="roomDetailsForm">
      <div id="roomDetailsFormHeading"><h3>Room Details</h3></div>
      <div id="roomFormWrgSbmssn"></div>
      <div class="leftBar">
        <?php 
        if(isset($_REQUEST["messId"])){ 
          $messId = $_REQUEST["messId"]; ?>
          <input type="hidden" name="messId" value="<?php echo $messId; ?>">
          <?php
        } ?>
        
        <label>Room No:</label><br>
        <input type="text" name="roomNo" class="form-text-input" placeholder="Room number" required>
        <br>
        <br>
        <label>Room length in foot:</label><br>
        <input type="number" name="roomLength" class="form-text-input" placeholder="Room Length" required>
        <br>
        <br>
        <label>Room width in foot:</label><br>
        <input type="number" name="roomWidth" class="form-text-input" placeholder="Room width" required>
        <br>
        <br>
        <label>How many Seats in this room?:</label><br>
        <input type="number" name="numOfSeat" class="form-text-input" placeholder="How many Seats in this room?" required>
        <br>
        <br>
        <label>How many windows in this room?:</label><br>
        <input type="number" name="numOfWindow" class="form-text-input" placeholder="number of windows in this room"  required>
        <br>
        <br>
        <label>In which floor level this room is located?:</label><br>
        <select name="roomLocation" class="form-text-input">
         <option>Ground floor</option>
         <option>1st floor</option>
         <option>2nd floor</option>
         <option>3rd floor</option>
         <option>4th floor</option>
         <option>5th floor</option>
         <option>6th floor</option>
         <option>7th floor</option>
         <option>8th floor</option>
         <option>9th floor</option>
         <option>10th floor</option>
       </select>
       <br>
       <br>
       <label>How many seats in this floor?:</label><br>
       <input type="number" name="numberOfSeatInFloor" class="form-text-input" placeholder="number of seats in this room"  required>
       <br>
       <br>
       <label>check the speacial features for this room:</label><br>
       <input type="checkbox" name="specialFeature[]" value="Bed"> Bed.<br>
       <input type="checkbox" name="specialFeature[]" value="Chair-table"> chair-table.<br>
       <input type="checkbox" name="specialFeature[]" value="mattress"> mattress.<br>
       <input type="checkbox" name="specialFeature[]" value="Light"> Light.<br>
     </div>
     <div class="rightBar">
       <input type="checkbox" name="specialFeature[]" value="Fan"> Fan.<br>
       <input type="checkbox" name="specialFeature[]" value="AC"> AC. <br>
       <input type="checkbox" name="specialFeature[]" value="Tiles"> Tiles. <br>
       <input type="checkbox" name="specialFeature[]" value="Balcony"> Balcony. <br>
       <input type="checkbox" name="specialFeature[]" value="attached Bath"> attached bath.
       <br>
       <br>
       <label>How many common bath in this floor?:</label><br>
       <input type="number" name="commonBath" class="form-text-input" placeholder="number of common bath in this floor"  required>
       <br>
       <br>
       <br>
       <br>
       <label>How many besin in this floor?:</label><br>
       <input type="number" name="besin" class="form-text-input" placeholder="number of besin in this floor"  required>
       <br>
       <br>
       <br>
       <br>
        <label>upload 3 pictures that describes overview of this <br>room from different sides:</label><br>
        <input type="file" name="roomPic[]" class="form-text-input" accept="image/*" placeholder="Room's pictures" required multiple>
        <br>
        <br>
        <br>
        <br>
        <label>upload 2 common bath pictures for this floor:</label><br>
        <input type="file" name="commonBathPic[]" class="form-text-input" accept="image/*" placeholder="common bath's picture"required multiple>
        <br>
        <br>
        <br>
        <br>
        <label>upload the besin pictures for this floor:</label><br>
        <input type="file" name="besinPic" class="form-text-input" accept="image/*" placeholder="besin's pictures" required>
        <br>
        <br>
      </div>
      <input type="submit" id="submitroomDetailsForm" name="submit" value="SAVE">
    </form>
  </section>
  <?php require_once("footer.php"); }
  else{
    header("location:homepage.php?pleaseLogIn");
  }
  ?>
