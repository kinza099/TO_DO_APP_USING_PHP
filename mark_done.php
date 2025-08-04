<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    // Update task status to 'completed'
    $query = "UPDATE tasks SET status = 'completed' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php'); // Redirect back to home page
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid Request.";
}
?>
