<?php
session_start();
require_once("header.php");
if(isset($_SESSION["userId"])){ ?>

    <body>
      <?php
      require_once("navbar.php");
      ?>
      <section class="container" id="messMasterFormWrapper">
       <form id="messMasterForm">
        <div id="messFormHeading"><h3>Hostel/Mess Information</h3></div>
        <div id="messFormWrgSbmssn"></div>
        <div class="leftBar">
            <label>Enter Your Hostel/Mess Name:</label><br>
            <input class="form-text-input" type="text" name="messName" placeholder="Hostel/Mess name" required>
            <br>
            <br>
            <label>what is the type of the Mess:</label><br>
            <select class="form-text-input" name="messType">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <br>
            <br>
            <label>Enter the location where your Hostel/Mess situated:</label><br>
            <input class="form-text-input" type="text" name="messLocation" placeholder="Your Hostel/Mess Location" required>
            <br>
            <br>
            <label>How many floors in your Hostel/Mess?:</label><br>
            <input class="form-text-input" type="number" name="numOfFloor" placeholder="how many floors in your hostel/mess?" required>
            <br>
            <br>
            <label>Does the Hostel/Mess-owner live in the hostel/Mess?:</label><br>
            <input class="form-radio-input" type="radio" name="messOwnerStatus" value="Yes">Yes
            <input class="form-radio-input" type="radio" name="messOwnerStatus" value="No">No
            <br>
            <br>
            <label>Does your Hostel/Mess has any security guard?:</label><br>
            <input class="form-radio-input" type="radio" name="securityGuardStatus" value="Yes">Yes
            <input class="form-radio-input" type="radio" name="securityGuardStatus" value="No">No
            <br>
            <br>
            <label>Does your Hostel/Mess has any maid servant?:</label><br>
            <input class="form-radio-input" type="radio" name="maidStatus" value="Yes">Yes
            <input class="form-radio-input" type="radio" name="maidStatus" value="No">No
            <br>
            <br>

        </div>
        <div class="rightBar">
            <label>Is your Hostel/Mess furnished(Ready-Room)?:</label><br>
            <input class="form-radio-input" type="radio" name="roomStatus" value="Yes">Yes
            <input class="form-radio-input" type="radio" name="roomStatus" value="No">No
            <br>
            <br>
            <label>check the special features in your Hostel/Mess:</label><br>
            <input type="checkbox" name="specialFeature[]" value="Wifi"> Wifi.<br>
            <input type="checkbox" name="specialFeature[]" value="TV"> TV.<br>
            <input type="checkbox" name="specialFeature[]" value="Fridge"> Fridge.<br>
            <input type="checkbox" name="specialFeature[]" value="IPS"> IPS.<br>
            <input type="checkbox" name="specialFeature[]" value="diningSpace"> Dining space.<br>
            <br>
            <label>How long is the lease term of your Hostel/Mess?:</label><br>
            <select class="form-text-input" name= "leaseTerm">
                <option value="N/A">N/A</option>
                <option value="6 month">6 month</option>
                <option value="1 year">1 year</option>
                <option value="2 year">2 year</option>
            </select>
            <br>
            <br>
            <label>what is your preffered tenant for your hostel/Mess?:</label><br>
            <select class="form-text-input" name="tenantType">
                <option value="anyone">anyone</option>
                <option value="student">student</option>
                <option value="professional">professional</option>
            </select>
            <br>
            <br>
            <label>upload a pictures that describes overview of your <br>Hostel/Mess:</label><br>
            <input class="form-text-input" name="messPic" type="file" accept="image/*" required>
            <br>
            <br>
        </div>
        <input id="submitMessForm" type="submit" value="SAVE">

    </form>
</section>

<?php require_once("footer.php"); }
else{
    header("location:homepage.php?pleaseLogIn");
}
?>
