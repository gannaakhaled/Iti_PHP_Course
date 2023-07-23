<?php
session_start();

$email_error = '';
$password_error = '';
$passwordd_error = '';
$profile_picture_error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  $room_number = $_POST["room_number"];

  // Validate email filter_var function
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_error = "Invalid email format.";
  }

  // Validate email regular expression
  if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
    $email_error = "Invalid email format.";
  }


  if (strlen($password) < 8) {
    $password_error = "Password must be at least 8 characters long.";
  }

  if (!preg_match('/^[a-z0-9_]+$/', $password)) {
    $password_error = "Password can only contain lowercase letters, digits, and underscore.";
  }

  if ($password !== $confirm_password) {
    $passwordd_error = "Passwords do not match.";
  }


  if ($_FILES["profile_picture"]["error"] === 0) {
    $allowed = ["image/jpeg", "image/png"];
    if (in_array($_FILES["profile_picture"]["type"], $allowed)) {
      $profile_picture_path = "profile_pictures/" . $_FILES["profile_picture"]["name"];
      move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profile_picture_path);
    } else {
      $profile_picture_error = "Invalid image format. Only JPEG and PNG files are allowed.";
    }
  }

  $user_data = [
    "name" => $name,
    "email" => $email,
    "password" => password_hash($password, PASSWORD_DEFAULT), // Hash the password before storing
    "room_number" => $room_number,
    "profile_picture" => $profile_picture_path
  ];
  file_put_contents('users.txt', implode('|', $user_data) . PHP_EOL, FILE_APPEND);


  // Store error messages in session 
  $_SESSION['email_error'] = $email_error;
  $_SESSION['password_error'] = $password_error;
  $_SESSION['passwordd_error'] = $password_error;
  $_SESSION['profile_picture_error'] = $profile_picture_error;

  header("Location: form.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>User Registration Form</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" >
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
        <select id="room_number" name="room_number" required>
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
        <button type="submit">Register</button>
      </div>
    </form>
  </div>
</body>
</html>
