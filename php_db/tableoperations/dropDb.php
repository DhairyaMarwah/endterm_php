<?php

// Create a connection
$conn = new mysqli("localhost", "root", "", );

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL statement to drop the database
$sql = "DROP DATABASE users"; // Change "your_database" to the actual database name

// Execute the SQL statement to drop the database
if ($conn->query($sql) === TRUE) {
    echo "Database dropped successfully";
} else {
    echo "Error dropping database: " . $conn->error;
}

// Close the connection
$conn->close();
?>
