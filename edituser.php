<?php

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $filename = 'data.txt';
    if (file_exists($filename)) {
        $fileData = file($filename);
        $userData = null;
        foreach ($fileData as $index => $line) {
            $row = explode(',', $line);
            if ($row[0] === $username) {
                $userData = $row;
                break;
            }
        }
        if (!$userData) {
            echo "Username not found.";
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                $userData[0] = $_POST['firstname'];  
                $userData[1] = $_POST['lastname'];   
                $userData[2] = $_POST['address'];    
                $userData[3] = $_POST['country'];    
                $updatedUserData = implode(',', $userData);
                $fileData[$index] = $updatedUserData . "\n";
                file_put_contents($filename, implode('', $fileData));          
                header("Location: table.php");
                exit();
            }
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Edit User</title>
            </head>
            <body>
                <h2>Edit User Data</h2>
                <form action="" method="post">
                    <input type="hidden" name="username" value="<?php echo $userData[0]; ?>">
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" value="<?php echo $userData[1]; ?>" required><br>
                    <br>
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" value="<?php echo $userData[2]; ?>" required><br>
                    <br>
                    <label for="address">Address:</label>
                    <input type="text" name="address" value="<?php echo $userData[3]; ?>" required><br>
                    <br>
                    <label for="country">Country:</label>
                    <select name="country" required>
                        <option value="">Select Country</option>
                        <option value="Egypt" <?php if ($userData[4] === 'Egypt') echo 'selected'; ?>>Egypt</option>
                        <option value="USA" <?php if ($userData[4] === 'USA') echo 'selected'; ?>>USA</option>
                        <option value="Canada" <?php if ($userData[4] === 'Canada') echo 'selected'; ?>>Canada</option>
                    </select><br><br>
                    <input type="submit" name="submit" value="Update">
                </form>
            </body>
            </html>
            <?php
        }
    }
}
?>
