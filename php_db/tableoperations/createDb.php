<?php

// Create a connection
$conn = new mysqli("localhost", "root", "");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL statement to create a database
$sql = "CREATE DATABASE endtermdb"; // Change "your_database" to the desired database name

// Execute the SQL statement to create the database
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Close the connection
$conn->close();
?>
