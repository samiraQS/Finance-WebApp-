<?php
session_start();
require 'db.php'; // Include database connection

if (!isset($_SESSION['user_id'])) {
    die("You must log in to view this page.");
}

// Fetch user's financial data (this is an example, you can adjust it based on your database schema)
$userId = $_SESSION['user_id'];
$query = "SELECT total_balance, total_income, total_spending FROM user_financial_data WHERE user_id = ?";
if ($stmt = $mysqli->prepare($query)) {
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($total_balance, $total_income, $total_spending);
    $stmt->fetch();
    $stmt->close();

    // Output the data
    echo json_encode([
        'total_balance' => $total_balance,
        'total_income' => $total_income,
        'total_spending' => $total_spending
    ]);
} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();
?>