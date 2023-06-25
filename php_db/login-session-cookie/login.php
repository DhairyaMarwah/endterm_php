<?php
    $conn = new mysqli("localhost", "root", "", "endtermdb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"]; 
        $password = $_POST["password"];
        $sql = "SELECT * FROM students WHERE email = '$email' AND password = '$password'";
        
        if( $conn->query($sql) == 1){
            setcookie("email", $email, time() + (86400 * 30), "/"); // Update email cookie
            setcookie("password", $password, time() + (86400 * 30), "/"); // Update password cookie
            header("Location: home.php"); // Redirect to home page
        }
        else {
            echo "Invalid credentials. Please try again.";
        }
    }
    

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="login.php">
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required> 
        <button type="submit">Submit</button>
    </form>
</body>
</html>