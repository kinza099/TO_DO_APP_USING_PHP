<?php
include 'db.php'; 

if (isset($_POST['task'])) {
    $task = trim($_POST['task']);

    if (!empty($task)) {
        $task = mysqli_real_escape_string($conn, $task); 
        $query = "INSERT INTO tasks (task) VALUES ('$task')";
        if (mysqli_query($conn, $query)) {
            header('Location: index.php'); 
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Task cannot be empty.";
    }
} else {
    echo "Invalid Request.";
}
?>
