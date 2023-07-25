<?php
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $filename = 'data.txt';
    if (file_exists($filename)) {
        $fileData = file($filename);
        foreach ($fileData as $index => $line) {
            $userData = explode(',', $line);
            if ($userData[0] === $username) {
                unset($fileData[$index]);
                //save the data back to the file
                file_put_contents($filename, implode('', $fileData));
                header("Location: table.php");
                exit();
            }
        }
        echo "Username not found.";
    }
}
?>
