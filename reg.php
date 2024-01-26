<?php
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

// Get user input from the registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        // Hash the password for security (use a strong hashing algorithm)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // You should add validation and sanitation of user inputs here for security.

    // Check if the user already exists
    $checkQuery = "SELECT * FROM user_reg WHERE user_name = ? AND password = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $name, $hashedPassword);
    $stmt->execute();
    $result = $stmt->get_result();
    
    

    if ($result->num_rows > 0) {
        // User already exists
        $stmt->close();
        $conn->close();
        echo "<script>alert('User already exists.'); window.location.href='regiter.php';</script>";
        exit();
    } else {
        // User does not exist, proceed with registration
        $stmt->close();


        // Insert user data into the database
        $insertQuery = "INSERT INTO user_reg  (user_name, email, date_of_birth, address, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);

        if ($stmt) {
            $stmt->bind_param("sssss", $name, $email, $date, $address, $hashedPassword);
            if ($stmt->execute()) {
                // Registration successful
                $stmt->close();
                $conn->close();
                echo "<script>alert('Registration successful.'); window.location.href='login.php';</script>";
                exit();
            } else {
                // Registration failed
                $stmt->close();
                $conn->close();
                echo "<script>alert('Registration failed.'); window.location.href='regiter.php';</script>";
                exit();
            }
        } else {
            // SQL statement preparation failed
            $conn->close();
            echo "<script>alert('SQL statement preparation failed.'); window.location.href='regiter.php';</script>";
            exit();
        }
    }
} else {
    // Handle invalid requests here
    header("Location: regiter.php"); // Redirect to an error page
    exit();
}
?>
