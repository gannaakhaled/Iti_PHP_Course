<!DOCTYPE html>
<html>
<head>
    <title>Thanks</title>
</head>
<body>
    <?php
    if (isset($_POST['submit'])) {
        $user_captcha = $_POST['captcha_input'];

        if ($user_captcha === 'AB12CD') { 
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $skills = isset($_POST['skills']) ? implode(', ', $_POST['skills']) : 'None';
            $department = $_POST['department'];
            $title = ($gender === 'male') ? 'Mr' : 'Mrs';
    ?>
    <p>Thanks, <?php echo "$title $firstname $lastname"; ?><br><br></p>
    <p>Please review your information:<br><br></p>
    <p>Name: <?php echo "$firstname $lastname"; ?><br><br></p>
    <p>Address: <?php echo $address; ?><br><br></p>
    <p>Your skills: <?php echo $skills; ?><br><br></p>
    <p>Department: <?php echo $department; ?><br><br></p>
    <?php
        } else {
            echo "CAPTCHA verification failed. Please enter the correct code.";
        }
    }
    ?>
</body>
</html>
