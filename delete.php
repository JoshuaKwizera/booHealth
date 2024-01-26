<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {
    // Get the ID to delete from the form data
    $id = $_POST["id"];

    // Create a database connection (similar to your previous code)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "b_health";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform the delete operation
    $sql = "DELETE FROM user_reg WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        // Redirect back to the page after successful deletion
        header("Location: adminDash.php");
        exit;
    } else {
        // Handle deletion failure
        echo "Error deleting the record: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}

?>