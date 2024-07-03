<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
<<<<<<< HEAD
$password = "pass@123"; // Replace with your actual 
$dbname = "goldenrockadr";
$port = 3306;
=======
$password = "pass@123";
$dbname = "goldenrockadr";
>>>>>>> 900c65a6ff53030b975a68bc27d2fa361d566fc3

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, you can set UTF-8 encoding for the connection
$conn->set_charset("utf8");

<<<<<<< HEAD
// Now you can use $conn for your database operations
?>
=======
// Testing connection (optional)
if ($conn) {
    echo "Connected successfully";
} else {
    echo "Connection failed";
}
>>>>>>> 900c65a6ff53030b975a68bc27d2fa361d566fc3
