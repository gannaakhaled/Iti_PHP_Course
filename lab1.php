<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="next.php" method="post">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" required><br><br>

        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" required><br><br>

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
        <input type="text" name="captcha_input" required><br><br>

        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>
</body>
</html>
