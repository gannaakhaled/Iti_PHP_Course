<?php
session_start();

include("db.php");
$validationFlag = true;
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
    $validationFlag = false;
  }
  // Validate email regular expression
  if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
    $email_error = "Invalid email format.";
    $validationFlag = false;
  }
  if (strlen($password) < 8) {
    $password_error = "Password must be at least 8 characters long.";
    $validationFlag = false;
  }
  if (!preg_match('/^[a-z0-9_]+$/', $password)) {
    $password_error = "Password can only contain lowercase letters, digits, and underscore.";
    $validationFlag = false;
  }
  if ($password !== $confirm_password) {
    $passwordd_error = "Passwords do not match.";
    $validationFlag = false;
  }
  if ($_FILES["profile_picture"]["error"] === 0) {
    $allowed = ["image/jpeg", "image/png"];
    if (in_array($_FILES["profile_picture"]["type"], $allowed)) {
      $profile_picture_path = "profile_pictures/" . $_FILES["profile_picture"]["name"];
      //move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profile_picture_path);
    } else {
      $profile_picture_error = "Invalid image format. Only JPEG and PNG files are allowed.";
      $validationFlag = false;
    }
  }
  $user_data = [
    "name" => $name,
    "email" => $email,
    "password" => password_hash($password, PASSWORD_DEFAULT),
    "roomNumber" => $room_number,
    "profile_picture" => $profile_picture_path
  ];
  $data_info = implode(":", $user_data);
    $_SESSION['email_error'] = $email_error;
    $_SESSION['password_error'] = $password_error;
    $_SESSION['passwordd_error'] = $password_error;
    $_SESSION['profile_picture_error'] = $profile_picture_error;

  if($validationFlag == true){
    setcookie("user_data", $data_info);
    $dbconn = new db();
    $conn = $dbconn->connect("Iti_Course_DB");
    $dbconn->insert($conn, "customers", $user_data);
    exit();
  }
  else{
    
    header("Location: registration.php");

  }
  exit();
}
?>