<?php
$email = $_COOKIE['email'] ?? "";
$password = $_COOKIE['password'] ?? "";

if (isset($_POST['logout'])) {
    // Clear the email and password cookies
    setcookie("email", "", time() - 3600, "/");
    setcookie("password", "", time() - 3600, "/");
    
    // Redirect to the login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <h3>Your credentials:</h3>
    <p>Email: <?php echo $email; ?></p>
    <p>Password: <?php echo $password; ?></p>

    <form method="POST" action="home.php">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
