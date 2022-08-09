<form onsubmit="return false" class="form loginForm">
  <div class="heading">
    <h4>Login Form</h4>
  </div>
  <div id="invalidLogin"></div>
  <input class="input mt-3" type="email" id="email_addr" placeholder="your email address" required>
  <br>
  <br>
  <input class="input" type="password" id="password" placeholder="password" required>
  <br>
  <br>
  <input class="loginButton" type="submit" id="login" value="Login">
  <br>
  <br>
  <a id="choice" class="Register" href="#">Not have an account?Register</a>
</form>
<form class="form registerForm">
  <div class="heading">
    <h4>Registration Form</h4>
  </div>
  <div id="formWrgSbmssn"></div>
  <input class="input mt-3" type="text" name="fname" placeholder="First Name (only A-Z,a-z,0-9)" required>
  <br>
  <br>
  <input class="input" type="text" name="lname" placeholder="Last Name(only A-Z,a-z,0-9)" required>
  <br>
  <br>
  <input class="input" type="email" name="email" placeholder="Email address" required>
  <br>
  <br>
  <input class="input" type="password" name="pwd" id="pwd" placeholder="password" required>
  <span class="errorpwd"></span>
  <br>
  <br>
  <span id="gender">Gender:</span>
  <input type="radio" name="gender" value="Male" required>Male
  <input type="radio" name="gender" value="Female" required>Female
  <br>
  <br>
  <input class="input" type="tel" name="phone" id="phone" placeholder="Contact number in 0**********" required>
  <span class="errorphonenum"></span>
  <br>
  <br>
  <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
  <input class="loginButton" type="submit" id="register" value="REGISTER">
  <br>
  <br>
  <a id="choice" class="login" href="#">already registered?Login</a>
</form>