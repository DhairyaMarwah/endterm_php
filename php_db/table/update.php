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
    $id = $_POST["id"];
    $name = $_POST["name"]; 
    $email = $_POST["email"];

    // SQL statement to update user information
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "User information updated successfully";
    } else {
        echo "Error updating user information: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User Information</title>
</head>
<body>
    <form method="POST" action="update.php">
        
        <input type="text" name="id" id="id" required>
        <input type="text" name="name" id="name" required> 
        <input type="email" name="email" id="email" required>
        <input type="submit" value="Update">
    </form>
</body>
</html>
