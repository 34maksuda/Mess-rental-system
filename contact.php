<?php
session_start();
require_once("header.php");
?>

<body>
  <?php
  require_once("navbar.php");
  if(isset($_SESSION["userId"])){
  ?>
  <div class="container messOwnerInfo">
  		<p>you will be able to contact with us following the given information:</p>
  		<span class="sSpan">contact number:</span><span>01766389076</span>
  		<br><span class="sSpan">Email:</span><span>varate234@gmail.com</span>
  </div>
<?php }
else{
  setcookie("notLogIn","asdf",time()+(30));
  header("location:homepage.php?notLogIn");
}