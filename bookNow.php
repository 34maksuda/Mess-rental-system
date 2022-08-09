<?php
session_start();
require_once("header.php");
require_once("dbConnection.php");
?>

<body>
  <?php
  if(isset($_SESSION["userId"])){
    require_once("dbConnection.php");
    require_once("navbar.php");
    $currentUser=$_SESSION["userId"];
    $seatId = $_REQUEST["seatId"];
    $searchRoomId="SELECT seatRent,roomId FROM seatdetails12 WHERE seatId='$seatId'";
    $runSearchRoomId=mysqli_query($connection,$searchRoomId);
    if($runSearchRoomId==true){
      $row=mysqli_fetch_array($runSearchRoomId);
      $seatRent=$row["seatRent"]; 
      $roomId=$row["roomId"];
      $searchMessId="SELECT messId FROM roomdetails12 WHERE roomId='$roomId'";
      $runSearchMessId=mysqli_query($connection,$searchMessId);
      if($runSearchMessId==true){
        $roomRow=mysqli_fetch_array($runSearchMessId);
        $messId=$roomRow["messId"];
        $searchUserId="SELECT userId FROM messinfo12 WHERE messId='$messId'";
        $runSearchUserId=mysqli_query($connection,$searchUserId);
        if($runSearchUserId==true){
          $messRow=mysqli_fetch_array($runSearchUserId);
          $messOwnerId=$messRow["userId"];
          $searchMessOwner="SELECT * FROM registeredperson12 WHERE userId='$messOwnerId'";
          $runSearchMessOwner=mysqli_query($connection,$searchMessOwner);
          if($runSearchMessOwner==true){ 
            $messOwnerRow=mysqli_fetch_array($runSearchMessOwner);
            $NUserInfo = "SELECT * FROM registeredperson12 WHERE userId='$currentUser'" ;
            $runNUserInfo= mysqli_query($connection,$NUserInfo);
            if($runNUserInfo==true){
              $userDetails= mysqli_fetch_array($runNUserInfo); ?>
              <div class="row">
                <div class="col-md-3 messOwnerInfo">
                  <p class="mWInfo">using the following bKash number you send the seat Rent to the admin and then fill the form in the right side:</p>
                  <p>Seat Rent:<br><span><?php echo $seatRent." TK/per month";?></span></p>
                  <p>charge:<br><span><?php 
                  $TK= (($seatRent*40)/1000);
                  $total= $seatRent+$TK;
                  echo $TK." TK";?></span></p>
                  <p>You have to pay total:<span><?php  echo $total." TK";  ?></span></p>
                  <p>Bkash No:<br><span>01722839309</span></p>
                </div>
                <div class="col-md-6 container paymentDetails">
                  <form id="contactForm">
                    <div id="pFormHead">Give Your Info</div>
                    <div id="paymentWrong"></div>
                    <label>Enter Your name:</label><br>
                    <input type="text" class="form-text-input" name="userName" value='<?php echo $userDetails["firstName"]. " ". $userDetails["lastName"]; ?>' placeholder="contains letter(A-z,a-z) and digits(0-9) only"required=""><br>
                    <label>Enter Your email:</label><br>
                    <input type="email" class="form-text-input" name="userEmail" value='<?php echo $userDetails["email"]; ?>' placeholder="your email" required=""><br>
                    <label>choose your gender:</label><br>
                    <?php if($userDetails["gender"] == "Male"){ ?>
                      <input type="radio" name="gender" required="" value="Male" checked>Male
                      <input type="radio" name="gender" required="" value="Female">Female<br>
                    <?php }
                    else { ?>
                      <input type="radio" name="gender" required="" value="Male">Male
                      <input type="radio" name="gender" required="" value="Female" checked>Female<br>
                    <?php }?>
                    <label>Give here the transaction Id after paying for a seat:</label><br>
                    <input type="text" class="form-text-input" name="userTID" placeholder="trasaction id" required=""><br>
                    <label>Enter your contact number:</label><br>
                    <input type="text" class="form-text-input" name="userContact" id="contactNum12" placeholder="contact number" value='<?php echo "0".$userDetails["contactNumber"]; ?>' required=""><br><br>
                    <p class="errorContact"></p>
                    <input type="number" name="ownerPhn" value="<?php echo "0".$messOwnerRow["contactNumber"]; ?>" hidden>
                    <input type="text" name="seatId" value="<?php echo $seatId; ?>" hidden>
                    <input type="number" name="totalTk" value="<?php echo $total; ?>" hidden>
                    <input type="submit" value="Book Now" id="bookNow" name="bookNow">
                  </form>
                </div>
                <div class="col-md-3"></div>
              </div>
            <?php }
            else{
              echo "something wrong in current user query.";
            }
          }
          else{
            echo "mess owner details searching problem.";
          }
        }
        else{
          echo "mess table a userId khujate problem";
        }
      }
      else{
        echo "room table messId khuja te problem.";
      }
    }
    else{
      echo "seat table a roomId khuja te problem.";
    }
  }
  else{
    setcookie("notLogIn","asdf",time()+(30));
    header("location:index.php?notLogIn");
  }
  ?>