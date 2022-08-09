<?php
session_start();
unset($_SESSION["userId"]);
unset($_SESSION["pass"]);
unset($_SESSION["start"]);
unset($_SESSION["expire"]);
header("location:homepage.php?logout");
?>