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
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Email and password validation using regular expressions
    $emailRegex = "/^\S+@\S+\.\S+$/"; 

    if (!preg_match($emailRegex, $email)) {
        echo "Invalid email format";
    } elseif (strlen($password)<5) {
        echo "password too short";
    } else {
        // SQL statement to insert data into the table
        $sql = "INSERT INTO students (email, password) VALUES ('$email', '$password')";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully";
            setcookie("email", $email, time() + (86400 * 30), "/"); // Set email cookie
            setcookie("password", $password, time() + (86400 * 30), "/"); // Set password cookie
            header("Location: home.php"); // Redirect to home page
        } else {
            echo "Error inserting data: " . $conn->error;
        }
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
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="email" id="email" placeholder="Email" required>
        <input type="text" name="password" id="password" placeholder="Password" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
