<?php
// On other pages
session_start(); // Make sure to start the session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Now, $user_id contains the user's ID, and you can use it as needed.
} else {
    // User is not logged in or the session expired, handle accordingly (e.g., redirect to login).
}
?>


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
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $doo = $_POST['doo'];
        $symptoms = $_POST['symptoms'];
        $severe = $_POST['severe'];
        $comment = $_POST['message'];
       


        // Insert user data into the database
        $insertQuery = "INSERT INTO illness  (user_id, user_name, email, phone, date_of_birth, date_of_onset, symptoms, severity, comment_) VALUES (?, ?, ?, ?, ?, ?,?,?,?)";
        $stmt = $conn->prepare($insertQuery);

        if ($stmt) {
            $stmt->bind_param("sssssssss",$user_id, $name, $email, $phone, $dob, $doo, $symptoms, $severe, $comment);
            if ($stmt->execute()) {
                // Registration successful
                $stmt->close();
                $conn->close();
                echo "<script>alert('Recieved Successfully!! We will get back to you shortly'); window.location.href='home.php';</script>";
                exit();
            } else {
                // Registration failed
                $stmt->close();
                $conn->close();
                echo "<script>alert('Error while adding info, please try again'); window.location.href='illness.php';</script>";
                exit();
            }
        } else {
            // SQL statement preparation failed
            $conn->close();
            echo "<script>alert('SQL statement preparation failed.'); window.location.href='illness.php';</script>";
            exit();
        }
    }

?>
