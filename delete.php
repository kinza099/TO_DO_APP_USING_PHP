<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

 
    $query = "DELETE FROM tasks WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php'); 
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid Request.";
}
?>
