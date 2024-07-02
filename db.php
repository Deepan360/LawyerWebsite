<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "pass@123";
$dbname = "goldenrockadr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, you can set UTF-8 encoding for the connection
$conn->set_charset("utf8");

// Testing connection (optional)
if ($conn) {
    echo "Connected successfully";
} else {
    echo "Connection failed";
}
