<?php
// db.php
$mysqli = new mysqli('localhost', 'root', '', 'ecommerce');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>