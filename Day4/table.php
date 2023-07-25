<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
<nav> 
    <div class="logo">logo</div> 
    <ul class="nav-items"> 
        <li><a href="table.php">Customers</a></li>
        <li><a href="registration.php">Registration</a></li>
    </ul> 
  </nav> 
<table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Room Number</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            $servername = "localhost:4306";
            $username = "root";
            $password = "";
            $dbname = "Iti_Course_DB";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM customers";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Error: " . mysqli_error($conn));
            }
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_close($conn);



            foreach ($rows as $row) {
                echo "<tr>";
                
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";  
                echo "<td>" . $row["roomNumber"] . "</td>";    
                echo "<td><a href='edit.php?id=" . $row["id"] . "'><button class='editButton'>Edit</button></a></td>";
                echo "<td><a href='delete.php?id=" . $row["id"] . "'><button class='deleteButton'>Delete</button></a></td>";
                echo "</tr>";
            }

            if(count($rows) == 0){
                header("location:registration.php"); 
            }
        ?>
    </table>
</body>
</html>