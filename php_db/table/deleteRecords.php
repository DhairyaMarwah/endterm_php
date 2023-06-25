<?php

// Create a connection
$conn = new mysqli("localhost", "root", "", "endtermdb");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL statement to delete records from a table
$sql = "DELETE FROM users"; // Change "your_table" to the actual table name and "condition" to the specific condition

// Execute the SQL statement to delete records
if ($conn->query($sql) === TRUE) {
    echo "Records deleted successfully";
} else {
    echo "Error deleting records: " . $conn->error;
}

// Close the connection
$conn->close();
?>
