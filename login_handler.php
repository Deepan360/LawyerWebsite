<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
<<<<<<< HEAD

session_start();
require 'db.php';
=======
<<<<<<< HEAD

session_start();
require 'db.php';
=======
session_start();

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
>>>>>>> 900c65a6ff53030b975a68bc27d2fa361d566fc3
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $stored_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if ($password === $stored_password) {      
            $_SESSION["user_id"] = $id;
            $_SESSION["loggedin"] = true;
            header("Location: blogupload.html");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that email.";
    }

    $stmt->close();
}

$conn->close();
?>

<<<<<<< HEAD
=======
=======
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            header("Location: blogupload.html");
            exit;
        } else {
            header("Location: index.php?error=InvalidCredentials");
            exit;
        }
    } else {
        header("Location: index.php?error=UserNotFound");
        exit;
    }
} else {
    header("Location: index.php?error=MethodNotAllowed");
    exit;
}
>>>>>>> 900c65a6ff53030b975a68bc27d2fa361d566fc3
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
