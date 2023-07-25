<?php
    class db{
        function __construct(){}
        public function connect($dbname){
            $servername = "localhost:4306";
            $username = "root";
            $password = "";
            $conn = mysqli_connect($servername, $username, $password);
            $result = mysqli_query($conn, "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");
            if (mysqli_num_rows($result) == 0) {
                $sql = "CREATE DATABASE $dbname";
                mysqli_query($conn, $sql);
            }
            mysqli_select_db($conn, $dbname);
            return $conn;
        
            
        } 
        public function insert($conn, $table_name, $user_data){
            $table_name = "customers";
            $result = mysqli_query($conn, "SHOW TABLES LIKE '$table_name'");
            if (mysqli_num_rows($result) == 0) {
                $sql = "CREATE TABLE $table_name (
                    id INT(128) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(255),
                    email VARCHAR(255) unique,
                    password VARCHAR(255),
                    roomNumber VARCHAR(255),
                    picture VARCHAR(255)
                )";
                mysqli_query($conn, $sql);
            }

            $query = "SELECT * FROM customers WHERE email='" . $user_data['email'] . "'";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                die("Error executing query: " . mysqli_error($conn));
            }
            
            if(mysqli_fetch_assoc($result) == NULL){
                    $sql = "INSERT INTO $table_name (name, email, password, roomNumber, picture)
                    VALUES ('$user_data[name]', '$user_data[email]', '$user_data[password]', '$user_data[roomNumber]', '$user_data[profile_picture]')";
                    $conn->query($sql);
                    header("location:table.php");
            }
            else{
                header("location:registration.php");
            }
        }

        public function edit($conn, $tname, $id, $name, $email, $roomNumber, $picture){
            $sql = "SELECT * FROM $tname WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $sql = "UPDATE $tname SET name='$name', email='$email', roomNumber='$roomNumber', picture='$picture' WHERE id=$id";
            if (mysqli_query($conn, $sql)) {
                header("location:table.php");
            }
        }

        
        public function delete($conn, $tname, $id){
            $sql = "DELETE FROM $tname WHERE id = $id";
            (mysqli_query($conn, $sql));
            mysqli_close($conn);
            header("location:table.php");
        }


    }

?>