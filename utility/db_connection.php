<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "hms";

    # Createing Connection to DB
    $conn = mysqli_connect($host, $username, $password, $db_name);
    if (!$conn) {
        die("Connection Faild.");
    }
    
    date_default_timezone_set('Asia/Dhaka');
?>