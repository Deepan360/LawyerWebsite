<?php
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
require_once 'db.php'; 

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input data from the POST request
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $spotify_link = $_POST['spotify_link'] ?? '';

    // Validate input data (basic validation)
    if (empty($title) || empty($content)) {
        $response = [
            'success' => false,
            'message' => 'Title and Content are required.'
        ];
    } else {
        // Prepare the SQL statement
        $insert_query = "INSERT INTO blogs (title, content, spotify_link, created_at, active) VALUES (?, ?, ?, NOW(), 1)";

        $stmt = mysqli_prepare($conn, $insert_query);
        
        if ($stmt) {
            // Bind parameters to the SQL statement
            mysqli_stmt_bind_param($stmt, "sss", $title, $content, $spotify_link);

            // Execute the statement and check if it was successful
            if (mysqli_stmt_execute($stmt)) {
                $response = [
                    'success' => true,
                    'message' => 'Blog uploaded successfully!'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Error executing statement: ' . mysqli_stmt_error($stmt)
                ];
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            $response = [
                'success' => false,
                'message' => 'Prepare statement error: ' . mysqli_error($conn)
            ];
        }
    }

    // Close the database connection
    mysqli_close($conn);

    // Set the content type to JSON and output the response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Ensure script execution stops after sending response
}
<<<<<<< HEAD
?>
=======
?>
=======
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Include database connection
require_once 'db.php';

// Initialize variables for form submission
$title = $content = $spotify_link = '';
$errors = [];

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $spotify_link = mysqli_real_escape_string($conn, $_POST['spotify_link']);

    // Basic validation example, customize as per your needs
    if (empty($title)) {
        $errors[] = "Title is required";
    }
    if (empty($content)) {
        $errors[] = "Content is required";
    }

    // If no errors, proceed with inserting into database
    if (empty($errors)) {
        // Prepare SQL statement to prevent SQL injection
        $user_id = $_SESSION['user_id'];
        $insert_query = "INSERT INTO blogs (user_id, title, content, spotify_link, created_at, active) VALUES (?, ?, ?, ?, NOW(), 1)";

        $stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($stmt, "isss", $user_id, $title, $content, $spotify_link);

        if (mysqli_stmt_execute($stmt)) {
            // Set success message for display on next page load
            $_SESSION['upload_success'] = "Blog post successfully uploaded!";
            header("Location: blog_upload.php?success=1");
            exit;
        } else {
            // Set error message for display on next page load
            $_SESSION['upload_error'] = "Error: " . mysqli_stmt_error($stmt);
            header("Location: blog_upload.php?success=0");
            exit;
        }

        mysqli_stmt_close($stmt);
    } else {
        // If there are validation errors, store them in session for display
        $_SESSION['upload_errors'] = $errors;
        header("Location: blog_upload.php?success=0");
        exit;
    }
}

// Close database connection
mysqli_close($conn);
>>>>>>> 900c65a6ff53030b975a68bc27d2fa361d566fc3
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
