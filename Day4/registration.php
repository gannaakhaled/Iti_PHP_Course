<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration Form</title>
  <link rel="stylesheet" type="text/css" href="regis.css?v=2">
</head>
<body>
    <nav> 
      <div class="logo">logo</div> 
      <ul class="nav-items"> 
          <li><a href="table.php">Customers</a></li>
          <li><a href="registration.php">Registration</a></li>
      </ul> 
    </nav> 
  <div class="container">
    <h2>User Registration Form</h2>
    <form action="registrationHandle.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span class="error" id="email_error"><?php echo isset($_SESSION['email_error']) ? $_SESSION['email_error'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <span class="error" id="password_error"><?php echo isset($_SESSION['password_error']) ? $_SESSION['password_error'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <span class="error" id="passwordd_error"><?php echo isset($_SESSION['passwordd_error']) ? $_SESSION['passwordd_error'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="room_number">Room Number:</label>
        <select class="app_input" id="room_number" name="room_number" required>
          <option value="Application1">Application1</option>
          <option value="Application2">Application2</option>
          <option value="Cloud">Cloud</option>
        </select>
      </div>
      <div class="form-group">
        <label for="profile_picture">Profile Picture:</label>
        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
        <span class="error"><?php echo isset($_SESSION['profile_picture_error']) ? $_SESSION['profile_picture_error'] : ''; ?></span>
      </div>
      <div class="form-group">
        <input type="submit" value="Register">
      </div>
    </form>
  </div>
</body>
</html>