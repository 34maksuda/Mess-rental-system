<?php
session_start();
require_once("dbConnection.php");
require_once("header.php");
?>
<body>
  <?php
  require_once("navbar.php"); 
  if (isset($_COOKIE["notLogIn"])) { ?>
  <span id="notLogIn1">please log in first!</span>
  <?php 
  setcookie("notLogIn","sdfg",time()-(30)); }

  if (isset($_COOKIE["payRSuccess"])) { ?>
  <span id="paySuccess">Your request for booking a seat have been submitted!</span>
  <?php 
  setcookie("payRSuccess","plo",time()-(30)); }
  ?>
  <div class="container" id="products">
    <?php 
    require_once("forms.php");
    ?>
    <div class="container" id="products">
      <?php 
      require_once("forms.php");
      ?>
      <?php
      if(isset($_COOKIE["checkLogIn"])){ ?>
        <div id="checkLogIn">Logged in successfully.</div>
        <?php
        setcookie("checkLogIn","asdf",time()-(30));
      } 
      if (!isset($_REQUEST["search"])) { ?>
       <form name="searchForm" action="" method="POST">
        <div class="row pNav">
          <div class="col-md-2">
            <span>Our Products</span>
          </div>
          <div class="col-md-3">
            <label>Search by location:</label>
            <input type="text" name="searchBox1" placeholder="Search by location...">
          </div>
          <div class="col-md-3">
            <label>what is the mess type:</label><br>
            <select name="searchBox2">
              <option></option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
          <div class="col-md-3">
            <label>search by seat rent(in Tk):</label> <br>
            <select name="searchBox3">
              <option></option>
              <option>1-500</option>
              <option>500-1000</option>
              <option>1000-1500</option>
              <option>1500-2000</option>
              <option>2000-2500</option>
              <option>2500-3000</option>
              <option>3000-3500</option>
              <option>3500-4000</option>        
              <option>4000-4500</option>
              <option>4500-5000</option>
            </select>
          </div>
          <div class="col-md-1">
            <input type="submit" class="search90" name="search" value="Search">
          </div>
        </div>
      </form>
      <div class="checkMessMaster">
        <a href="messInfo.php">If you are a mess master,earn from here! </a>
      </div> 
      <?php
      $searchQuery="SELECT messinfo12.messId,messinfo12.userId,messinfo12.messName,messinfo12.messLocation,messinfo12.messType,
      roomdetails12.roomId,roomdetails12.roomNo,roomdetails12.roomLength,roomdetails12.roomWidth,
      roomdetails12.numOfSeat,roomdetails12.numOfCommonBath,roomdetails12.roomPic,seatdetails12.seatId,
      seatdetails12.seatNo,seatdetails12.seatRent,seatdetails12.seatStatus,seatdetails12.seatPic
      FROM
      messinfo12 JOIN roomdetails12
      ON messinfo12.messId = roomdetails12.messId
      JOIN seatdetails12
      ON roomdetails12.roomId = seatdetails12.roomId ORDER BY seatStatus,seatRent";
    }
    
    if(isset($_REQUEST["search"])){ ?>
      <form name="searchForm" action="" method="POST">
        <div class="row pNav">
          <div class="col-md-2">
            <span>Our Products</span>
          </div>
          <div class="col-md-3">
            <label>Search by location:</label>
            <input type="text" name="searchBox1" value='<?php echo $_REQUEST["searchBox1"]; ?>'  placeholder="Search by location...">
          </div>
          <div class="col-md-3">
            <label>what is the mess type:</label><br>
            <select name="searchBox2">
              <option selected><?php echo $_REQUEST["searchBox2"];?></option>
              <option></option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
          <div class="col-md-3">
            <label>search by seat rent(in Tk):</label> <br>
            <select name="searchBox3">
              <option selected><?php echo $_REQUEST["searchBox3"];?></option>
              <option></option>
              <option>1-500</option>
              <option>500-1000</option>
              <option>1000-1500</option>
              <option>1500-2000</option>
              <option>2000-2500</option>
              <option>2500-3000</option>
              <option>3000-3500</option>
              <option>3500-4000</option>        
              <option>4000-4500</option>
              <option>4500-5000</option>
            </select>
          </div>
          <div class="col-md-1">
            <input type="submit" class="search90" name="search" value="Search">
          </div>
        </div>
      </form>
      <div class="checkMessMaster">
        <a href="messInfo.php">If you are a mess master,earn from here! </a>
      </div>
      <?php
      if(!(empty($_REQUEST["searchBox1"])) && !(empty($_REQUEST["searchBox2"])) && !(empty($_REQUEST["searchBox3"]))){
        $searchV1 = $_REQUEST["searchBox1"];
        $searchV2 = $_REQUEST["searchBox2"];
        $searchV3 = $_REQUEST["searchBox3"];
        $seatRent = explode("-",$searchV3);
        $seatRent1 = $seatRent[0];
        $seatRent2 = $seatRent[1];
        $searchQuery="SELECT messinfo12.messId,messinfo12.userId,messinfo12.messName,messinfo12.messLocation,messinfo12.messType,
        roomdetails12.roomId,roomdetails12.roomNo,roomdetails12.roomLength,roomdetails12.roomWidth,
        roomdetails12.numOfSeat,roomdetails12.numOfCommonBath,roomdetails12.roomPic,seatdetails12.seatId,
        seatdetails12.seatNo,seatdetails12.seatRent,seatdetails12.seatStatus,seatdetails12.seatPic
        FROM
        messinfo12 JOIN roomdetails12
        ON messinfo12.messId = roomdetails12.messId
        JOIN seatdetails12
        ON roomdetails12.roomId = seatdetails12.roomId
        WHERE messinfo12.messLocation LIKE '%$searchV1%' AND messinfo12.messType = '$searchV2' AND seatdetails12.seatRent BETWEEN $seatRent1 AND $seatRent2 ORDER BY seatStatus,seatRent";
      }
      else if(!(empty($_REQUEST["searchBox1"])) && (empty($_REQUEST["searchBox2"])) && (empty($_REQUEST["searchBox3"]))){
        $searchV1 = $_REQUEST["searchBox1"];
        $searchQuery="SELECT messinfo12.messId,messinfo12.userId,messinfo12.messName,messinfo12.messLocation,messinfo12.messType,
        roomdetails12.roomId,roomdetails12.roomNo,roomdetails12.roomLength,roomdetails12.roomWidth,
        roomdetails12.numOfSeat,roomdetails12.numOfCommonBath,roomdetails12.roomPic,seatdetails12.seatId,
        seatdetails12.seatNo,seatdetails12.seatRent,seatdetails12.seatStatus,seatdetails12.seatPic
        FROM
        messinfo12 JOIN roomdetails12
        ON messinfo12.messId = roomdetails12.messId
        JOIN seatdetails12
        ON roomdetails12.roomId = seatdetails12.roomId
        WHERE messinfo12.messLocation LIKE '%$searchV1%' ORDER BY seatStatus,seatRent";

      }
      else if((empty($_REQUEST["searchBox1"])) && !(empty($_REQUEST["searchBox2"])) && (empty($_REQUEST["searchBox3"]))){
        $searchV2 = $_REQUEST["searchBox2"];
        $searchQuery="SELECT messinfo12.messId,messinfo12.userId,messinfo12.messName,messinfo12.messLocation,messinfo12.messType,
        roomdetails12.roomId,roomdetails12.roomNo,roomdetails12.roomLength,roomdetails12.roomWidth,
        roomdetails12.numOfSeat,roomdetails12.numOfCommonBath,roomdetails12.roomPic,seatdetails12.seatId,
        seatdetails12.seatNo,seatdetails12.seatRent,seatdetails12.seatStatus,seatdetails12.seatPic
        FROM
        messinfo12 JOIN roomdetails12
        ON messinfo12.messId = roomdetails12.messId
        JOIN seatdetails12
        ON roomdetails12.roomId = seatdetails12.roomId
        WHERE messinfo12.messType = '$searchV2' ORDER BY seatStatus,seatRent";


      }
      else if((empty($_REQUEST["searchBox1"])) && (empty($_REQUEST["searchBox2"])) && !(empty($_REQUEST["searchBox3"]))){
        $searchV3 = $_REQUEST["searchBox3"];
        $seatRent = explode("-",$searchV3);
        $seatRent1 = $seatRent[0];
        $seatRent2 = $seatRent[1];
        $searchQuery="SELECT messinfo12.messId,messinfo12.userId,messinfo12.messName,messinfo12.messLocation,messinfo12.messType,
        roomdetails12.roomId,roomdetails12.roomNo,roomdetails12.roomLength,roomdetails12.roomWidth,
        roomdetails12.numOfSeat,roomdetails12.numOfCommonBath,roomdetails12.roomPic,seatdetails12.seatId,
        seatdetails12.seatNo,seatdetails12.seatRent,seatdetails12.seatStatus,seatdetails12.seatPic
        FROM
        messinfo12 JOIN roomdetails12
        ON messinfo12.messId = roomdetails12.messId
        JOIN seatdetails12
        ON roomdetails12.roomId = seatdetails12.roomId
        WHERE seatdetails12.seatRent BETWEEN $seatRent1 AND $seatRent2 ORDER BY seatStatus,seatRent";


      }
      else if(!(empty($_REQUEST["searchBox1"])) && !(empty($_REQUEST["searchBox2"])) && (empty($_REQUEST["searchBox3"]))){
        $searchV1 = $_REQUEST["searchBox1"];
        $searchV2 = $_REQUEST["searchBox2"];
        $searchQuery="SELECT messinfo12.messId,messinfo12.userId,messinfo12.messName,messinfo12.messLocation,messinfo12.messType,
        roomdetails12.roomId,roomdetails12.roomNo,roomdetails12.roomLength,roomdetails12.roomWidth,
        roomdetails12.numOfSeat,roomdetails12.numOfCommonBath,roomdetails12.roomPic,seatdetails12.seatId,
        seatdetails12.seatNo,seatdetails12.seatRent,seatdetails12.seatStatus,seatdetails12.seatPic
        FROM
        messinfo12 JOIN roomdetails12
        ON messinfo12.messId = roomdetails12.messId
        JOIN seatdetails12
        ON roomdetails12.roomId = seatdetails12.roomId
        WHERE messinfo12.messLocation LIKE '%$searchV1%' AND messinfo12.messType = '$searchV2' ORDER BY seatStatus,seatRent";

      }
      else if(!(empty($_REQUEST["searchBox1"])) && (empty($_REQUEST["searchBox2"])) && !(empty($_REQUEST["searchBox3"]))){
        $searchV1 = $_REQUEST["searchBox1"];
        $searchV3 = $_REQUEST["searchBox3"];
        $seatRent = explode("-",$searchV3);
        $seatRent1 = $seatRent[0];
        $seatRent2 = $seatRent[1];
        $searchQuery="SELECT messinfo12.messId,messinfo12.userId,messinfo12.messName,messinfo12.messLocation,messinfo12.messType,
        roomdetails12.roomId,roomdetails12.roomNo,roomdetails12.roomLength,roomdetails12.roomWidth,
        roomdetails12.numOfSeat,roomdetails12.numOfCommonBath,roomdetails12.roomPic,seatdetails12.seatId,
        seatdetails12.seatNo,seatdetails12.seatRent,seatdetails12.seatStatus,seatdetails12.seatPic
        FROM
        messinfo12 JOIN roomdetails12
        ON messinfo12.messId = roomdetails12.messId
        JOIN seatdetails12
        ON roomdetails12.roomId = seatdetails12.roomId
        WHERE messinfo12.messLocation LIKE '%$searchV1%' AND seatdetails12.seatRent BETWEEN $seatRent1 AND $seatRent2 ORDER BY seatStatus,seatRent";

      }
      else if((empty($_REQUEST["searchBox1"])) && !(empty($_REQUEST["searchBox2"])) && !(empty($_REQUEST["searchBox3"]))){
        $searchV2 = $_REQUEST["searchBox2"];
        $searchV3 = $_REQUEST["searchBox3"];
        $seatRent = explode("-",$searchV3);
        $seatRent1 = $seatRent[0];
        $seatRent2 = $seatRent[1];
        $searchQuery="SELECT messinfo12.messId,messinfo12.userId,messinfo12.messName,messinfo12.messLocation,messinfo12.messType,
        roomdetails12.roomId,roomdetails12.roomNo,roomdetails12.roomLength,roomdetails12.roomWidth,
        roomdetails12.numOfSeat,roomdetails12.numOfCommonBath,roomdetails12.roomPic,seatdetails12.seatId,
        seatdetails12.seatNo,seatdetails12.seatRent,seatdetails12.seatStatus,seatdetails12.seatPic
        FROM
        messinfo12 JOIN roomdetails12
        ON messinfo12.messId = roomdetails12.messId
        JOIN seatdetails12
        ON roomdetails12.roomId = seatdetails12.roomId
        WHERE messinfo12.messType = '$searchV2' AND seatdetails12.seatRent BETWEEN $seatRent1 AND $seatRent2 ORDER BY seatStatus,seatRent";

      }
      else{
        $searchQuery="SELECT messinfo12.messId,messinfo12.userId,messinfo12.messName,messinfo12.messLocation,messinfo12.messType,
        roomdetails12.roomId,roomdetails12.roomNo,roomdetails12.roomLength,roomdetails12.roomWidth,
        roomdetails12.numOfSeat,roomdetails12.numOfCommonBath,roomdetails12.roomPic,seatdetails12.seatId,
        seatdetails12.seatNo,seatdetails12.seatRent,seatdetails12.seatStatus,seatdetails12.seatPic
        FROM
        messinfo12 JOIN roomdetails12
        ON messinfo12.messId = roomdetails12.messId
        JOIN seatdetails12
        ON roomdetails12.roomId = seatdetails12.roomId ORDER BY seatStatus,seatRent";
      }

    }

    $runSearchQuery = mysqli_query($connection,$searchQuery);
    if($runSearchQuery == true){ ?>
      <?php 
      $numRows=mysqli_num_rows($runSearchQuery);
      if($numRows > 0){
        while ($searchAll = mysqli_fetch_array($runSearchQuery)) { ?>
          <div id="seatInfoWrapper">
            <div class="row">
              <div class="col-md-3">
               <?php 
               $seatPic = $searchAll["seatPic"];
               $seatImg=explode(',', $seatPic);
               $roomId=$searchAll["roomId"];
               ?>
               <div id="seatPic">
                <img src="roomPictures/<?php echo "$seatImg[1]";?>">
              </div>
            </div>
            <div class="col-md-3">
              <?php 
              $roomPic=$searchAll["roomPic"];
              $roomImg=explode(',',$roomPic); ?>
              <div id="roomPic">
               <img src="roomPictures/<?php echo "$roomImg[1]";?>">
             </div>
           </div>
           <div class="col-md-5" id="details4">
            <?php 
            $messId=$searchAll["messId"];
            $messOwner = $searchAll["userId"];
            $roomSize = $searchAll["roomLength"] * $searchAll["roomWidth"] ?>
            <span id="roomSize"><?php echo $roomSize." Sqft Room for rent(".$searchAll["messType"]." mess)" ?></span>

            <span id="location"><br><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $searchAll["messLocation"]; ?></span>
            <li id="detailsList">
              <ul id="sqftSize">
                <i class="fa fa-arrows-alt"></i><?php echo " ".$roomSize . " sqft"; ?>
              </ul>
              <ul>
                <i class="fa fa-bed" aria-hidden="true"></i><?php echo " ".$searchAll["numOfSeat"]." seats" ;?>
              </ul>
              <ul><i class="fa fa-bath" aria-hidden="true"></i><?php  echo " ".$searchAll["numOfCommonBath"]." common baths";?></ul>
            </li>
            <span class="RSN">mess Name:<?php echo " ".$searchAll["messName"]; ?></span>
            <span class="RSN">Room No:<?php echo " ".$searchAll["roomNo"]; ?></span>
            <span class="RSN">Seat No:<?php echo " ".$searchAll["seatNo"] ?></span>
            <div id="booking">
              <span id="seatStatus"><?php echo "Booking status: ".$searchAll["seatStatus"]?></span>
              <span id="rent"><?php echo " BDT ".$searchAll["seatRent"]." TK/month"?></span>
            </div>
            <?php
            if($searchAll["seatStatus"]=="vacant") {
             ?>
            <a href="bookNow.php?seatId=<?php echo $searchAll["seatId"]; ?>" class="btn" id="bookNow">Book Now</a>
            <?php } ?>
            <a href="productDetails.php?seatId=<?php echo $searchAll["seatId"]; ?>" class="btn" id="detailBtn">Detail</a>
          </div>
        </div>
      </div>
    <?php  }
  }
  else{ ?>

    <div id="noMatch">No matching Result</div>
  <?php }
}

else{
  echo "wrong";
}

?>
</div>
</div>

<?php require_once("footer.php");?>
