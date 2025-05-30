<?php

session_start();
require_once('user.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $user = new User();
  $result = $user->create_user($username, $password);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
  </head>
  <body>  
    <h1>Sign Up</h1>
    <form method="post" action="sign up.php">
      <label for="username">Username:</label>
      <br>
      <input type="text" id="username" name="username" required>
      <br>
      <label for="password">Password:</label>
      <br>
      <input type="password" id="password" name="password" required>
      <br><br>
      <input type="submit" value="Sign Up">
    </form>
    
    <?php if (isset($result)): ?>
      <p><?php echo $result; ?></p>
    <?php endif;  ?> 
    
  </body>  
</html>