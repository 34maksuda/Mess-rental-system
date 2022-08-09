<?php
session_start();
require_once("header.php");
?>

<body>
  <?php
  require_once("navbar.php");
  ?>
  <div class="container">
    <?php 
    require_once("forms.php");
    ?>
  </div>
  <section id="bg">
    <?php if(isset($_COOKIE["checkRegis"])){ ?>
      <span id="checkRegis">Registration successfull!</span>
      <?php 
      setcookie("checkRegis","qvgf", time() - (30));  }

      if(isset($_COOKIE["notLogIn"])){ ?>
        <span id="checkRegis">please Login first!</span>
        <?php 
        setcookie("notLogIn","sdfg",time()-(10));
      }
      if(isset($_COOKIE["upProfile"])) { ?>
        <span id="checkRegis">Your profile has been updated successfully!</span>
        <?php 
        setcookie("upProfile","asdfg",time()-(60));
      }
      ?>
      <h3>Find Your Perfect Room Here!</h3>
    </section>
    <div class="container serviceWrapper">
     <h3 id="service">OUR SERVICES</h3>
     <p class="text-justify">it's our Mess rental system web application.It will provide the information about room/mess which is available for rent.it will make easy to find the location of rooms/mess,select number of rooms and other facts by the renter.It will make easy to upload the location,contact no., expected rent,No. of rooms, facilities, and other information by the mess-master.this application will able to show the rooms/mess in a particular area selected by the user.</p>
   </div>
   <?php require_once("footer.php");?>