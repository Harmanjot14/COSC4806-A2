<?php

session_start();

$valid_username = 'Harman';
$valid_password = '12345password';

$username = $_REQUEST['username'];
$_SESSION['username'] = $username; 
$password = $_REQUEST['password'];

if($valid_username == $username && $valid_password == $password){
  $_SESSION['authenticated'] = 1;
  header('Location: /');
}
else{
  if(!isset($_SESSION['failed_attempts'])){
    $_SESSION['failed_attempts'] = 1;
  }
  else{
    $_SESSION['failed_attempts'] = $_SESSION['failed_attempts'] + 1;
  }
  //header to redirect to login.php
  header('Location: /login.php');
  //echo "This is unsuccessful attempt number " . $_SESSION['failed_attempts'] no need here 
}


?>