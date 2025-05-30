<?php

  require_once('database.php');

  Class User{
    public function get_all_users(){
      $db = db_connect();
      $statement = $db->prepare("select * from users;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

    /* get user by username */
    public function get_user($username){
      $db = db_connect();
      $statement = $db->prepare("select * from users where username = :username;");
      $statement->execute(['username' => $username]);
      $rows = $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create_user($username, $password){
      $db = db_connect();
      /*to check if username already exists*/
      $statement = $db->prepare("select * from users where username = :username;");
      $statement->execute(['username' => $username]);
      $rows = $statement->fetch(PDO::FETCH_ASSOC);
      if ($rows){
        return "Username already exists";
      }
      /*validate password is at least 10 characters*/
      if (strlen($password) < 10 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password))
        return "Password must be at least 10 characters, contain at least one uppercase letter and one lowercase letter";

      /*hashed password*/
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
      /*create a new user*/
      $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password);");
      $statement->execute(['username' => $username, 'password' => $hashedPassword]);
      return "Username and Password created successfully";
    }
  }


?>