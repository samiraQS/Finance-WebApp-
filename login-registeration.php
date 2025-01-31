<?php
session_start();
require 'db.php'; // Include database connection

// Registration
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

// Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?")) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            echo "Login successful!";
        } else {
            echo "Invalid email or password!";
        }
        $stmt->close();
    }
}
?>