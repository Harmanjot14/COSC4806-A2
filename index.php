<?php
session_start();
$_SESSION['failed_attempts'] = 0;
if(isset($_SESSION['authenticated'])){
  echo "Welcome, " . $_SESSION['username'] . "!";
  echo "<p><a href = 'logout.php'>Logout</a></p>";
}

require_once('user.php');

$user = new User();
$user_list = $user->get_all_users();

echo "<pre>";
print_r($user_list);

?>
<p><a href = "login.php">Login Page</a></p>