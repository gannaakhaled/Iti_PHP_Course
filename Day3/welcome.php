<?php
session_start();

if (!isset($_SESSION['user_data'])) {
  header("Location: login.php");
  exit();
}

$user_name = $_SESSION['user_data']['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Welcome, <?php echo $user_name; ?>!</h2>
    <p>You have successfully logged in.</p>
    <p>THANK YOU!</p>
    
  </div>
</body>
</html>
