<?php
    $conn = new mysqli("localhost", "root", "", "endtermdb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        echo "Connected successfully <br>";
    }

    $sql = "CREATE TABLE students (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        password VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table 'students' created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    $conn->close();
?>