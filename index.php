<?php

require_once('user.php');

$user = new User();
$user_list = $user->get_all_users();

echo "<pre>";
print_r($user_list);

?>
<p><a href = "login.php">Login Page</a></p>