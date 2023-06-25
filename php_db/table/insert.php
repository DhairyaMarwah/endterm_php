<?php

// Create a connection
$conn = new mysqli("localhost", "root", "", "endtermdb");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $name = $_POST["name"]; 
    $email = $_POST["email"];

    // SQL statement to insert data into the table
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
<form method="POST" action="insert.php">
        <input type="text" name="name" id="name" placeholder="name" required> 
        <input type="email" name="email" id="email" placeholder="email" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>