<?php

$errors = array();

if (isset($_POST['submit']))
{
if (!isset($_POST['firstname']) or empty($_POST['firstname'])){
    $errors['firstname'] = "Please enter your first name.";
    }
    
    if (!isset($_POST['lastname']) or empty($_POST['lastname'])){
        $errors['lastname'] = "Please enter your last name.";
        }
    
    if(!isset($_POST['gender']) or empty($_POST['gender'])) {
    $errors['gender'] = "Please select your gender.";
    }
}
if (empty($errors)) {
    // No errors, process the form data
    $user_captcha = $_POST['captcha_input'];

    if ($user_captcha === 'AB12CD') {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        $gender = $_POST['gender'];
        $skills = isset($_POST['skills']) ? implode(', ', $_POST['skills']) : '';
        $department = $_POST['department'];
        $title = ($gender === 'male') ? 'Mr' : 'Mrs';

        $filename = 'data.txt';
        $dataString = "$firstname,$lastname,$address,$country,$gender,$skills,$department\n";

        $fileHandle = fopen($filename, 'a');
        fwrite($fileHandle, $dataString);
        fclose($fileHandle);

        // Redirect to the table page
        header("Location: table.php");
        exit();
    }
} else {
    // Errors 
    $formerrors = json_encode($errors);
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    header("Location: home.php?errors=$formerrors&firstname=$firstname&lastname=$lastname");
    exit();
}
?>