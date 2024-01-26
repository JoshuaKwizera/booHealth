<?php
// On other pages
session_start(); // Make sure to start the session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Now, $user_id contains the user's ID, and you can use it as needed.
} else {
    // User is not logged in or the session expired, handle accordingly (e.g., redirect to login).
}

// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "b_health";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select status based on user ID
$sql = "SELECT status FROM appointment WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if any rows were found
if ($result->num_rows > 0) {
    // Fetch the status from the database
    $row = $result->fetch_assoc();
    $status = $row["status"];

    // Check if status is 'approved'
    if ($status === "approved") {
        // Update the status to 'checked'
        $update_sql = "DELETE FROM appointment WHERE user_id = ? AND status = 'approved'";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $user_id);
        if ($update_stmt->execute()) {
            echo "<script>alert('YOUR APPOINTMENT WAS APPROVED.'); window.location.href='home.php';</script>";
        } else {
            echo "<script>alert('Failed to update status.'); window.location.href='home.php';</script>";
        }
    } elseif ($status === "pending") {
        echo "<script>alert('YOUR APPOINTMENT IS STILL PENDING.'); window.location.href='home.php';</script>";
    } elseif ($status === "deleted") {

        $update_sql = "DELETE FROM appointment WHERE user_id = ? AND status = 'deleted'";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $user_id);
        if ($update_stmt->execute()) {
            echo "<script>alert('SORRY, YOUR APPOINTMENT WAS REJECTED'); window.location.href='home.php';</script>";
        } else {
            echo "<script>alert('Failed to update status.'); window.location.href='home.php';</script>";
        }
        
    }
    else{
        echo "<script>alert('No Appointment Found'); window.location.href='home.php';</script>";
    }
} else {
    // No rows found, handle accordingly
    echo "<script>alert('No Appointment found.'); window.location.href='home.php';</script>";
}

// Close the database connection
$conn->close();
?>
