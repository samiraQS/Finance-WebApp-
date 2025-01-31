<?php
require 'db.php'; // Include database connection

// Read Users
$query = "SELECT * FROM users";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Email: " . $row['email'] . "<br>";
    }
} else {
    echo "No users found.";
}
?>