<?php
// Database connection parameters (You can include this if needed)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "b_health";

// Create a database connection (You can include this if needed)
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection (You can include this if needed)
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Calculate the overall total of all items in the cart
$overallTotal = 0; // Initialize overall total

$overallTotalQuery = "SELECT SUM(total) AS overall_total FROM cart";
$result = $conn->query($overallTotalQuery);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $overallTotal = $row['overall_total'];
}

// Close the database connection (You can include this if needed)
$conn->close();
?>
