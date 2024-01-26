<?php
session_start();

// Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "b_health";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];

    // You should add validation and sanitation of user inputs here for security.

    // Query to check if the user exists
    $checkQuery = "SELECT * FROM admin WHERE name= ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User exists, check password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Password is correct, create a session
            $_SESSION["name"] = $name;
            echo "<script>alert('Login successful.'); window.location.href='admin_dashboard.php';</script>";
            exit();
        } else {
            // Incorrect password
            echo "<script>alert('Incorrect password.'); window.location.href='admin.php';</script>";
            exit();
        }
    } else {
        // User does not exist
        echo "<script>alert('User does not exist.'); window.location.href='admin.php';</script>";
        exit();
    }
} else {
    // Handle invalid requests here
    header("Location: admin.php");
    exit();
}
?>
