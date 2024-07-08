<?php
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
?>