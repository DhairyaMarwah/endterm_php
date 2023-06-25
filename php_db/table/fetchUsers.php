<?php

// Create a connection
$conn = new mysqli("localhost", "root", "", "endtermdb");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";

// Execute the SQL statement
$result = $conn->query($sql);

// Check if records were found
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo " Name: " . $row["name"] . "<br>"; 
        echo "Email: " . $row["email"] . "<br><br>";
    }
} else {
    echo "No records found";
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
</body>
</html>