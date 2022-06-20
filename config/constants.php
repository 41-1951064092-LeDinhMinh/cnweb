<?php 
    //Start Session
    session_start();
    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/baitaplon/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'ql_tour_dulich');

    $conn = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    //$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
    //$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database
?>

