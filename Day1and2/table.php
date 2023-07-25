<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <div class="table">
        <h2>Registered Users</h2>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Country</th>
                <th>Gender</th>
                <th>Skills</th>
                <th>Department</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $filename = 'data.txt';
            if (file_exists($filename)) {
                $fileData = file($filename);
                foreach ($fileData as $index => $line) {
                    $formData = explode(',', $line);
                    echo "<tr>";
                    foreach ($formData as $field) {
                        echo "<td>" . htmlspecialchars($field) . "</td>";
                    }
            
                    // first element-> username
                    $username = urlencode($formData[0]);
                    echo '<td><a class="btn btn-blue" href="edituser.php?username=' . $username . '">Edit</a></td>';
                    echo '<td>
                            <form action="deleteuser.php" method="get">
                                <input type="hidden" name="username" value="' . $formData[0] . '">
                                <input type="submit" class="btn btn-red" value="Delete">
                            </form>
                        </td>';

            
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</body>
</html>
