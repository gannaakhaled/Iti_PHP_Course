<?php
    include("db.php");
    if($_GET['id']){
        $id = $_GET['id'];
    }else{
        header("location:table.php");
    }
    
    $dbconn = new db();
    $conn = $dbconn->connect("Iti_Course_DB");

    $dbconn->delete($conn, "customers", $id);

?>