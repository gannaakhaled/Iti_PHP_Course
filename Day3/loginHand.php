<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
  $username = $_POST["username"];
  $password = $_POST["password"];

  //read from "users" file
  $users = file('users.txt');

  foreach ($users as $user) {
    $user_data = json_decode(trim($user), true);
    if ($user_data && $user_data['name'] === $username && password_verify($password, $user_data['password'])) {
      // store user in the session
      $_SESSION['user_data'] = $user_data;
      header("Location: welcome.php");      
      exit();
    }
  }

  $_SESSION['login_error'] = "Invalid username or password.";
  header("Location: login.php");
  exit();
}
?>
