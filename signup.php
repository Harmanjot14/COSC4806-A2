<?php

session_start();
require_once('user.php');
$result = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  if ($password != $confirm_password){
    $result = "Passwords do not match";
  }
  else{
    $user = new User();
    $result = $user->create_user($username, $password);
    if ($result == "Username and Password created successfully"){
      $_SESSION['failed_attempts'] = 0;
      echo '<p><a href = "/login.php"> Go back to login page</a></p>';
    }
  }
}
?>
  
<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
  </head>
  <body>  
    <h1>Sign Up</h1>
    <form method="post" action="signup.php">
      <label for="username">Username:</label>
      <br>
      <input type="text" id="username" name="username" required>
      <br>
      <label for="password">Password:</label>
      <br>
      <input type="password" id="password" name="password" required>
      <br>
      <label for="confirm_password">Confirm Password:</label>
      <br>
      <input type="password" id="confirm_password" name="confirm_password" required>
      <br><br>
      <input type="submit" value="Sign Up">
    </form>
    
    <?php if ($result): ?>
      <p><?php echo $result; ?></p>
    <?php endif;  ?> 
    
  </body>  
</html>