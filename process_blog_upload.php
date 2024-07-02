<?php
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
