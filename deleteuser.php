<?php
session_start();
require 'db.php'; // Include database connection

// Delete User
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];

    if ($stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?")) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();
        echo "User deleted successfully!";
    } else {
        echo "Error: " . $mysqli->error;
    }
}
?>