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



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["user_name"];
  $password = $_POST["password"];

    // SQL query to check if the user is an admin
    $admin_query = "SELECT * FROM admin WHERE user_name = '$name' AND password = '$password'";
    $admin_result = $conn->query($admin_query);

    // SQL query to check if the user is a regular user
    $user_query = "SELECT * FROM user_reg WHERE user_name = '$name'";
    $user_result = $conn->query($user_query);

    if ($admin_result->num_rows > 0) {
        // Admin login successful
        $row = $admin_result->fetch_assoc();
        $admin_id = $row["admin_id"];
                
        $_SESSION['admin_id'] = $admin_id;
        echo "<script>alert('Login successful.'); window.location.href='adminDash.php';</script>";
       
        exit();
    } elseif ($user_result->num_rows > 0) {
        // User exists, check password
        $row = $user_result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Password is correct, create a session
            $user_id = $row["user_id"];
            
            $_SESSION['user_id'] = $user_id;
            echo "<script>alert('Login successful.'); window.location.href='home.php';</script>";
            exit();
        } else {
            // Incorrect password
            echo "<script>alert('Incorrect password.'); window.location.href='login.php';</script>";
            exit();
        }
    } else {
        // Login failed
        echo "<script>alert('Incorrect password.'); window.location.href='login.php';</script>";
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <?php
    if (isset($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>

</body>
</html>
