<?php
// Include the database connection file
require_once 'db.php';

// Check if the ID is set in the POST request
if (isset($_POST['id'])) {
    $blog_id = intval($_POST['id']);

    // Update the active status to 0 for the given blog ID
    $update_query = "UPDATE blogs SET active = 0 WHERE id = ?";
    $stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt, 'i', $blog_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Blog deleted successfully.";
    } else {
        http_response_code(500);
        echo "Failed to delete the blog.";
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
} else {
    http_response_code(400);
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($conn);
?>
  