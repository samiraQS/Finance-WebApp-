<?php
session_start();
require 'db.php'; // Include database connection

// Update User
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($stmt = $mysqli->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?")) {
        $stmt->bind_param("ssi", $name, $email, $user_id);
        $stmt->execute();
        $stmt->close();
        echo "User updated successfully!";
    } else {
        echo "Error: " . $mysqli->error;
    }
}
?>