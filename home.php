<?php
$errors = array();
if (isset($_GET['errors'])) {
    $errors = json_decode($_GET['errors'], true);
}
$firstnameValue = isset($_GET['firstname']) ? $_GET['firstname'] : '';
$lastnameValue = isset($_GET['lastname']) ? $_GET['lastname'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="center-container">
 <div class="container">
    <form action="valid.php" method="post">
    <h2>Registration Form</h2>
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname"value="<?php echo $firstnameValue; ?>" >
        <?php if (isset($errors['firstname'])) { echo "<span class='error-message'>".$errors['firstname']."</span>"; }?><br>

        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname"value="<?php echo $lastnameValue; ?>" >
        <?php if(isset($errors['lastname'])) {echo "<span class='error-message'>". $errors['lastname']."</span>";}?><br>
        <br>
        
        <label for="address">Address:</label>
        <textarea name="address" rows="4" cols="50" required></textarea>
        <br><br>

        <label for="country">Country:</label>
        <select name="country" required>
            <option value="">Select Country</option>
            <option value="Egypt">Egypt</option>
            <option value="USA">USA</option>
            <option value="Canada">Canada</option>
        </select><br><br>

        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="male" required>Male
        <input type="radio" name="gender" value="female" required>Female<br><br>
        <?php if (isset($errors['firstname'])) { echo "<span class='error-message'>".$errors['gender']."</span>"; }?><br>

        <label for="skills">Skills:</label>
        <input type="checkbox" name="skills[]" value="HTML">HTML
        <input type="checkbox" name="skills[]" value="CSS">CSS
        <input type="checkbox" name="skills[]" value="JavaScript">JavaScript<br><br>

        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <label for="department">Department:</label>
        <input type="text" name="department" value="Information Systems" required><br><br>

        <input type="hidden" name="stored_captcha" value="AB12CD">
        <label for="captcha">CAPTCHA:</label><br>
        <span>AB12CD</span><br>
        <input type="text" name="captcha_input" required ><br><br>

        <input type="submit" name="submit" value="Submit" style="color: black;">
        <input type="reset" name="reset" value="Reset"style="color: black;">
        </form>
        </div>
    </div>
</body>
</html>
