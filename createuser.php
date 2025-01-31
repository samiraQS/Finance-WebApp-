<?php
session_start();
require 'db.php'; // Include database connection

// Create User
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if ($stmt = $mysqli->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)")) {
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();
        $stmt->close();
        echo "Registration successful!";
    } else {
        echo "Error: " . $mysqli->error;
    }
}
?>