<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "to-do-app";

// Step 1: Connect to MySQL Server (without selecting database)
$conn = mysqli_connect($host, $user, $pass);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Create Database if it doesn't exist
$dbCheck = mysqli_query($conn, "SHOW DATABASES LIKE '$dbName'");
if (mysqli_num_rows($dbCheck) == 0) {
    $createDb = "CREATE DATABASE `$dbName`";
    if (mysqli_query($conn, $createDb)) {
        echo "Database '$dbName' created successfully.<br>";
    } else {
        die("Error creating database: " . mysqli_error($conn));
    }
}

// Step 3: Select the Database
mysqli_select_db($conn, $dbName);

// Step 4: Create Table 'tasks' if it doesn't exist
$tableCheck = mysqli_query($conn, "SHOW TABLES LIKE 'tasks'");
if (mysqli_num_rows($tableCheck) == 0) {
    $createTable = "
    CREATE TABLE `tasks` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        task TEXT NOT NULL,
        status ENUM('pending', 'completed') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";

    if (mysqli_query($conn, $createTable)) {
        echo "Table 'tasks' created successfully.<br>";
    } else {
        die("Error creating table: " . mysqli_error($conn));
    }
}
?>
