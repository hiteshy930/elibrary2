<link rel="stylesheet" href="../google_signup/password.css">
<?php
      echo '
      <div class="password_form">
        <h2> Create password for this website </h2><br>
        <form action="../google_signup/google_signup.php" method="post">
        <div class="pass_form_div">
            Password : <input type="password" name="password" value="" placeholder="Enter your password" required>
        </div>
        <div class="pass_form_div">
          <label>  Confirm:</label>&emsp13; &emsp13; <input type="password" name="conpass" value="" placeholder="Re-Enter your password" required>
        </div>

        <div id="submit_password">
          <input type="submit" name="signup_password" value="Submit Password">
      </div>
        </form>
      </div>
      ';



 ?>
