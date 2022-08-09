<nav id="navbar" class="navbar navbar-expand-md fixed-top">
  <div class="container">
    <a id="websiteName" class="navbar-brand" href="homepage.php"><img src="css/images/logo.png"></a>
    <?php
    if(isset($_SESSION["userId"])){ ?>
      <a  id="logoutButton" href="logout_core.php">Logout</a>
    <?php } 
    else{ ?>
      <a  id="loginButton" href="#">Login</a>
    <?php } ?>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="homepage.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
    </ul>
  </div>
</nav>