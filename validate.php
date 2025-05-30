<?php

session_start();
require_once('user.php');


$username = $_POST['username'];
$password = $_POST['password'];

$user = new User();
$user_info = $user->get_user($username);
if ($user_info && password_verify($password, $user_info['password'])){
  $_SESSION['authenticated'] = 1;
  $_SESSION['username'] = $username;
  header('Location: /');
  exit();
}
else{
  if(!isset($_SESSION['failed_attempts'])){
    $_SESSION['failed_attempts'] = 1;
  }
  else{
    $_SESSION['failed_attempts'] = $_SESSION['failed_attempts'] + 1;
  }
  header('Location: /login.php');
  exit();
}

?>