<?php
    $user_id = $_GET["id"];
            $servername = "localhost:4306";
            $username = "root";
            $password = "";
            $dbname = "Iti_Course_DB";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

    $sql = "DELETE FROM customers WHERE id = $user_id";
    (mysqli_query($conn, $sql));
    mysqli_close($conn);

    header("location:table.php");


    
?>