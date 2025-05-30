<?php

session_start();

//if failed attempt than displaying it at login page
if(isset($_SESSION['failed_attempts'])){
  echo "This is unsuccessful attempt number ". $_SESSION['failed_attempts'];
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>

  <body>

    <h1>Login Forum</h1>
    <form action="/validate.php" method="post">
      <label for="username">Username:</label>
      <br>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label>
      <br>
      <input type="password" id="password" name="password">
      <br><br>
      <input type="submit" value="Submit">
      </form>

      <p>Create account here <a href="/signup.php">Sign up</a></p>


  </body>

</html>